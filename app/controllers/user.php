<?php
class User extends Dcontroller{
    public function __construct(){
        parent::__construct();
        $data = array();

    }
    public function makeUser(){
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");
        $this->load->view("admin/makeuser");
        $this->load->view("admin/footer");
    }
    public function Index(){
        $this->makeUser();
    }
    public function addNewUser(){
        if (!$_POST) {
            header("location:".BASE_URL."/User");
        } else {
            $input = $this->load->validation('Dform');
            $input->post('username');
            $input->post('password');
            $input->post('level');


            // if(!$_POST['submit']){
            //     header("location:".BASE_URL."/Admin");
            // }else{

                    $tableUser = "tbl_user";
                // if($_SERVER['REQUEST_METHOD'] == "POST"){
                    // $title   = $_POST['title'];
                    $username = $input->values['username'];
                    // $content = $_POST['content'];
                    $password = md5($input->values['password']);
                    // $cat     = $_POST['cat'];
                    $level     = $input->values['level'];
                // }
                $data = array(
                    "username"   => $username,
                    "password" => $password,
                    "level"     => $level
                );
                $UserModel =  $this->load->model("UserModel");
                $result = $UserModel->addUser($tableUser,$data);
                $mdata = array();
                if($result == 1){
                    $mdata['msg'] = "User Created successfully";
                }else{
                    $mdata['msg'] = "User not Created successfully";
                }
                $url = BASE_URL."/User/listUser?msg=".urlencode(serialize($mdata));
                header("location:$url");            
        }
        
    }
    public function listUser(){
        $this->load->view("admin/header");
        $this->load->view("admin/sidebar");

        $tableUser = "tbl_user";
        $UserModel =  $this->load->model("userModel");
        $data["users"] = $UserModel->userList($tableUser);

        $this->load->view("admin/userlist",$data);
        $this->load->view("admin/footer");
    }
    public function deleteUser($id=NULL){
        $tableUser = "tbl_user";
        $cond = "id=$id";
        $UserModel =  $this->load->model("UserModel");
        $result = $UserModel->delUserById($tableUser,$cond);
        $mdata = array();
        if($result == 1){
            $mdata['msg'] = "User deleted successfully";
        }else{
            $mdata['msg'] = "User not deleted ";
        }
        $url = BASE_URL."/user/listUser?msg=".urlencode(serialize($mdata));
        header("location:$url");      
    }
}
?>