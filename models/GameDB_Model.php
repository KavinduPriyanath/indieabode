<?php

class GameDB_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function userCount()
    {
        $stmt = $this->db->prepare("SELECT * FROM gamer");
        $stmt->execute();

        $users = $stmt->fetchAll();

        $count = 0;

        foreach ($users as $user) {
            $count += 1;
        }

        return $count;
    }

    // function totalDownloads(){
    //     $stmt = $this->db->prepare("SELECT * FROM gamer");
    //     $stmt->execute();

    //     $users = $stmt->fetchAll();

    //     $count = 0;

    //     foreach ($users as $user) {
    //         $count += 1;
    //     }

    //     return $count;

    // }
}
