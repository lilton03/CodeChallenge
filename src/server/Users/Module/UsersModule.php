<?php
require_once ('../Factory/UsersManagerFactoryClass.php');
/**
 * @param $name
 * @return array
 */
function setOrGetName($name){
    $status=400;
    $success=false;
    /** @var UsersManagerClass $usersManager */
    $usersManager=UsersManagerFactoryClass::createUsersManger();
    $data=$usersManager->setName($name);
    if($data['id']){
        $status=200;
        $success=true;
    }
    $usersManager->getUsersDataBaseManager()->close_connection();
    return['response'=>['data'=>$data,'status'=>$status,'success'=>$success]];
}