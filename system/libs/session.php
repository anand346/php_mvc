<?php

class Session{
    public static function init(){
        session_start();
    }
    public static function set($key,$val){
        $_SESSION[$key] = $val;
    }
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    public static function checkSession(){
        self::init();
        if(self::get("login") == false){
            self::destroy();
            header("location:".BASE_URL."/Login");
        }
    }
    public static function destroy(){
        session_unset();
        session_destroy();
    }
}

?>