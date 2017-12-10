<?php
require_once ('../Factory/CommentsManagerFactoryClass.php');
/**
 * @return array
 */
function getComments(){
    $status=400;
    $success=false;
    /** @var CommentsManagerClass $commentsManager */
    $commentsManager=CommentsManagerFactoryClass::createCommentsManger();
    $comments=$commentsManager->getComments();
    if(count($comments)){
        $status=200;
        $success=true;
    }
    return ['response'=>['data'=>$comments,'status'=>$status,'success'=>$success]];
}

/**
 * @param $parentId
 * @return array
 */
function getChildComments($parentId){
    $status=400;
    $success=false;
    /** @var CommentsManagerClass $commentsManager */
    $commentsManager=CommentsManagerFactoryClass::createCommentsManger();
    $comments=$commentsManager->getCommentChildren($parentId);
    if(count($comments)){
        $status=200;
        $success=true;
    }
    return ['response'=>['data'=>$comments,'status'=>$status,'success'=>$success]];
}

/**
 * @param $comment
 * @param $level
 * @param $parent
 * @param $user
 * @return array
 */
function insertNewComment($comment, $level, $parent, $userId,$userName){
    $status=400;
    $success=false;
    $commentsManager=CommentsManagerFactoryClass::createCommentsManger();
    $result=$commentsManager->insertComment($comment,$level,$parent,$userId);
    if($result[0]){
        $status=200;
        $success=true;
    }
    return [
        'response'=>['data'=>['id'=>$result[0],'comment_time'=>$result[1],'comment_level'=>$result[2], 'parent_comment'=>$result[3],'children'=>0,
            'name'=>$userName,'comment_data'=>$result[5]
        ],'status'=>$status,'success'=>$success]];
}
