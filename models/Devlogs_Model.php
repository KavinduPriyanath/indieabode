<?php

class Devlogs_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllDevlogs()
    {
        $sql = "SELECT devlog.name, devlog.Tagline, devlog.Type, devlog.devlogImg, devlog.likeCount, devlog.commentCount,
                devlog.devLogID, freegame.gameName FROM devlog INNER JOIN freegame ON freegame.gameID=devlog.gameName";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showFilteredDevlog($checkedFilters)
    {

        $filters = join("','", $checkedFilters);

        $sql = "SELECT * FROM devlog WHERE `Type` IN ('$filters')";

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
}
