<?php
class UserModel extends Dmodel{
    public function __construct()
    {
        // echo "hello from catModel";
        parent::__construct();
    }
    public function userList($table){
        $sql = "SELECT * FROM $table ORDER BY id DESC";
       return $this->db->select($sql);
    }
    public function userById($table,$id){
        $sql = "SELECT * FROM $table WHERE id = :id";
        $data = array(":id"=>$id);
        return $this->db->select($sql,$data);
    }
    public function addUser($table,$cat){
        return $this->db->insert($table,$cat);
    }
    public function userUpdate($table,$data,$cond){
        return $this->db->update($table,$data,$cond);
    }
    public function delUserById($table,$cond){
        return $this->db->delete($table,$cond);
    }
}
?>