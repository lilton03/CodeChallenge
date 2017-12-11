<?php
require_once ("../Controller/CommentsController.php");
require_once ("CommentsModuleFactoryClass.php");
class CommentsControllerFactoryClass
{

    /**
     * @return CommentsController
     */
    static function createController(){
        return new CommentsController(CommentsModuleFactoryClass::createManager());
    }

}

