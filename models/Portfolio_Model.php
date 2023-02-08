<?php

class Portfolio_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function GetDeveloperDetails($username)
    {

        $sql = "SELECT * FROM gamer WHERE username='$username' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        return $devDetails;
    }

    function GetAdditionalDeveloperDetails($username)
    {

        $sql = "SELECT * FROM gamer WHERE username='$username' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        $devID = $devDetails['gamerID'];

        $accountSQL = "SELECT * FROM account WHERE userID='$devID' LIMIT 1";

        $accountstmt = $this->db->prepare($accountSQL);

        $accountstmt->execute();

        $devAccountDetails = $accountstmt->fetch(PDO::FETCH_ASSOC);

        return $devAccountDetails;
    }

    function GetDeveloperGames($username)
    {

        $sql = "SELECT * FROM gamer WHERE username='$username' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        $devID = $devDetails['gamerID'];

        $gameSQL = "SELECT * FROM freegame WHERE gameDeveloperID='$devID'";

        $gamestmt = $this->db->prepare($gameSQL);

        $gamestmt->execute();

        $games = $gamestmt->fetchAll();

        return $games;
    }
}
