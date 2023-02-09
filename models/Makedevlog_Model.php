<?php

class Makedevlog_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function addNewDevlog(
        $name,
        $tagline,
        $description,
        $type,
        $visibility,
        $devlogImg,
        $gameName,
        $releaseDate
    ) {
        $sql = "INSERT INTO devlog (name, Tagline, description,
        Type, Visibility, devlogImg, gameName, ReleaseDate) VALUES 
        (?,?,?,?,?,?,?,?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "$name",
            "$tagline",
            "$description",
            "$type",
            "$visibility",
            "$devlogImg",
            "$gameName",
            "$releaseDate"
        ]);
    }

    function currentDevGames($developerID)
    {
        $sql = "SELECT * FROM freegame WHERE gameDeveloperID = '$developerID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
