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

    public function select() {
        $this->query = 'SELECT ';
        foreach( $this->fields as $field => $table){
            $this->query .= $table . '.' . $field . ', ';
        }
        $this->query = substr($this->query, 0, -2);
        $this->query .= " FROM {$this->tables[0]} ";
        if(!empty($this->joins)){
            foreach($this->joins as $join){
                $this->query .= "{$join['joinType']} {$join['joinTable']} ON {$join['primeTable']}.{$join['primeFild']}={$join['joinTable']}.{$join['joinField']} ";
            }
        }
        $this->query .= 'WHERE ';
        $values = [];
        foreach ($this->conditions as $condition) {
            if (isset($condition['table'])) {
                $this->query .= "{$condition['table']}.";
            }
            $this->query .= "{$condition['field']} {$condition['operator']} ? ";
            $values[] = $condition['value'];
            if (isset($condition['separator'])) {
                $this->query .= "{$condition['separator']} ";
            }
        }
        if(!empty($this->group)){
            $this->query .= "GROUP BY {$this->group['0']}.{$this->group['1']}";
        }
        
        $stmt = $this->dbh->prepare($this->query);
        $i=1;
        foreach ($values as $value) {
            $stmt->bindParam($i, $value);
            $i++;  
        }
        $res =  $stmt->execute();
        if ($res !== false){
            return $stmt->fetchAll();
        } else {
            return $stmt;
        }
    }


}