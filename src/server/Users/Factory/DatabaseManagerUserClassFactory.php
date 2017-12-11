<?php
require_once ("../Manager/DatabaseManagerUsersClass.php");

class DatabaseManagerUserClassFactory
{
    /**
     * @return DatabaseManagerUsersClass
     */
    static function createDataBaseManager()
    {
        $config = (include "../../../Config.php");
        /** @var mysqli $conn */
        $conn = new mysqli(
            $config['db_config']['hostname'],
            $config['db_config']['username'],
            $config['db_config']['password'],
            $config['db_config']['database']
        );
        if ($conn->connect_error) {
            die('Connection Failed:' . $conn->connect_error);
        }
        return new DatabaseManagerUsersClass($conn,'user_names');
    }
}