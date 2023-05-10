<?php

class Devlogs_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllDevlogs($sort,$Sorder,$min, $max)
    {
        $sql = "SELECT devlog.name, devlog.Tagline, devlog.Type, devlog.devlogImg, devlog.likeCount, devlog.commentCount,
                devlog.devLogID, freegame.gameName FROM devlog INNER JOIN freegame ON freegame.gameID=devlog.gameName ORDER BY $sort $Sorder
                LIMIT $min, $max";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showFilteredDevlog($checkedFilters)
    {

        $filters = join("','", $checkedFilters);

        $sql = "SELECT devlog.name, devlog.Tagline, devlog.Type, devlog.devlogImg, devlog.likeCount, devlog.commentCount,
                devlog.devLogID, freegame.gameName FROM devlog INNER JOIN freegame ON freegame.gameID=devlog.gameName 
                WHERE devlog.Type IN ('$filters')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function filters()
    {
        $stmt = $this->db->prepare("SELECT * FROM devlog_posttype");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function totalDevlogsPageCount($maxLimit)
    {


        $sql = "SELECT count(devLogID) AS id FROM devlog";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devlogsCount = $stmt->fetchAll();

        $totalDevlogs = $devlogsCount[0]['id'];

        $totalPages = ceil($totalDevlogs / $maxLimit);

        return $totalPages;
    }
}
