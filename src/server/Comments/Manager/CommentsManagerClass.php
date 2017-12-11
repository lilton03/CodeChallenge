<?php


class CommentsManagerClass
{

    protected $commentsDatabaseManager;

    function __construct($commentsDatabaseManager)
    {
        /** @var DatabaseManagerCommentsClass $commentsDatabaseManager */
        $this->commentsDatabaseManager=$commentsDatabaseManager;
    }

    /**
     * @param $comment
     * @return string
     */
    private function cleanComment($comment){
        return htmlentities($comment);
    }

    /**
     * @param $comment
     * @param $level
     * @param $parentId
     * @param $userId
     * @return array
     */
    public function insertComment($comment, $level, $parentId, $userId)
    {
        $id = 0;
        $commentTime = 0;
        if (isset($commentTime) && isset($level) && isset($parentId) && isset($userId) && isset($comment)
            && is_numeric($level) && is_numeric($parentId) && is_numeric($userId) &&
            !is_float($level) && !is_float($parentId) && !is_float($userId)
        ) {
            $comment = $this->cleanComment($comment);
            $commentTime = (new\DateTime('now'))->format('Y-m-d H:i:s');
            $id = $this->commentsDatabaseManager->insertComment(intval($parentId),$comment,intval($level),intval($userId), $commentTime);
        }

        return [$id, $commentTime,$level,$parentId,$userId,$comment];
    }

    /**
     * @param $parentId
     * @return array|null
     */
    public function getCommentChildren($parentId){
        $childComments=[];
        if(isset($parentId) && is_numeric($parentId) && !is_float($parentId))
        $childComments=$this->commentsDatabaseManager->getAllChildComments(intval($parentId));
        return $childComments;
    }

    /**
     * @return array|null
     */
    public function getComments(){
        return $this->commentsDatabaseManager->getAllParentComments();
    }

    /**
 * @return DatabaseManagerCommentsClass
    */public function getCommentsDatabaseManager()
    {
    return $this->commentsDatabaseManager;
    }


}