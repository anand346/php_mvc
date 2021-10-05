<?php
class Dform{
    public $currentValue;
    public $values = array();
    public $errors = array();
    public function __construct() {
    }
    public function post($key){
        $this->values[$key] = trim($_POST[$key]);
        $this->currentValue = $key;
        return $this;
    }
    public function isEmpty(){
        if(empty($this->values[$this->currentValue])){
            $this->errors[$this->currentValue]['empty'] = "field must not be empty";
        }
        return $this;
    }
    public function isCatEmpty(){
        if($this->values[$this->currentValue] == 0){
            $this->errors[$this->currentValue]['empty'] = "field must not be empty";
        }
        return $this;
    }
    public function length($min = 0,$max)
    {
        if(strlen($this->values[$this->currentValue]) < $min OR strlen($this->values[$this->currentValue]) > $max){
            $this->errors[$this->currentValue]['empty'] = "should min ".$min." and max ".$max." characters";
        }
        return $this;
    }
    public function submit(){
        if (empty($this->errors)) {
            return true;
        }else{
            return false;
        }
    }
}
?>