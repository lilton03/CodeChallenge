<?php
require_once ('../Factory/UserControllerFactoryClass.php');
require_once ('../../Common/Controller/CommonController.php');


class UsersController extends CommonController {
    protected $userModule;

    function __construct($userModule)
    {
        /** @var UsersModule $userModule */
        $this->userModule=$userModule;
    }

    public function setOrGetNameController(){
    print_r(json_encode($this->userModule->setOrGetName($_POST['name'])));
    }
}

$usersController = UserControllerFactoryClass::createController();
$usersController->getFunction();