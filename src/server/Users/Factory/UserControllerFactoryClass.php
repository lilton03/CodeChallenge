<?php
require_once ('UserModuleFactoryClass.php');
require_once ('../Controller/UsersController.php');

class UserControllerFactoryClass
{
    /**
     * @return UsersController
     */
    static function createController(){
        return new UsersController(UserModuleFactoryClass::createManager());
    }
}