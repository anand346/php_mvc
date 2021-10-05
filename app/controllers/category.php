<?php
/* 
category controller

*/
class Category extends Dcontroller{
    public function __construct(){   
        parent::__construct();
        
    }
    public function categoryList(){
        $data = array();
        $table = "category";
        $CatModel =  $this->load->model("catModel");
        $data["cat"] = $CatModel->catList($table);
        $this->load->view("category",$data);
    }
    public function catById(){
        $data = array();
        $table = "category";
        $id =  2;
        $CatModel =  $this->load->model("catModel");
        $data["catById"] = $CatModel->catById($table,$id);
        $this->load->view("catById",$data);
    }
    public function addCategory(){
        $this->load->view("addcategory");
    }
    public function updateCategory(){
        $data = array();
        $table = "category";
        $id =  22;
        $CatModel =  $this->load->model("catModel");
        $data["catById"] = $CatModel->catById($table,$id);
        $this->load->view("catupdate",$data);     
    }
    public function insertCategory(){
        $table = "category";
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $name = $_POST['name'];
            $title = $_POST['title'];
        }
        $data = array(
            "name"  => $name,
            "title" => $title
        );
        $CatModel =  $this->load->model("catModel");
        $result = $CatModel->insertCat($table,$data);
        $mdata = array();
        if($result == 1){
            $mdata['msg'] = "category added successfully";
        }else{
            $mdata['msg'] = "category added successfully";
        }
        $this->load->view("addcategory",$mdata);
    }
    public function updateCat(){
        $table = "category";
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $title = $_POST['title'];
        }
        $data = array(
            "name"  => $name,
            "title" => $title
        );
        $cond = "id=$id";
        $CatModel =  $this->load->model("catModel");
        $result = $CatModel->catUpdate($table,$data,$cond);
        $mdata = array();
        if($result == 1){
            $mdata['msg'] = "category updated successfully";
        }else{
            $mdata['msg'] = "category not updated ";
        }
        $this->load->view("catupdate",$mdata);
    }
    public function deleteCatById(){
        $table = "category";
        $cond = "id=2";
        $CatModel =  $this->load->model("catModel");
        $CatModel->delCatById($table,$cond);
    }
}
?>