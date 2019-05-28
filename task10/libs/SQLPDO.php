<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 26.05.2019
 * Time: 20:33
 */

class SQLPDO extends ParentSQL
{
    private $dbh;

    public function __construct()
    {
        parent::__construct();
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME. ";charset=utf8", DB_USER, DB_PASS, $options);
    }

    public function insert() {
        //$sql = "INSERT INTO {$this->table} (name, slug, price, pubyear, lang, description) VALUES (?, ?, ?, ?, ?, ?)";

        $this->query = "INSERT INTO {$this->table[0]} (";
        $values=[];
        foreach ($this->values as $field => $value) {
            $this->query .= $field.', ';
            $values[] = $value;
        }
        $this->query = substr($this->query, 0, -2);
        $this->query .= ') VALUES (';
        foreach ($values as $value) {
            $this->query .= '?, ';
        }
        $this->query = substr($this->query, 0, -2);
        $this->query .= ')';
        
        $stmt = $this->dbh->prepare($this->query);
        $i=1;

        foreach ($values as $value) {
            $stmt->bindParam($i, $value);
            $i++;
        }
        //return $stmt;
        $res =  $stmt->execute();

        if($res){
            return $res;
        }else{
            return $this->dbh->errorInfo();
        }
    }

    public function select() {
        $this->query = 'SELECT ';
        if ($this->distinct) {
            $this->query .= 'DISTINCT ';
        }
        foreach( $this->fields as $field => $table){
            $this->query .= $table . '.' . $field . ', ';
        }
        $this->query = substr($this->query, 0, -2);
        $this->query .= " FROM {$this->tables[0]} ".PHP_EOL;
        if(!empty($this->joins)){
            foreach($this->joins as $join){
                $this->query .= "{$join['joinType']} {$join['joinTable']} ON {$join['primeTable']}.{$join['primeFild']}={$join['joinTable']}.{$join['joinField']} ".PHP_EOL;
            }
        }
        $this->query .= 'WHERE ';
        $values = [];
        foreach ($this->conditions as $condition) {
            if (isset($condition['table'])) {
                $this->query .= "{$condition['table']}.";
            }
            $this->query .= "{$condition['field']} {$condition['operator']} ? ".PHP_EOL;
            $values[] = $condition['value'];
            if (isset($condition['separator'])) {
                $this->query .= "{$condition['separator']} ";
            }
        }
        if(!empty($this->group)){
            $this->query .= "GROUP BY {$this->group['0']}.{$this->group['1']}";
        }
        if ($this->limit) {
            $this->query .= " LIMIT {$this->limit}";
        }
        $stmt = $this->dbh->prepare($this->query);
        $i=1;
        foreach ($values as $value) {
            $stmt->bindParam($i, $value);
            $i++;  
        }
        $res =  $stmt->execute();

        $this->query ='';
        $this->tables = [];
        $this->distinct = false;
        $this->fields = [];
        $this->joins = [];
        $this->conditions = [];
        $this->group = [];
        $this->limit = 0;


        if ($res !== false){
            return $stmt->fetchAll();
        } else {
            return $stmt;
        }
    }

    public function update()
    {
        return 'update';
    }

    public function delete ()
    {
        $this->query = "DELETE FROM {$this->tables[0]}";
        $values = [];
        if(!empty($this->conditions)){
            $this->query .= ' WHERE ';
            foreach ($this->conditions as $condition) {
                if (isset($condition['table'])) {
                    $this->query .= "{$condition['table']}.";
                }
            
                $this->query .= "{$condition['field']} {$condition['operator']} ? ".PHP_EOL;
                $values[] = $condition['value'];
            
                if (isset($condition['separator'])) {
                    $this->query .= "{$condition['separator']} ";
                }
            }
        }
        $stmt = $this->dbh->prepare($this->query);
        $i=1;
        foreach ($values as $value) {
            $stmt->bindParam($i, $value);
            $i++;  
        }
        $res = $stmt->execute();
        $this->query = '';
        $this->tables = [];
        $this->conditions = [];
        return $res;
    }


}