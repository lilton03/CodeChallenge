<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/CodingChallenge/src/server/DataBase/Manager/DatabaseManagerCommentsClass.php');
class DatabaseManagerCommentsClassFactory
{

    /**
     * @return DatabaseManagerCommentsClass
     */
    static function createDatabaseManager(){
   $config = (include $_SERVER['DOCUMENT_ROOT'].'/CodingChallenge/src/server/DataBase/Config.php');
    /** @var mysqli $conn */
    $conn = new mysqli(
           $config['db_config']['hostname'],
           $config['db_config']['username'],
           $config['db_config']['password'],
           $config['db_config']['database']
   );
   if($conn->connect_error){
   die('Connection Failed:'. $conn->connect_error);
   }
   return new DatabaseManagerCommentsClass($conn,'user_comments');
}




}