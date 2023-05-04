<?php

class Admin_complaints_Model extends Model
{

    function __construct()
    {
        parent::__construct();

    }

    function viewComplaints($type=""){
        if ($type==""){
            $sql = "SELECT * FROM `complaint`";
        }else{
            $sql = "SELECT * FROM `complaint` WHERE type='".$type."'";
        }

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $complaints = $stmt->fetchAll();

        return $complaints;
    }

    function updateComplaint($complaintID, $isChecked) {
        $sql = "UPDATE `complaint` SET checked ='" . $isChecked . "' WHERE complaintID ='" . $complaintID . "'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    function getComplainerEmail($complaintID){
        $sql  = $sql = "SELECT gamerID FROM `complaint` WHERE complaintID='".$complaintID."'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $complainerID = $row['gamerID'];

        $sql  = $sql = "SELECT * FROM `gamer` WHERE gamerID='".$complainerID."'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
        $complainer = $stmt->fetch(PDO::FETCH_ASSOC);

        return $complainer;
    }



}
