<?php

class Gigs_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllGigs()
    {
        $stmt = $this->db->prepare("SELECT * FROM gig");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showAllAchiveGigs()
    {
        $sql = "SELECT gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg, gig_purchases.purchasedDate
                FROM gig INNER JOIN gig_purchases ON gig_purchases.gigID = gig.gigID WHERE gigStatus=1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showMyRequestedGigs($userID)
    {
        $sql = "SELECT gig.gigID, gig.gigName, gig.gigTagline, gig.gigCoverImg FROM gig INNER JOIN
                requestedgigs ON gig.gigID = requestedgigs.gigID WHERE publisherID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
