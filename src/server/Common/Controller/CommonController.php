<?php


class CommonController
{
    /**
     *
     */
    public function getFunction(){
        $name = isset($_GET['function'])?$_GET['function']:$_POST['function'];
        $this->{$name}();
    }

}