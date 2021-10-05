<?php
class PostModel extends Dmodel{
    public function __construct()
    {
        // echo "hello from catModel";
        parent::__construct();
    }
    public function getAllPost($table){
        $sql = "SELECT * FROM $table ORDER BY id DESC limit 3";
       return $this->db->select($sql);
    }
    public function postById($table,$id){
        $sql = "SELECT * FROM $table WHERE id = $id";
       return $this->db->select($sql);
    }
    public function getPostList($table){
        $sql = "SELECT * FROM $table ORDER BY id DESC";
       return $this->db->select($sql);
    }
    public function getPostById($tablePost,$tableCat,$id){
        $sql = "SELECT $tablePost.* , $tableCat.name FROM $tablePost INNER JOIN $tableCat ON $tablePost.cat = $tableCat.id WHERE $tablePost.id = $id";
       return $this->db->select($sql);
    }
    public function getPostByCat($tablePost,$tableCat,$id){
        $sql = "SELECT $tablePost.* , $tableCat.name FROM $tablePost INNER JOIN $tableCat ON $tablePost.cat = $tableCat.id WHERE $tablePost.cat = $id";
       return $this->db->select($sql);
    }
    public function getLatestPost($table){
        $sql = "SELECT * FROM $table ORDER BY id DESC limit 5";
        return $this->db->select($sql);
    }
    public function getPostBySearch($table,$keyword,$cat){
        if(empty($keyword) && $cat == 0){
            header("location:".BASE_URL."");
        }
        if(isset($keyword) && !empty($keyword)){
            $sql = "SELECT * FROM $table WHERE title LIKE '%{$keyword}%' OR content LIKE '%{$keyword}%'  ";
        }elseif (isset($cat)) {
            $sql = "SELECT * FROM $table WHERE cat = $cat ORDER BY id DESC";
        }
        return $this->db->select($sql);
    }
    public function insertPost($table,$data){
        return $this->db->insert($table,$data);
    }
    public function updatePost($table,$data,$cond){
        return $this->db->update($table,$data,$cond);
    }
    public function delPostById($table,$cond){
        return $this->db->delete($table,$cond);
    }
}
?>