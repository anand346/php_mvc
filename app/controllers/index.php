<?php
class Index extends Dcontroller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->home();
    }
    public function home(){
        $data = array();
        $tablePost = "post";
        $tableCat = "category";

        $this->load->view("header");
        
        $CatModel =  $this->load->model("catModel");
        $postModel =  $this->load->model("PostModel");

        $data["catList"] = $CatModel->catList($tableCat);
        $this->load->view("search",$data);
        
        $data["allPost"] = $postModel->getAllPost($tablePost);
        $this->load->view("content",$data);

        $data["latestPost"] = $postModel->getLatestPost($tablePost);
        $this->load->view("sidebar",$data);

        
        $this->load->view("footer");
    }
    public function postDetails($id){
        $data = array();
        $tablePost = "post";
        $tableCat = "category";

        $this->load->view("header");
        
        $postModel =  $this->load->model("PostModel");
        $CatModel =  $this->load->model("catModel");

        $data["catList"] = $CatModel->catList($tableCat);
        $this->load->view("search",$data);
        
        $data["postById"] = $postModel->getPostById($tablePost,$tableCat,$id);
        $this->load->view("details",$data);
        
        $data["latestPost"] = $postModel->getLatestPost($tablePost);
        $this->load->view("sidebar",$data);


        $this->load->view("footer");
    }
    public function postByCat($id){
        $data = array();
        $tablePost = "post";
        $tableCat = "category";

        $this->load->view("header");

        $CatModel =  $this->load->model("catModel");
        $postModel =  $this->load->model("PostModel");

        $data["catList"] = $CatModel->catList($tableCat);
        $this->load->view("search",$data);
        
        $data["getcat"] = $postModel->getPostByCat($tablePost,$tableCat,$id);
        $this->load->view("postbycat",$data);
       
        $data["latestPost"] = $postModel->getLatestPost($tablePost);
        $this->load->view("sidebar",$data);

        $this->load->view("footer");
    }
    public function search(){
        $data = array();

        $keyword = $_REQUEST['keyword'];
        $cat = $_REQUEST['cat'];

        $tablePost = "post";
        $tableCat = "category";

        $this->load->view("header");

        $CatModel =  $this->load->model("catModel");
        $postModel =  $this->load->model("PostModel");

        $data["catList"] = $CatModel->catList($tableCat);
        $this->load->view("search",$data);
        
        $data["postbysearch"] = $postModel->getPostBySearch($tablePost,$keyword,$cat);
        $this->load->view("sresult",$data);
       
        $data["latestPost"] = $postModel->getLatestPost($tablePost);
        $this->load->view("sidebar",$data);

        $this->load->view("footer");
    }
}
?>