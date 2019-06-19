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
        for ($i=0; $i<count($values); $i++) {
            $stmt->bindParam($i+1, $values[$i]);

        }
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

        foreach($this->fields as $oneField){
            $this->query .= $oneField['table'] . '.' . $oneField['field'];
            if($oneField['alias']){
                $this->query .= " AS {$oneField['alias']}, ";
            }else{
                $this->query .= ", ";

            }
        }

        $this->query = substr($this->query, 0, -2);
        $this->query .= " FROM {$this->tables[0]} ".PHP_EOL;
        if(!empty($this->joins)){
            foreach($this->joins as $join){
                $this->query .= "{$join['joinType']} {$join['joinTable']} ON {$join['primeTable']}.{$join['primeField']} = {$join['joinTable']}.{$join['joinField']} ".PHP_EOL;
            }
        }
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
        if(!empty($this->group)){
            $this->query .= "GROUP BY {$this->group['0']}.{$this->group['1']}";
        }
        if ($this->limit) {
            $this->query .= " LIMIT {$this->limit}";
        }

        //return $this->query; die;
        $stmt = $this->dbh->prepare($this->query);
        if(isset($values)){
            for ($i=0; $i<count($values); $i++) {
                $stmt->bindParam($i+1, $values[$i]);

            }
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
        $this->query = "UPDATE {$this->tables[0]} SET ";
        $values=[];
        foreach ($this->values as $field => $value) {
            $this->query .= $field.' =  ?, ';
            $values[] = $value;
        }
        $this->query = substr($this->query, 0, -2);
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
        for ($i=0; $i<count($values); $i++) {
            $stmt->bindParam($i+1, $values[$i]);

        }
        $res = $stmt->execute();
        $this->query = '';
        $this->tables = [];
        $this->conditions = [];
        return $res;
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
        for ($i=0; $i<count($values); $i++) {
            $stmt->bindParam($i+1, $values[$i]);
        }
        $res = $stmt->execute();
        $this->query = '';
        $this->tables = [];
        $this->conditions = [];
        return $res;
    }

    public function getJoins()
    {
        return $this->joins;
    }
}