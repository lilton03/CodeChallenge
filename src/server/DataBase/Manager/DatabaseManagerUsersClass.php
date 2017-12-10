<?php

require_once ('DatabaseCommonManagerClass.php');
class DatabaseManagerUsersClass extends DatabaseCommonManagerClass
{

    /**
     * @param $name
     * @param $hashName
     * @return array
     */
    public function register($name, $hashName){
    $this->query("INSERT INTO user_names (name,hash_name) VALUES ('$name','$hashName')");
    $id=$this->db->insert_id;
    return ['id'=>$id,'name'=>$name,'hash_name'=>$hashName];
    }

    /**
     * @param $name
     * @return array|null
     */
    public function getUserName($name){
    $this->query("SELECT * FROM user_names WHERE hash_name='$name'");
    $this->queryResult=$this->formatQueryResult(['name','id','hash_name']);
    return $this->queryResult[0];
    }
}