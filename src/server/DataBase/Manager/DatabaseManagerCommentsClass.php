<?php
require_once ('DatabaseCommonManagerClass.php');
class DatabaseManagerCommentsClass extends DatabaseCommonManagerClass
{


    /**
     * @param $parentId
     * @return array|null
     */
    public function getAllChildComments($parentId){
        $query="
                SELECT user_names.name,user_comments.*
                FROM user_names
                RIGHT JOIN user_comments ON user_names.id = user_comments.comment_user
                WHERE user_comments.parent_comment =".$parentId."
                ORDER BY user_comments.comment_time
                ;
                ";
        $this->query($query);
        $this->queryResult=$this->formatQueryResult(['id','comment_data','comment_time','parent_comment','children','name','comment_level']);
        return $this->queryResult;
    }

    /**
     * @param $parentId
     * @param $comment
     * @param $level
     * @param $userId
     * @param $commentTime
     * @return mixed
     */
    public function insertComment($parentId, $comment, $level, $userId, $commentTime){
        $comment = $this->db->real_escape_string($comment);
        $this->query("INSERT INTO user_comments (comment_data  , comment_user , comment_time , parent_comment , comment_level ) VALUES ('$comment','$userId','$commentTime','$parentId','$level')");
        $id=$this->db->insert_id;
        if($id)
        $this->query("UPDATE user_comments SET children = children+1 WHERE id='$parentId'");
        return $id;
    }

    /**
     * @return array|null
     */
    public function getAllParentComments(){
        $query="
                SELECT user_names.name,user_comments.*
                FROM user_names
                RIGHT JOIN user_comments ON user_names.id = user_comments.comment_user
                WHERE user_comments.parent_comment=0
                ORDER BY user_comments.comment_time
                ;
                ";
        $this->query($query);
        $this->queryResult=$this->formatQueryResult(['id','comment_data','comment_time','parent_comment','children','name','comment_level']);
        return $this->queryResult;
    }



}