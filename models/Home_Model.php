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

    //Gamer Home Page
    function TopSellers()
    {

        $sql = "SELECT freegame.gameID, freegame.gameName, freegame.gameTagline, freegame.gamePrice, freegame.gameCoverImg 
                FROM freegame INNER JOIN game_stats ON freegame.gameID = game_stats.gameID ORDER BY game_stats.revenue DESC LIMIT 8";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function NewReleases()
    {

        $sql = "SELECT * FROM freegame ORDER BY created_at DESC LIMIT 8";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function MostPopular()
    {

        $sql = "SELECT freegame.gameID, freegame.gameName, freegame.gameTagline, freegame.gamePrice, freegame.gameCoverImg 
                FROM freegame INNER JOIN game_stats ON freegame.gameID = game_stats.gameID ORDER BY game_stats.views 
                DESC LIMIT 8";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function TopRated()
    {

        $sql = "SELECT freegame.gameID, freegame.gameName, freegame.gameTagline, freegame.gamePrice, freegame.gameCoverImg 
                FROM freegame INNER JOIN game_stats ON freegame.gameID = game_stats.gameID ORDER BY game_stats.ratings
                DESC LIMIT 8";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function ComingSoon()
    {

        $sql = "SELECT * FROM freegame WHERE releaseStatus='Upcoming' ORDER BY created_at DESC LIMIT 8";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
