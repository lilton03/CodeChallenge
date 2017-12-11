<?php
require_once('DatabaseManagerCommentsClassFactory.php');
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