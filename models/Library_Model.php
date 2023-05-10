<?php

class Library_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showMyLibrary($currentUserID)
    {
        $sql = "SELECT library.developerID, library.itemID, freeasset.assetName 
                FROM library 
                INNER JOIN freeasset 
                ON library.itemID=freeasset.assetID 
                WHERE developerID='$currentUserID'";


        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
