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

    function FollowUser($follower, $followingUser)
    {

        $sql = "INSERT INTO followers(follower, following) VALUES ('$follower', '$followingUser')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function UnFollowUser($follower, $followingUser)
    {

        $sql = "DELETE FROM followers WHERE follower='$follower' AND following='$followingUser'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function IsFollowing($visitor, $accountOwner)
    {

        $sql = "SELECT * FROM followers WHERE follower='$visitor' AND following='$accountOwner'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function UpdateFollowerDetails($follower, $task)
    {

        $sql = "SELECT * FROM account WHERE userID='$follower'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $followingCount = $user['following'];

        if ($task == "followed") {
            $newFollowingCount = $followingCount + 1;
        } else if ($task == "unfollowed") {
            $newFollowingCount = $followingCount - 1;
        }

        $updateSQL = "UPDATE account SET following='$newFollowingCount' WHERE userID='$follower'";

        $updateStmt = $this->db->prepare($updateSQL);

        $updateStmt->execute();
    }

    function UpdateFolloweeDetails($follower, $task)
    {

        $sql = "SELECT * FROM account WHERE userID='$follower'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $followersCount = $user['followers'];

        if ($task == "followed") {
            $newFollowersCount = $followersCount + 1;
        } else if ($task == "unfollowed") {
            $newFollowersCount = $followersCount - 1;
        }

        $updateSQL = "UPDATE account SET followers='$newFollowersCount' WHERE userID='$follower'";

        $updateStmt = $this->db->prepare($updateSQL);

        $updateStmt->execute();
    }
}
