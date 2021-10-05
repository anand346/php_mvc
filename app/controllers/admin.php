<?php
class Admin extends Dcontroller{
    public function __construct(){
        parent::__construct();    
        session::checkSession();
        $data = array();
    }
    public function index(){
        $this->home();
    }
    public function home(){
        $this->load->view("admin/headhome");
        $this->load->view("admin/sidebar");
        $data["user"] = array(
            "username" => session::get("username")
        );
        $this->load->view("admin/home",$data);
        $this->load->view("admin/footer");
    }    
    public function addCategory(){
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");
        $this->load->view("admin/addcategory");
        $this->load->view("admin/footer");
    }
    public function categoryList(){
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $data = array();
        $table = "category";
        $CatModel =  $this->load->model("catModel");
        $data["cat"] = $CatModel->catList($table);

        $this->load->view("admin/categorylist",$data);
        $this->load->view("admin/footer");
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
        $url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
        header("location:$url");
        // $this->load->view("addcategory",$mdata);
    }
    public function editCategory($id=NULL){
        $data = array();
        $table = "category";
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");
        $CatModel =  $this->load->model("catModel");
        $data["catById"] = $CatModel->catById($table,$id);
        $this->load->view("admin/editcat",$data); 
        $this->load->view("admin/footer");
        
    }
    public function updateCat($id=NULL){
        $table = "category";
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
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
        $url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
        header("location:$url");
        
    }
    public function deleteCategory($id=NULL){
        $table = "category";
        $cond = "id=$id";
        $CatModel =  $this->load->model("catModel");
        $result = $CatModel->delCatById($table,$cond);
        $mdata = array();
        if($result == 1){
            $mdata['msg'] = "category deleted successfully";
        }else{
            $mdata['msg'] = "category not deleted ";
        }
        $url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
        header("location:$url");
    }
    public function addArticle(){
        $tableCat = "category";
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $CatModel =  $this->load->model("catModel");
        $data["catList"] = $CatModel->catList($tableCat);

        $this->load->view("admin/addpost",$data);
        $this->load->view("admin/footer");      
    }
    public function addNewPost(){
        if(!($_POST['submit'])){
            header("location:".BASE_URL."/admin/addArticle");
        }else{
        $input = $this->load->validation('Dform');
        $input->post('title')->isEmpty()->length(10,500);
        $input->post('content')->isEmpty();
        $input->post('cat')->isCatEmpty();


        // if(!$_POST['submit']){
        //     header("location:".BASE_URL."/Admin");
        // }else{

        if($input->submit()){
                $table = "post";
            // if($_SERVER['REQUEST_METHOD'] == "POST"){
                // $title   = $_POST['title'];
                $title = $input->values['title'];
                // $content = $_POST['content'];
                $content = $input->values['content'];
                // $cat     = $_POST['cat'];
                $cat     = $input->values['cat'];
            // }
            $data = array(
                "title"   => $title,
                "content" => $content,
                "cat"     => $cat
            );
            $postModel =  $this->load->model("PostModel");
            $result = $postModel->insertPost($table,$data);
            $mdata = array();
            if($result == 1){
                $mdata['msg'] = "Article added successfully";
            }else{
                $mdata['msg'] = "Article not added successfully";
            }
            $url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
            header("location:$url");
        }else{
            $data['postErrors'] = $input->errors;
            $tableCat = "category";
            $this->load->view("admin/header");
            $this->load->view("admin/sidebar");

            $CatModel =  $this->load->model("catModel");
            $data["catList"] = $CatModel->catList($tableCat);

            $this->load->view("admin/addpost",$data);
            $this->load->view("admin/footer");      
        }
        
    // }
        }
    }
    public function articleList(){
        $tableCat = "category";
        $tablePost = "post";

        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $postModel =  $this->load->model("PostModel");
        $data["listPost"] = $postModel->getPostList($tablePost);

        $CatModel =  $this->load->model("catModel");
        $data["catList"] = $CatModel->catList($tableCat);

        $this->load->view("admin/postlist",$data);
        $this->load->view("admin/footer");    
    }
    public function editArticle($id=NULL){
        $tableCat = "category";
        $tablePost = "post";

        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $postModel =  $this->load->model("PostModel");
        $data["postbyid"] = $postModel->postById($tablePost,$id);

        $CatModel =  $this->load->model("catModel");
        $data["catList"] = $CatModel->catList($tableCat);

        $this->load->view("admin/editpost",$data);
        $this->load->view("admin/footer");
    }
    public function updatePost($id){
        $input = $this->load->validation('Dform');
        $input->post('title');
        $input->post('content');
        $input->post('cat');
        $cond = "id=$id";
        $table = "post";
        $title = $input->values['title'];
        $content = $input->values['content'];
        $cat     = $input->values['cat'];
        $data = array(
            "title"   => $title,
            "content" => $content,
            "cat"     => $cat
        );
        $postModel =  $this->load->model("PostModel");
        $result = $postModel->updatePost($table,$data,$cond);

        $mdata = array();
        if($result == 1){
            $mdata['msg'] = "Article updated successfully";
        }else{
            $mdata['msg'] = "Article not updated ";
        }
        $url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
        header("location:$url");
        
    }
    public function deleteArticle($id=NULL){
        $table = "post";
        $cond = "id=$id";
        $postModel =  $this->load->model("PostModel");
        $result = $postModel->delPostById($table,$cond);
        $mdata = array();
        if($result == 1){
            $mdata['msg'] = "Article deleted successfully";
        }else{
            $mdata['msg'] = "Article not deleted ";
        }
        $url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
        header("location:$url");      
    }
}
?>