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
    //Gamer Home Page
    //Gamer Home Page
    //Gamer Home Page
    //Gamer Home Page
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

    //organizer homepage
    //organizer homepage
    //organizer homepage
    //organizer homepage
    //organizer homepage
    function showThisMonthJams()
    {

        $currentMonth = date('m');

        $likeQuery = '_____' . $currentMonth . '%';

        $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, gamejam.jamTagline,gamejam.jamCoverImg,
                gamejam.joinedCount, gamer.username FROM gamejam INNER JOIN gamer ON 
                gamejam.jamHostID=gamer.gamerID WHERE submissionStartDate LIKE '$likeQuery' LIMIT 4";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }


    function showUpcomingJams()
    {

        $currentDateTime = date('Y-m-d h:i:s');

        $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, gamejam.jamTagline,gamejam.jamCoverImg,
                gamejam.joinedCount, gamer.username FROM gamejam INNER JOIN gamer ON 
                gamejam.jamHostID=gamer.gamerID WHERE submissionStartDate >= '$currentDateTime' LIMIT 4";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showPastJams()
    {

        $currentDateTime = date('Y-m-d h:i:s');

        $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, gamejam.jamTagline,gamejam.jamCoverImg,
                gamejam.joinedCount, gamer.username FROM gamejam INNER JOIN gamer ON 
                gamejam.jamHostID=gamer.gamerID WHERE votingEndDate < '$currentDateTime' ORDER BY votingEndDate DESC LIMIT 4";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }


    //publisher homepage
    //publisher homepage
    //publisher homepage
    //publisher homepage

    function showPopularGigs()
    {

        $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM gig INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1 ORDER BY gig.viewCount DESC LIMIT 4";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showLatestGigs()
    {

        $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM gig INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1 ORDER BY gig.created_at DESC LIMIT 4";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showMostDemandGigs()
    {

        $sql = "SELECT gig.gigID, gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, 
                gamer.firstName, gamer.lastName, gamer.avatar, gamer.trustrank
                FROM gig INNER JOIN gamer ON gamer.gamerID = gig.gameDeveloperID WHERE gigStatus != 1 ORDER BY gig.requests DESC LIMIT 4";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }


    //creator homepage
    //creator homepage
    //creator homepage
    //creator homepage
    //creator homepage
    function TopSellerAssets()
    {

        $sql = "SELECT freeasset.assetID, freeasset.assetName, freeasset.assetTagline, freeasset.assetPrice, freeasset.assetCoverImg, freeasset.assetType 
        FROM freeasset INNER JOIN asset_stats ON freeasset.assetID = asset_stats.assetID ORDER BY asset_stats.revenue DESC LIMIT 8";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function NewReleaseAssets()
    {
        $sql = "SELECT * FROM freeasset ORDER BY created_at DESC LIMIT 8";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function MostPopularAssets()
    {

        $sql = "SELECT freeasset.assetID, freeasset.assetName, freeasset.assetTagline, freeasset.assetPrice, freeasset.assetCoverImg, freeasset.assetType 
        FROM freeasset INNER JOIN asset_stats ON freeasset.assetID = asset_stats.assetID ORDER BY asset_stats.views DESC LIMIT 8";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function TopRatedAssets()
    {

        $sql = "SELECT freeasset.assetID, freeasset.assetName, freeasset.assetTagline, freeasset.assetPrice, freeasset.assetCoverImg, freeasset.assetType 
        FROM freeasset INNER JOIN asset_stats ON freeasset.assetID = asset_stats.assetID ORDER BY asset_stats.ratings DESC LIMIT 8";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
