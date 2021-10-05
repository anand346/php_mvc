<?php
class CatModel extends Dmodel{
    public function __construct()
    {
        // echo "hello from catModel";
        parent::__construct();
    }
    public function catList($table){
        $sql = "SELECT * FROM $table ORDER BY id DESC";
       return $this->db->select($sql);
    }
    public function catById($table,$id){
        $sql = "SELECT * FROM $table WHERE id = :id";
        $data = array(":id"=>$id);
        return $this->db->select($sql,$data);
    }
    public function insertCat($table,$cat){
        return $this->db->insert($table,$cat);
    }
    public function catUpdate($table,$data,$cond){
        return $this->db->update($table,$data,$cond);
    }
    public function delCatById($table,$cond){
        return $this->db->delete($table,$cond);
    }
}
?>