<?php

class Index_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    // function showRecentGames()
    // {
    //     $sql = "SELECT * FROM freeagame ORDER BY created_at LIMIT 4";

    //     $stmt = $this->db->prepare($sql);

    //     $stmt->execute();

    //     return $stmt->fetchAll();
    // }
}
