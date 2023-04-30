<?php

class Admin_userMg_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function viewUser($usertype=""){
        if ($usertype==""){
            $sql = "SELECT * FROM `gamer` WHERE accountStatus=1";
        }

        else{
            $sql = "SELECT * FROM `gamer` WHERE accountStatus=1 AND userRole='".$usertype."'";
        }
        

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetchAll();

        return $user;
    }

    function viewBlockUser($usertype=""){
        $sql = "SELECT * FROM `gamer` WHERE accountStatus=0";
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetchAll();

        return $user;
    }

    

    function delete_user($user_id){
        $sql = "UPDATE gamer SET accountStatus=0 WHERE gamerID = ".$user_id;

        $stmt = $this->db->prepare($sql);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function unblock_user($user_id){
        $sql = "UPDATE gamer SET accountStatus=1 WHERE gamerID = ".$user_id;

        $stmt = $this->db->prepare($sql);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


    function download_user($user_id){
        $sql = "SELECT * FROM gamer WHERE gamerID = ".$user_id;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }


    //Report for asset creator
    function assetCreator($user_id){

        
        $sql = "SELECT * FROM freeasset WHERE assetCreatorID = ".$user_id;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }

    function downloadAssets($assetID){
        $sql = "SELECT COUNT(*) AS total FROM downloadasset WHERE assetID = ".$assetID;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $downloads = $row['total'];

        return $downloads;
    }

    function assetPrice($assetID){

        //count total downloads of the specific asset 
        $sql = "SELECT COUNT(*) AS total FROM downloadasset WHERE assetID = ".$assetID;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $downloads = $row['total'];


        // get the price of the specific asset
        $getprice = "SELECT assetPrice FROM freeasset WHERE assetID = ".$assetID;

        $stmt1 = $this->db->prepare($getprice);

        $stmt1->execute();

        $assetP = $stmt1->fetch(PDO::FETCH_ASSOC);

        $unitPrice = $assetP['assetPrice'];

        //calculate total earning
        if($downloads == 0 || $unitPrice == 0)
            $totalPrice = 0;
        else
            $totalPrice = $downloads * $unitPrice;

        return $totalPrice;

    }


    //Report for Game Publisher
    function gamePublisher($user_id){

        
        $sql = "SELECT * FROM gig WHERE gamePublisherID = ".$user_id;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }

     //Report for Game Jam Organizer
    function JamOrganizer($user_id){

        
        $sql = "SELECT * FROM gamejam WHERE jamHostID = ".$user_id;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }

    function getTotalSubmissions($jamID){
        $sql = "SELECT COUNT(*) AS total FROM submission WHERE gameJamID = ".$jamID;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $submissions = $row['total'];

        // print_r($row);

        return $submissions;
    }

    function getFirstPlace($jamID){
        if ($jamID === null) {
            return null;
        }
    
        $sql = "SELECT submissionID FROM submission WHERE gameJamID = ".$jamID." ORDER BY rating ASC LIMIT 1";
    
        $stmt = $this->db->prepare($sql);
    
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
    
        $firstSubmission = $row['submissionID'];
    
        $sql1 = "SELECT * FROM freegame WHERE gameID = ".$firstSubmission;
    
        $stmt = $this->db->prepare($sql1);
    
        $stmt->execute();
    
        $submission = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        print_r($submission);
        return $submission;  
    }
    
    //Report for Gamer
    function gamer($user_id){

    
        $sql = "SELECT * FROM downloadgame WHERE gamerID = ".$user_id;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }

    function dwGames($gameid){

    
        $sql = "SELECT * FROM freegame WHERE gameID = ".$gameid;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $game = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //echo $user;
        return $game;
    }

    function participateCrowdfund($userid){
        $sql = "SELECT * FROM participatecrowdfund WHERE gamerID = ".$userid;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $donatedcrowdfunds = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //echo $user;
        return $donatedcrowdfunds;
    }

    function getCrowdfund($id){
        $sql = "SELECT * FROM crowdfund WHERE crowdFundID = ".$id;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $crowdfund = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //echo $user;
        return $crowdfund;
    }

    //rated jams 
    function getRatedSubmissions($userid){
        $sql = "SELECT * FROM ratesubmission WHERE gamerID = ".$userid;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //echo $user;
        return $submissions;
    }

    function getJam($id){
        $sql = "SELECT * FROM submission WHERE submissionID = ".$id;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $jam = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $jamid = $jam[0]['gameJamID'];

        $sql = "SELECT * FROM gamejam WHERE gameJamID = ".$jamid;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $ratedjam = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $ratedjam;
    }
}
