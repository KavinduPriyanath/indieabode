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

}
