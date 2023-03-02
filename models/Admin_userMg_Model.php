<?php

class Admin_userMg_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function viewUser($filter_text=""){

        

        if ($filter_text==""){
            $sql = "SELECT * FROM `gamer` WHERE accountStatus=1";
        }

        else{
            $sql = "SELECT * FROM `gamer` WHERE accountStatus=0 AND userRole= '".$filter_text."'";
        }
        

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetchAll();
        //print_r($user);

       return $user;
    }

    

    function delete_user($user_id){
        $sql = "UPDATE gamer SET accountStatus=0 WHERE gamerID = ".$user_id;

        $stmt = $this->db->prepare($sql);

        if($stmt->execute()){
            return true;

        }else{
            return false;
        }
    }

    function download_user($user_id){
        $sql = "SELECT * FROM gamer WHERE gamerID = ".$user_id;

        $stmt = $this->db->prepare($sql);

        // if($stmt->execute()){
        //     return true;

        // }else{
        //     return false;
        // }

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
}
