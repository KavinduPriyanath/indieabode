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

    //For showing the games of game developer that he has published to the public
    function GetDeveloperGames($username)
    {

        $sql = "SELECT freegame.gameID, freegame.gameName, freegame.gamePrice, freegame.gameTagline,
                freegame.gameCoverImg, freegame.gameVisibility, freegame.gameClassification FROM freegame 
                INNER JOIN gamer ON freegame.gameDeveloperID=gamer.gamerID 
                WHERE gamer.username='$username' AND freegame.gameVisibility = 'public'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
