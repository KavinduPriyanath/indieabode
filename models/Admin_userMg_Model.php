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

    function searchUsers($search_email, $search_id, $search_username, $search_user_role) {
        // build query based on search parameters
        $query = "SELECT * FROM gamer WHERE 1=1";
        if (!empty($search_email)) {
            $query .= " AND email='$search_email'";
        }
        if (!empty($search_id)) {
            $query .= " AND gamerID='$search_id'";
        }
        if (!empty($search_username)) {
            $query .= " AND username='$search_username'";
        }
        if (!empty($search_user_role)) {
            $query .= " AND userRole='$search_user_role'";
        }

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        $user_data = $stmt->fetchAll();

        return $user_data;
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
        $sql = "SELECT * FROM asset_stats WHERE assetID = ".$assetID;

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
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

        
        $sql = "SELECT * FROM gig_purchases WHERE publisherID = ".$user_id;
        

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }
    function getGig($gigID){

        
        $sql = "SELECT * FROM gig WHERE gigID = ".$gigID;
        

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gig = $stmt->fetch(PDO::FETCH_ASSOC);

        return $gig;
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

    
        $sql = "SELECT * FROM game_purchases WHERE buyerID = ".$user_id;

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

    function getGames($userid){
        $sql = "SELECT * FROM freegame WHERE gameDeveloperID=".$userid;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //echo $user;
        return $submissions;
    }
    function getSubmissionDetail($id){
        $sql = "SELECT * FROM freegame WHERE gameID=".$id;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetch(PDO::FETCH_ASSOC);

        return $submissions;
    }

    function getDwGame($id){
        $sql = "SELECT * FROM game_stats WHERE gameID=".$id;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetch(PDO::FETCH_ASSOC);

        //echo $user;
        return $submissions;
    }
    function getJamDetail($id){
        $sql = "SELECT * FROM gamejam WHERE gameJamID=".$id;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetch(PDO::FETCH_ASSOC);

        //echo $user;
        return $submissions;
    }

    function jamSubmissionAll($userid){
        $sql = "SELECT * FROM submission WHERE gamerID=".$userid;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //echo $user;
        return $submissions;
    }

    function getCreatedGig($id){
        $sql = "SELECT * FROM gig WHERE gameDeveloperID=".$id;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //echo $user;
        return $submissions;
    }
    function getPublisher($id){
        $sql = "SELECT * FROM gig_purchases WHERE gigID=".$id;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetch(PDO::FETCH_ASSOC);

        //echo $user;
        return $submissions;
    }

    function getcreateCwd($id){
        $sql = "SELECT * FROM crowdfund WHERE gameDeveloperName=".$id;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //echo $user;
        return $submissions;
    }
    function getdwdAssets($id){
        $sql = "SELECT * FROM asset_purchases WHERE buyerID=".$id;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //echo $user;
        return $submissions;
    }
    function getAsset($id){
        $sql = "SELECT * FROM freeasset WHERE assetID=".$id;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $submissions = $stmt->fetch(PDO::FETCH_ASSOC);

        //echo $user;
        return $submissions;
    }

    function getAllJams($userid){
        $sql = "SELECT * FROM gamejam WHERE jamHostID=".$userid;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $gamejams = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $gamejams;
    }

    function getRankingDataForGameJam($gameJamID) {
        $sql = "SELECT submissionID, rating FROM submission WHERE gameJamID = ? ORDER BY rating DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($gameJamID));
        $rankings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $rankingData = array(
            'firstPlace' => null,
            'secondPlace' => null,
            'thirdPlace' => null
        );
    
        if (count($rankings) > 0) {
            $rankingData['firstPlace'] = array(
                'submissionID' => $rankings[0]['submissionID'],
                'rating' => $rankings[0]['rating']
            );
        }
    
        if (count($rankings) > 1) {
            $rankingData['secondPlace'] = array(
                'submissionID' => $rankings[1]['submissionID'],
                'rating' => $rankings[1]['rating']
            );
        }
    
        if (count($rankings) > 2) {
            $rankingData['thirdPlace'] = array(
                'submissionID' => $rankings[2]['submissionID'],
                'rating' => $rankings[2]['rating']
            );
        }
    
        return $rankingData;
    }
}
