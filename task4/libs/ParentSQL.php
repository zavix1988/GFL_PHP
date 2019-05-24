<?php
class ParentSQL {
    protected $table;
    protected $fields;
    protected $query;
    protected $errors;
    protected $limit;
    protected $values;
    protected $conditions;

    public function __construct(){
        $this->table = ""; //set
        $this->fields = []; //set
        $this->query = ""; //get
        $this->errors = []; //get
        $this->limit = 1; //set
        $this->values = []; //set
        $this->conditions = []; //set
    }

    /* Inser method */
    public function insertRow() {
        foreach($this->values as $oneValue)
        {
            foreach ($oneValue as $key => $value) {
                $field .= $key . ", ";
                $values .= "'".$value . "', ";
            }
        }
        $fields = substr($field, 0, -2);
        $values = substr($values, 0, -2);
        $this->query = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values})";
        $this->values = array();
    }

    /* Select method */
    public function selectRows() {
        $fields = implode(", ", $this->fields);
        $conditions = implode(" AND ", $this->conditions);
        $this->query = "SELECT {$fields} FROM {$this->table}";
        if(!empty($this->conditions)){
            $this->query.=" WHERE {$conditions}";
        }
        $this->query.= " LIMIT {$this->limit}";
        $this->fields = array();
        $this->conditions = array();
    }

    /* Update method */
    public function updateRow() {
        $conditions = implode(" AND ", $this->conditions);
        foreach($this->values as $oneValue)
        {
            foreach ($oneValue as $key => $value) {
                $setString .= $key ." = '".$value."', ";
            }
        }
        $setString = substr($setString, 0, -2);
        $this->query = "UPDATE {$this->table} SET {$setString} WHERE {$conditions}";
        $this->conditions = array();   
    }

    /* Delete Method */
    protected function deleteRow() {
        $conditions = implode(" AND ", $this->conditions);
        $this->query = "DELETE FROM $this->table WHERE {$conditions}";
        $this->conditions = array();
    }

    /* Table setter method */
    public function setTable($table) {
        $this->table = $table;
    }
    
    /* Field setter method */
    public function setField($field) {
        if($this->checkAsk($field)) {
            $this->fields[] = $field;
        } else {
            $this->errors[] = ["field" => "Inadmissible character {$field}"];
        }
    }

    /* Limit setter method */
    public function setLimit($limit) {
        if(is_int($limit) && ($limit > 0)) {
            $this->limit = $limit;
        } else {
            $this->errors[] = ['limitError' => 'Invalid limit'];
        }
    }

    /* Values setter method */
    public function setValue($field, $value) {
        $this->values[] = [$field => $value];
    }

    /* WHERE setter method */
    public function setWhere($condition) {
        $this->conditions[] =  $condition;
    }

    /* Check asterisk method */
    protected function checkAsk($value) {
        if ($value != "*") return $value;
        else return false;
    }

    /* Errors getter method */
    public function getErrors() {
        return $this->errors;
    }

    /* Query getter method */
    public function getQuery() {
        return $this->query;
    }

    /* Query getter method */
    public function getValues() {
        return $this->values;
    }

    /* Table getter method */
    public function getTable() {
        return $this->table;
    }
    
    /* Fields getter method */
    public function getFields() {
        return $this->fields;
    }

    /* Conditions getter method */
    public function getWhere() {
        return $this->conditions;
    }
    
    /* Limit getter method */
    public function getLimit() {
        return $this->limit;
    }
}