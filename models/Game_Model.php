<?php

class Game_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showSingleGame($id)
    {
        $sql = "SELECT * FROM freegame WHERE gameID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        return $game;
    }

    function getGameDeveloper($game)
    {
        $gameDeveloperID = $game['gameDeveloperID'];

        $sql = "SELECT * FROM gamer WHERE gamerID='$gameDeveloperID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gameDeveloper = $stmt->fetch(PDO::FETCH_ASSOC);

        return $gameDeveloper;
    }

    // function getScreenshots($id)
    // {
    //     $sql = "SELECT * FROM freeasset WHERE assetID='$id' LIMIT 1";

    //     $stmt = $this->db->prepare($sql);

    //     $stmt->execute();

    //     $asset = $stmt->fetch(PDO::FETCH_ASSOC);

    //     $ss = $asset['assetScreenshots'];

    //     $screenshots = explode(',', $ss);

    //     return $screenshots;
    // }

    function getScreenshots($id)
    {
        $sql = "SELECT * FROM freegame WHERE gameID='$id' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        $ss = $game['gameScreenshots'];

        $screenshots = explode(',', $ss);

        return $screenshots;
    }

    function PopularGames()
    {
        $stmt = $this->db->prepare("SELECT * FROM freegame LIMIT 4");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function ComplaintReasons()
    {

        $stmt = $this->db->prepare("SELECT * FROM complaint_reasons_items");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function Reviews($data)
    {

        $sql = "INSERT INTO game_reviews(rating, review) VALUES (:rating, :review)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute($data);
    }

    function FetchReviews()
    {

        $stmt = $this->db->prepare("SELECT * FROM game_reviews ORDER BY id DESC");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
