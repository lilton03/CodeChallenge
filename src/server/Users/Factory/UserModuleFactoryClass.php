<?php
require_once ("../Module/UsersModule.php");
require_once ("UsersManagerFactoryClass.php");
class UserModuleFactoryClass
{
    static function createManager(){
        return new UsersModule(UsersManagerFactoryClass::createUsersManger());
    }

}