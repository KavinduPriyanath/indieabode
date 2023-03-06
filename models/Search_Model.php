<?php

class Search_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function GamesQuery($query)
    {
        $sql = "SELECT * FROM freegame WHERE CONCAT(gameName, gameTags) LIKE '%$query%'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function AssetsQuery($query)
    {
        $sql = "SELECT * FROM freeasset WHERE CONCAT(assetName, assetTags) LIKE '%$query%'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function DevlogsQuery($query)
    {
        $sql = "SELECT * FROM devlog WHERE CONCAT(name, gameName) LIKE '%$query%'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function GigsQuery($query)
    {
        $sql = "SELECT * FROM gig WHERE CONCAT(gigName, game) LIKE '%$query%'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function CrowdfundingsQuery($query)
    {
        $sql = "SELECT * FROM crowdfund WHERE CONCAT(gameName) LIKE '%$query%'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
