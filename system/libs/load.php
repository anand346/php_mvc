<?php
class Load{
    public function __construct(){}
    public function view($fileName,$data = NULL){
        if($data == true){
            extract($data);
        }
        include "app/views/".$fileName.".php";
    }
    public function model($modelName){
        include "app/models/".$modelName.".php";
        return new $modelName;
    }
    public function validation($modelName){
        include "app/validations/".$modelName.".php";
        return new $modelName;
    }
}

?>