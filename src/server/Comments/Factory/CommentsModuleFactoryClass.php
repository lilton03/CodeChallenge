<?php
require_once ("../Module/CommentsModule.php");
require_once ("../Manager/CommentsManagerClass.php");
require_once ("CommentsManagerFactoryClass.php");
class CommentsModuleFactoryClass
{

    /**
     * @return CommentsModule
     */
    static function createManager(){
        return new CommentsModule(CommentsManagerFactoryClass::createCommentsManger());
    }



}