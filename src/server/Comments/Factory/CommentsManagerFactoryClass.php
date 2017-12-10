<?php
require_once('../../DataBase/Factory/DatabaseManagerCommentsClassFactory.php');
require_once('../Manager/CommentsManagerClass.php');
class CommentsManagerFactoryClass
{
    /**
     * @return CommentsManagerClass
     */
    static function createCommentsManger(){
    return new CommentsManagerClass(DatabaseManagerCommentsClassFactory::createDatabaseManager());
}
}