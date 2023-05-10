<?php

class Cart_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showMyCart($currentUserID)
    {
        $sql = "SELECT cart.userID, cart.itemID, freeasset.assetName 
                FROM cart 
                INNER JOIN freeasset 
                ON cart.itemID=freeasset.assetID 
                WHERE userID='$currentUserID'";


        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
