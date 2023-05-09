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
        
        $today = date('Y-m-d H:i:s');
        foreach ($gamejams as &$gamejam) {
            if ($gamejam['votingEndDate'] < $today) {
                $gamejam['status'] = 'Jam has ended on '.$gamejam['votingEndDate'].' (Voting period ended)';
                $gamejam['tag'] = "Jam Ended";
            } elseif ($gamejam['submissionStartDate'] <= $today && $gamejam['votingEndDate'] >= $today) {
                $gamejam['status'] = 'Jam voting is ongoing and voting will be ended on '.$gamejam['votingEndDate'];
                $gamejam['tag'] = "Jam Voting Ongoing";
            } elseif ($gamejam['submissionEndDate'] >= $today) {
                $gamejam['status'] = 'Jam submission is ongoing and jam submission end and voting period would start on '.$gamejam['submissionEndDate'];
                $gamejam['tag'] = "Jam Submission Ongoing";
            } else {
                $gamejam['status'] = 'Jam not yet started and submissions will be start on '.$gamejam['submissionStartDate'];
                $gamejam['tag'] = "Jam Not yet Started";
            }
        }
        return $gamejams;
    }
    
}
