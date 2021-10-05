<?php

spl_autoload_register(function($class){
    include_once  "system/libs/".$class.".php";
});
include_once  "app/config/config.php";
// include_once "system/libs/main.php";
// include_once "system/libs/Dcontroller.php";
// include_once "system/libs/Dmodel.php";
// include_once "system/libs/Database.php";
// include_once "system/libs/load.php";

// if(isset($_GET['url'])){
//     $url = explode("/",filter_var(rtrim($_GET['url'],"/"),FILTER_SANITIZE_URL));
//     $file = "app/controllers/".$url[0].".php";
//     if(file_exists($file)){
//         include $file;
//         $controller = new $url[0];
//         if(isset($url[1])){
//             if(method_exists($controller,$url[1])){
//                 if(isset($url[2])){
//                     $controller->{$url[1]}($url[2]);
//                 }else{
//                     $controller->{$url[1]}();
//                 }
//             }
//         }
        
//     } 
// }else{
//     include "app/controllers/index.php";
//     $controller = new Index();
//     $controller->home();
// }
$main = new Main();
?>
















