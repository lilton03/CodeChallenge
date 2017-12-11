<?php
require_once ('../../Common/Controller/CommonController.php');
require_once ('../Factory/CommentsControllerFactoryClass.php');

class CommentsController extends CommonController
{
    protected $commentsModule;

    function __construct($commentsModule)
    {
        /** @var CommentsModule $commentsModule */
        $this->commentsModule=$commentsModule;
    }

    /**
     *Controller for inserting a comment
     */
    function insertCommentController()
    {
        $comment=$_POST['comments'];
        $level=$_POST['level'];
        $parent=$_POST['parent'];
        $userId=$_POST['user_id'];
        $userName=$_POST['user_name'];
        print_r(json_encode($this->commentsModule->insertNewComment($comment,$level,$parent,$userId,$userName)));
    }

    /**
     *Controller for getting Comments
     */
    function getCommentsController()
    {
        print_r(json_encode($this->commentsModule->getComments()));
    }

    /**
     *Controller for getting Comments within a comment
     */
    function getChildCommentsController()
    {
        $parentId=$_GET['parent_id'];
        print_r(json_encode($this->commentsModule->getChildComments($parentId)));
    }

}

$CommentsController = CommentsControllerFactoryClass::createController();
$CommentsController->getFunction();

