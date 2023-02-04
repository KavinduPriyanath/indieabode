<?php

class Admin_userMg_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function viewUser(){
        $sql = "SELECT * FROM gamer WHERE accountStatus = 0";
    
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetchAll();
        //print_r($user);

       return $user;
    }

    function delete_user($user_id){
        $sql = "UPDATE gamer SET accountStatus=1 WHERE gamerID = ".$user_id;

        $stmt = $this->db->prepare($sql);

        if($stmt->execute()){
            return true;

        }else{
            return false;
        }
    }
}
