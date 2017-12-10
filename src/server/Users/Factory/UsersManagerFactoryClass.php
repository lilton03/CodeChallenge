<?php
require_once('../../DataBase/Factory/DatabaseManagerUserClassFactory.php');
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