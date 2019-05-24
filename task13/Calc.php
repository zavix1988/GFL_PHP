<?php
class Calc
{
    private $firstVar;
    private $secondVar;
    private $memVar;

    public function __construct()
    {
        $this->firstVar = NULL;
        $this->secondVar = NULL;
        $this->mamVar = NULL;
    }

    private function checkInt($value) {
        switch(gettype($value)) {
            case "integer": return $value;
            case "double": return (int)$value;
            default: return false;
        }
    }

    public function setFirstVar($var){
        if($this->checkInt($var)){
            $this->firstVar = $var;
        }else $this->firstVar = MY_NAN;
    }

    public function setSecondVar($var){
        if($this->checkInt($var)){
            $this->secondVar = $var;
        }else $this->secondVar = MY_NAN;
    }

    public function getFirstVar() {
        if($this->firstVar == NULL){
            return UNSET_VAR;
        }else {
            return $this->firstVar;
        }
    }

    public function getSecondVar() {
        if($this->secondVar == NULL){
            return UNSET_VAR;
        }else {
            return $this->secondVar;
        }
    }

    public function addVars() {
        if($this->firstVar != MY_NAN && $this->secondVar != MY_NAN){
            return $this->firstVar + $this->secondVar;
        } else {
            return MY_NAN;
        }
    }

    public function substructVars() {
        if($this->firstVar != MY_NAN && $this->secondVar != MY_NAN){
            return $this->firstVar - $this->secondVar;
        } else {
            return MY_NAN;
        }
    }

    public function multiplicateVars() {
        if($this->firstVar != MY_NAN && $this->secondVar != MY_NAN){
            return $this->firstVar * $this->secondVar;
        } else {
            return MY_NAN;
        }
    }

    public function DivizVars() {
        if($this->secondVar == 0) return DIVZERO;
        else return round(($this->firstVar / $this->secondVar), 3);
    }

    public function negateVar() {
        if($this->firstVar != MY_NAN){
            return -$this->firstVar;
        } else {
            return MY_NAN;
        }        
    }

    public function sqrtVar() {
        if($this->firstVar != MY_NAN){
            return round(sqrt($this->firstVar), 3);
        } else {
            return MY_NAN;
        }  
    }

    public function oneDivizVar() {
        if($this->secondVar == 0) return DIVZERO;
        else return round((1 / $this->secondVar), 3);
    }

    public function clearVars() {
        $this->firstVar = NULL;
        $this->secondVar = NULL;
    }

    public function memoryAdd() {
        if($this->firstVar != MY_NAN){
            $this->memVar+=$this->firstVar;
            return true;
        } else {
            return MY_NAN;
        }
    }

    public function memorySubstruct() {
        if($this->firstVar != MY_NAN){
            $this->memVar-=$this->firstVar;
            return true;
        } else {
            return MY_NAN;
        }
    }

    public function memoryGet() {
        return (int)$this->memVar;
    }

    public function clearMemory() {
        return $this->memVar = NULL;
    }
}
