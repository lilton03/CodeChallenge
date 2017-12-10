<?php
require_once ('../Module/UsersModule.php');

$usersController = new UsersController();
$route = isset($_GET['function'])?$_GET['function']:$_POST['function'];
$usersController->{$route}();
class UsersController{

    public function setOrGetNameController(){
    print_r(json_encode(setOrGetName($_POST['name'])));
    }
}
