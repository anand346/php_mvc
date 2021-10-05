<?php
class Login extends Dcontroller{
    public function __construct(){
        parent::__construct();    
    }
    public function index(){
        $this->login();
    }
    public function login(){
        session::init();
        if(session::get("login") == "true"){
            header("location:".BASE_URL."/admin");
        }
        $this->load->view("login/login");
    }
    public function loginAuth(){
        $table = "tbl_user";
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $loginModel = $this->load->model("loginModel");
        $count = $loginModel->userControl($table,$username,$password);
        if($count == 1){
            $result = $loginModel->getUserData($table,$username,$password);
            session::init();
            session::set("login","true");
            session::set("userId",$result[0]['id']);
            session::set("username",$result[0]['username']);
            session::set("level",$result[0]['level']);
            header("location:".BASE_URL."/Admin");
        }else{
            header("location:".BASE_URL."/login");
        }
    }
    public function logout(){
        session::init();
        session::destroy();
        header("location:".BASE_URL."/login");
    }
}
?>