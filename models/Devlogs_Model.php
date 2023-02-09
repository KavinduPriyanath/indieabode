<?php

class Devlogs_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllDevlogs()
    {
        $stmt = $this->db->prepare("SELECT * FROM devlog");

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
