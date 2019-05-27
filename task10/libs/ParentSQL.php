<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 26.05.2019
 * Time: 20:32
 */

class ParentSQL
{
    protected $table;
    protected $fields;
    protected $query;
    protected $errors;
    protected $limit;
    protected $values;
    protected $conditions;

    protected function __construct()
    {
        $this->table = '';
        $this->fields = [];
        $this->values = [];
    }


    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param $fields
     * @return $this
     */
    public function setField($fields)
    {
        if(is_array($fields)){
            foreach ($fields as $field) {
                $this->fields[] = $field;
            }
        }else{
            $this->fields = $fields;
        }
        return $this;
    }


    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    public function insertRow() {

    }
}