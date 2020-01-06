<?php


class UserManager
{
    protected  $userDB;

    public function __construct()
    {
        $db = new DBConnect('mysql:host=localhost;dbname=classicmodels;charset=utf8','root','password');
        $this->userDB = new UserDB($db->connect());
    }

   public function getList(){
        $user = $this->userDB->getList();
        include "process/user/list.php";
   }

   public function add($user)
   {
       $this->userDB->create($user);
   }

   public function delete($id)
   {
       $this->userDB->delete($id);
   }

   public function edit($id,$name,$age,$address,$image)
   {
       $this->userDB->edit($id,$name,$age,$address,$image);
   }

   public function getUserID($id)
   {
       return $this->userDB->getValueID($id);
   }

}