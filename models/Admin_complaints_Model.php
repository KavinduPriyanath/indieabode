<?php

class Admin_complaints_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function viewComplaints(){
        $sql = "SELECT * FROM `complaint`";
        

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $complaints = $stmt->fetchAll();

        return $complaints;
    }

}
