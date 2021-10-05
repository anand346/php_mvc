<?php
class Test extends Dcontroller{
    function __construct()
    {
        parent::__construct();
    }
    public function anand($params = false){
        echo "hello form anand ".$params;
    }
}
?>