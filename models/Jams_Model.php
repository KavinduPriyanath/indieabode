<?php

class Jams_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }



    function showAllGameJams($min, $max)
    {
        $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, gamejam.jamTagline,gamejam.jamCoverImg,
                gamejam.joinedCount, gamer.username FROM gamejam INNER JOIN gamer ON 
                gamejam.jamHostID=gamer.gamerID LIMIT $min, $max";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showAllSortedGameJams($sort, $Sorder)
    {
        $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, gamejam.jamTagline,gamejam.jamCoverImg,
                gamejam.joinedCount, gamer.username FROM gamejam INNER JOIN gamer ON 
                gamejam.jamHostID=gamer.gamerID ORDER BY $sort $Sorder";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showFilteredJams($checkedPreference, $checkedStatus, $checkedType, $checkedGenre)
    {

        $preferenceFilters = join("','", $checkedPreference);

        $statusFilters = join("','", $checkedStatus);

        if (!empty($preferenceFilters) && empty($statusFilters) && $checkedType == null && $checkedGenre == null) {

            // $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, gamejam.jamTagline,gamejam.jamCoverImg,
            //         gamejam.joinedCount, gamer.username FROM gamejam INNER JOIN gamer ON gamejam.jamHostID=gamer.gamerID WHERE
            //         gamejam.";

        } else if (!empty($preferenceFilters) && !empty($statusFilters) && $checkedType == null && $checkedGenre == null) {
        } else if (!empty($preferenceFilters) && !empty($statusFilters) && $checkedType != null && $checkedGenre == null) {
        } else if (!empty($preferenceFilters) && !empty($statusFilters) && $checkedType != null && $checkedGenre != null) {
        } else if (!empty($preferenceFilters) && empty($statusFilters) && $checkedType != null && $checkedGenre == null) {
        } else if (!empty($preferenceFilters) && empty($statusFilters) && $checkedType == null && $checkedGenre != null) {
        } else if (!empty($preferenceFilters) && !empty($statusFilters) && $checkedType == null && $checkedGenre != null) {
        } else if (!empty($preferenceFilters) && empty($statusFilters) && $checkedType != null && $checkedGenre != null) {
        } else if (empty($preferenceFilters) && !empty($statusFilters) && $checkedType == null && $checkedGenre == null) {
        } else if (empty($preferenceFilters) && empty($statusFilters) && $checkedType != null && $checkedGenre == null) {

            $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, gamejam.jamTagline,gamejam.jamCoverImg,
                gamejam.joinedCount, gamer.username FROM gamejam INNER JOIN gamer ON gamejam.jamHostID=gamer.gamerID
                WHERE gamejam.jamVoters='$checkedType'";
        } else if (empty($preferenceFilters) && empty($statusFilters) && $checkedType == null && $checkedGenre != null) {

            $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, gamejam.jamTagline,gamejam.jamCoverImg,
                gamejam.joinedCount, gamer.username FROM gamejam INNER JOIN gamer ON gamejam.jamHostID=gamer.gamerID
                WHERE gamejam.jamType='$checkedGenre'";
        } else if (empty($preferenceFilters) && !empty($statusFilters) && $checkedType != null && $checkedGenre == null) {
        } else if (empty($preferenceFilters) && !empty($statusFilters) && $checkedType == null && $checkedGenre != null) {
        } else if (empty($preferenceFilters) && empty($statusFilters) && $checkedType != null && $checkedGenre != null) {

            $sql = "SELECT gamejam.gameJamID, gamejam.jamTitle, gamejam.jamType, gamejam.jamTagline,gamejam.jamCoverImg,
                gamejam.joinedCount, gamer.username FROM gamejam INNER JOIN gamer ON gamejam.jamHostID=gamer.gamerID
                WHERE gamejam.jamType='$checkedGenre' AND gamejam.jamVoters='$checkedType'";
        } else if (!empty($preferenceFilters) && !empty($statusFilters) && $checkedType == null && $checkedGenre != null) {
        }

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function totalJamsPageCount($maxLimit)
    {

        $sql = "SELECT count(gameJamID) AS id FROM gamejam";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $jamsCount = $stmt->fetchAll();

        $totalJams = $jamsCount[0]['id'];

        $totalPages = ceil($totalJams / $maxLimit);

        return $totalPages;
    }
}
