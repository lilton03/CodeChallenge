<?php
require_once ('../Module/CommentsModule.php');

$CommentsController = new CommentsController();
$route = isset($_GET['function'])?$_GET['function']:$_POST['function'];
$CommentsController->{$route}();


class CommentsController
{
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
        print_r(json_encode(insertNewComment($comment,$level,$parent,$userId,$userName)));
    }

    /**
     *Controller for getting Comments
     */
    function getCommentsController()
    {
        print_r(json_encode(getComments()));
    }

    /**
     *Controller for getting Comments within a comment
     */
    function getChildCommentsController()
    {
        $parentId=$_GET['parent_id'];
        print_r(json_encode(getChildComments($parentId)));
    }


}


