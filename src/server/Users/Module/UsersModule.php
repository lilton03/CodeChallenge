<?php
class UsersModule
{
    protected $userManager;
    function __construct($userManager)
    {
        /** @var UsersManagerClass $userManager */
        $this->userManager=$userManager;
    }

    /**
     * @param $name
     * @return array
     */
    function setOrGetName($name)
    {
        $status = 400;
        $success = false;
        $data = $this->userManager->setName($name);
        if ($data['id']) {
            $status = 200;
            $success = true;
        }
        $this->userManager->getUsersDataBaseManager()->close_connection();
        return ['response' => ['data' => $data, 'status' => $status, 'success' => $success]];
    }
}