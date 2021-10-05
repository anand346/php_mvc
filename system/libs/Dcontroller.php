<?php
class Dcontroller{
    protected $load = array();
    public function __construct()
    {
        $this->load = new Load();
        // echo "from parent Dcontroller<br>";
    }
}

?>