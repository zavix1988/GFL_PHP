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
    protected $joins;
    protected $conditions;
    protected $group;
    protected $query;

    public function __construct() {
        $this->tables = [];
        $this->fields = [];
        $this->joins = [];
        $this->conditions = [];
        $this->group = [];
        $this->query = '';
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


    public function setJoin($join = 'INNER JOIN', $primeTable, $primeFild, $joinTable, $joinField){
        if($join == 'INNER JOIN' || $join == 'LEFT JOIN' || $join == 'RIGHT JOIN' || $join == 'FULL JOIN') {
            if (in_array($primeTable, $this->tables)) {
                if (in_array($joinTable, $this->tables)) {
                    $this->joins[] = ['joinType' => $join, 'primeTable' => $primeTable, 'primeFild' => $primeFild, 'joinTable' => $joinTable, 'joinField' => $joinField ];
                    return $this;
                } else {
                    return $this;
                }
            } else {
                return $this;
            }
        }
    }

        
    public function setWhere($field = 'author_id', $operator = '=', $value = '13', $separator = 'OR', $table = false) {
        $validOperators = ['=', '>', '<', '>=', '<=', '<>', 'BETWEEN', 'LIKE', 'IN'];
        $validSeparators = ['AND', 'OR', 'NOT'];
        if (in_array($operator, $validOperators)) {
            $this->conditions[] = ['field' => $field, 'operator' => $operator, 'value' => $value];
            if (in_array($separator, $validSeparators)) {
                $this->conditions[count($this->conditions)-1]['separator'] = $separator;
            }
            if ($table) {
                $this->conditions[count($this->conditions)-1]['table'] = $table;
            }
        }
        return $this;

    }

    /*GROUP BY books.id";*/

    public function setGroupBy($table, $field) {
        if (in_array($table, $this->tables)) {
            $this->group = [$table, $field];
        }
        return $this;
    }

}