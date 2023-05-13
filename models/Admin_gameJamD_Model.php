<?php

class Admin_gameJamD_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    function getAllJams(){
        $sql = "SELECT * FROM gamejam";
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
    
    
    function getGameName($id=""){
        if($id==""){
            $complaints = "No name";
        }else{
            $sql = "SELECT gameName as name from freegame WHERE gameID=".$id;
            $stmt = $this->db->prepare($sql);
    
            $stmt->execute();
    
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // $complaints = $row['name'];
            if ($row && isset($row['name'])) {
                $complaints = $row['name'];
            } else {
                $complaints = "No name";
            }
        }

   

    return $complaints;
}
    
    
}
