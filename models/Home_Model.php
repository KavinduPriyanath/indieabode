<?php

class Home_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showRecentGames()
    {
        $sql = "SELECT * FROM freegame ORDER BY created_at DESC LIMIT 4";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showRecentAssets()
    {
        $sql = "SELECT * FROM freeasset ORDER BY created_at DESC LIMIT 4";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showRecentDevlogs()
    {
        $sql = "SELECT * FROM devlog ORDER BY CreatedDate DESC LIMIT 4";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showRecentGigs()
    {
        $sql = "SELECT * FROM gig ORDER BY created_at DESC LIMIT 4";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
