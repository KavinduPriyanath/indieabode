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

        $stmt = $this->db->prepare("SELECT * FROM gig WHERE gigStatus=1");

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
