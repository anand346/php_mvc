<?php

class LoginModel extends Dmodel{
    public function __construct()
    {
        // echo "hello from catModel";
        parent::__construct();
    }
    public function userControl($table,$username,$password){
        $sql = "SELECT * FROM $table WHERE username = ? AND password = ?";
        return $this->db->affectedRows($sql,$username,$password);
    }
    public function getUserData($table,$username,$password){
        $sql = "SELECT * FROM $table WHERE username = ? AND password = ?";
        return $this->db->selectUser($sql,$username,$password);
    }

}

?>