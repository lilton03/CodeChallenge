<?php


class UsersManagerClass{
protected $usersDataBaseManager;

    /**
     * UsersManagerClass constructor.
     *
     * @param $usersDataBaseManager
     */
    function __construct($usersDataBaseManager){
    /** @var DatabaseManagerUsersClass $usersDataBaseManager */
    $this->usersDataBaseManager=$usersDataBaseManager;
    }

    /**
     * @param $name
     * @return array|null
     */
    public function setName($name){
        $ret=['id'=>0,'name'=>''];
        if(isset($name) && strlen($name)>0) {
            /*check if name given is in hex*/
            if ($name[0]!== "{" || $name[strlen($name)-1]!== "}") {
                /*if it is not in hex, then register the name if it is not in use yet*/
                $hash_name = $this->getNameHash($name);
                if(strlen($hash_name)>0)
                $ret = $this->usersDataBaseManager->register($name, $hash_name);
            } else if($name[0]==='{' && $name[strlen($name)-1]==='}') {
                /* else if given name is in hex, then get the record of the given hex hash*/
                $name =substr($name,1);
                $name =substr($name,0,-1);
                $name = trim($name);
                if(strlen($name) > 0)
                    $ret = $this->usersDataBaseManager->getUserName($name);
            }
        }
        return $ret;
    }

    /**
     * @param $name
     * @return string
     * Hash Function for user names
     */
    protected function getNameHash($name){
        $ret=0;
        $name=trim($name);
        for($i=0;$i<strlen($name);$i++){
            $ret+=(ord($name)*($i+1));
        }
        return dechex($ret);
    }
}