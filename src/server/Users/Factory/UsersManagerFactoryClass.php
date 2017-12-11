<?php
require_once('DatabaseManagerUserClassFactory.php');
require_once('../Manager/UsersManagerClass.php');

class UsersManagerFactoryClass
{
    /**
     * @return UsersManagerClass
     */
    static function createUsersManger(){
        return new UsersManagerClass(DatabaseManagerUserClassFactory::createDatabaseManager());
    }

}