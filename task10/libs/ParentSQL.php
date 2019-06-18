<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 26.05.2019
 * Time: 20:32
 */

class ParentSQL
{
    protected $tables;
    protected $fields;
    protected $values;
    protected $joins;
    protected $conditions;
    protected $group;
    protected $query;
    protected $limit;
    protected $distinct;
    protected $orderBy;
    protected $errors;


    public function __construct() {
        $this->tables = [];
        $this->fields = [];
        $this->values = [];
        $this->joins = [];
        $this->conditions = [];
        $this->group = [];
        $this->query = '';
        $this->limit = 0;
        $this->orderby = '';
        $this->distinct = false;
        $this->errors =[];
    }

    public function setTable($table)
    {
        $table = trim($table); 
        $this->tables[] = $table;
        return $this;
    }

    public function setField($table, $field)
    {
        if (in_array($table, $this->tables)) {
            $this->fields[$field] = $table;
        }
        return $this;
    }

    /* Values setter method */
    public function setValue($field, $value) {
        $this->values[$field] = $value;
        return $this;
    }


    public function setInnerJoin($primeTable, $primeField, $joinTable, $joinField){
        if (in_array($primeTable, $this->tables)) {
            if (in_array($joinTable, $this->tables)) {
                $this->joins[] = ['joinType' => 'INNER JOIN', 'primeTable' => $primeTable, 'primeField' => $primeField, 'joinTable' => $joinTable, 'joinField' => $joinField ];
            }
        }
        return $this;
    }

    public function setLeftJoin($primeTable, $primeField, $joinTable, $joinField){
        if (in_array($primeTable, $this->tables)) {
            if (in_array($joinTable, $this->tables)) {
                $this->joins[] = ['joinType' => 'LEFT JOIN', 'primeTable' => $primeTable, 'primeField' => $primeField, 'joinTable' => $joinTable, 'joinField' => $joinField ];
            }
        }
        return $this;
    }

    public function setRightJoin($primeTable, $primeField, $joinTable, $joinField){
        if (in_array($primeTable, $this->tables)) {
            if (in_array($joinTable, $this->tables)) {
                $this->joins[] = ['joinType' => 'RIGHT JOIN', 'primeTable' => $primeTable, 'primeField' => $primeField, 'joinTable' => $joinTable, 'joinField' => $joinField ];
            }
        }
        return $this;
    }

    public function setCrossJoin($primeTable, $primeField, $joinTable, $joinField){
        if (in_array($primeTable, $this->tables)) {
            if (in_array($joinTable, $this->tables)) {
                $this->joins[] = ['joinType' => 'CROSS JOIN', 'primeTable' => $primeTable, 'primeField' => $primeField, 'joinTable' => $joinTable, 'joinField' => $joinField ];
            }
        }
        return $this;
    }
        
    public function setWhere($field = 'author_id', $operator = '=', $value, $separator = false, $table = false) {
        $validOperators = ['=', '>', '<', '>=', '<=', '<>', 'BETWEEN', 'LIKE', 'IN'];
        $validSeparators = ['AND', 'OR', 'NOT'];
        if (in_array($operator, $validOperators)) {
            $this->conditions[] = ['field' => $field, 'operator' => $operator, 'value' => $value];
            if($separator) {
                if (in_array($separator, $validSeparators)) {
                    $this->conditions[count($this->conditions)-1]['separator'] = $separator;
                }
            }
            if ($table) {
                $this->conditions[count($this->conditions)-1]['table'] = $table;
            }
        }
        return $this;
    }

    public function setGroupBy($table, $field) {
        if (in_array($table, $this->tables)) {
            $this->group = [$table, $field];
        }
        return $this;
    }

    /* Limit setter method */
    public function setLimit($limit) {
        if(is_int($limit) && ($limit > 0)) {
            $this->limit = $limit;
        } else {
            $this->errors[] = ['limitError' => 'Invalid limit'];
        }
        return $this;
    }

    public function setDistinct() {
        $this->distinct = true;
        return $this;
    }
    
    public function setOrderBy($orderBy = "ASC")
    {
        if($orderBy == 'ASC' || $orderby == 'DESC'){
            $this->orderby = $orderBy;
        }
        return $this;
    }
}