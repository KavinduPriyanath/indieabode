<?php

class Feed_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showFeed($currentUserID)
    {
        $sql = 
        "SELECT devlog.devLogID,devlog.ActivityCheck,devlog.created_at,devlog.gameName,devlog.name,freegame.gameName,gamer.username,gamer.avatar
        FROM devlog 
        INNER JOIN freegame ON devlog.gameName = freegame.gameID
        INNER JOIN gamer ON freegame.gameDeveloperID = gamer.gamerID
        INNER JOIN followers ON gamer.gamerID = followers.following
        WHERE followers.follower= '$currentUserID'
        

        UNION 
        
        SELECT gig.gigID,gig.ActivityCheck,gig.created_at,gig.game,gig.name,freegame.gameName,gamer.username,gamer.avatar
        FROM gig 
        INNER JOIN freegame ON gig.game = freegame.gameID
        INNER JOIN gamer ON freegame.gameDeveloperID = gamer.gamerID
        INNER JOIN followers ON gamer.gamerID = followers.following
        WHERE followers.follower= '$currentUserID'

        UNION 
        
        SELECT crowdfund.crowdFundID,crowdfund.ActivityCheck,crowdfund.created_at,crowdfund.gameDeveloperName,crowdfund.name,freegame.gameName,gamer.username,gamer.avatar
        FROM crowdfund 
        INNER JOIN freegame ON crowdfund.gameName = freegame.gameID
        INNER JOIN gamer ON freegame.gameDeveloperID = gamer.gamerID
        INNER JOIN followers ON gamer.gamerID = followers.following
        WHERE followers.follower= '$currentUserID'



        UNION 
        
        SELECT freegame.gameID,freegame.ActivityCheck,freegame.created_at,freegame.gameDeveloperID,freegame.platform,freegame.gameName,gamer.username,gamer.avatar
        FROM freegame 
        INNER JOIN gamer ON freegame.gameDeveloperID = gamer.gamerID
        INNER JOIN followers ON gamer.gamerID = followers.following
        WHERE followers.follower= '$currentUserID'

        
      
        
        ORDER BY created_at DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

}
