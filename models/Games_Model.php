<?php

class Games_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showAllGames($min, $max)
    {
        $stmt = $this->db->prepare("SELECT * FROM freegame LIMIT $min, $max");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showClassifiedGames($gameClassification, $min, $max)
    {

        if ($gameClassification == 'action') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='action' LIMIT $min, $max";
        } else if ($gameClassification == 'adventure') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='adventure' LIMIT $min, $max";
        } else if ($gameClassification == 'rpg') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='rpg' LIMIT $min, $max";
        } else if ($gameClassification == 'racing') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='racing' LIMIT $min, $max";
        } else if ($gameClassification == 'simulation') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='simulation' LIMIT $min, $max";
        } else if ($gameClassification == 'strategy') {
            $sql = "SELECT * FROM freegame WHERE gameClassification='strategy' LIMIT $min, $max";
        }

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function totalGamesPageCount($gameClassification)
    {

        if ($gameClassification == 'action') {
            $sql = "SELECT count(gameID) AS id FROM freegame WHERE gameClassification='action'";
        } else if ($gameClassification == 'adventure') {
            $sql = "SELECT count(gameID) AS id FROM freegame WHERE gameClassification='adventure'";
        } else if ($gameClassification == 'rpg') {
            $sql = "SELECT count(gameID) AS id FROM freegame WHERE gameClassification='rpg'";
        } else if ($gameClassification == 'racing') {
            $sql = "SELECT count(gameID) AS id FROM freegame WHERE gameClassification='racing'";
        } else if ($gameClassification == 'simulation') {
            $sql = "SELECT count(gameID) AS id FROM freegame WHERE gameClassification='simulation'";
        } else if ($gameClassification == 'strategy') {
            $sql = "SELECT count(gameID) AS id FROM freegame WHERE gameClassification='strategy'";
        } else {
            $sql = "SELECT count(gameID) AS id FROM freegame";
        }

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $gamesCount = $stmt->fetchAll();

        $totalGames = $gamesCount[0]['id'];

        $totalPages = ceil($totalGames / 24);

        return $totalPages;
    }

    //filters
    function PlatformFilters()
    {
        $stmt = $this->db->prepare("SELECT * FROM games_filters WHERE type='platform'");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function ReleaseFilters()
    {
        $stmt = $this->db->prepare("SELECT * FROM games_filters WHERE type='releaseStatus'");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function FeatureFilters()
    {
        $stmt = $this->db->prepare("SELECT * FROM games_filters WHERE type='features'");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function TypeFilters()
    {
        $stmt = $this->db->prepare("SELECT * FROM games_filters WHERE type='gametype'");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showFilteredGames($checkedPlatformFilters, $checkedReleaseFilters, $checkedGameTypeFilters, $checkedFeatureFilters, $min, $max)
    {

        $platformfilters = join("','", $checkedPlatformFilters);

        $releasefilters = join("','", $checkedReleaseFilters);

        $gametypefilters = join("','", $checkedGameTypeFilters);

        $featurefilters = join("','", $checkedFeatureFilters);

        if (!empty($platformfilters) && !empty($releasefilters) && !empty($gametypefilters) && !empty($featurefilters)) {
            $sql = "SELECT * FROM freegame WHERE `platform` IN ('$platformfilters') AND `releaseStatus` IN ('$releasefilters') AND `gameType` IN ('$gametypefilters') AND `gameFeatures` IN ('$featurefilters') LIMIT $min, $max";
        } else if (!empty($platformfilters) && !empty($releasefilters) && !empty($gametypefilters)) {
            $sql = "SELECT * FROM freegame WHERE `platform` IN ('$platformfilters') AND `releaseStatus` IN ('$releasefilters') AND `gameType` IN ('$gametypefilters') LIMIT $min, $max";
        } else if (!empty($platformfilters) && !empty($releasefilters) && !empty($featurefilters)) {
            $sql = "SELECT * FROM freegame WHERE `platform` IN ('$platformfilters') AND `releaseStatus` IN ('$releasefilters') AND `gameFeatures` IN ('$featurefilters') LIMIT $min, $max";
        } else if (!empty($platformfilters) && !empty($gametypefilters) && !empty($featurefilters)) {
            $sql = "SELECT * FROM freegame WHERE `platform` IN ('$platformfilters') AND `gameType` IN ('$gametypefilters') AND `gameFeatures` IN ('$featurefilters') LIMIT $min, $max";
        } else if (!empty($releasefilters) && !empty($gametypefilters) && !empty($featurefilters)) {
            $sql = "SELECT * FROM freegame WHERE `releaseStatus` IN ('$releasefilters') AND `gameType` IN ('$gametypefilters') AND `gameFeatures` IN ('$featurefilters') LIMIT $min, $max";
        } else if (!empty($platformfilters) && !empty($releasefilters)) {
            $sql = "SELECT * FROM freegame WHERE `platform` IN ('$platformfilters') AND `releaseStatus` IN ('$releasefilters') LIMIT $min, $max";
        } else if (!empty($releasefilters) && !empty($gametypefilters)) {
            $sql = "SELECT * FROM freegame WHERE `releaseStatus` IN ('$releasefilters') AND `gameType` IN ('$gametypefilters') LIMIT $min, $max";
        } else if (!empty($gametypefilters) && !empty($featurefilters)) {
            $sql = "SELECT * FROM freegame WHERE `gameType` IN ('$gametypefilters') AND `gameFeatures` IN ('$featurefilters') LIMIT $min, $max";
        } else if (!empty($platformfilters) && !empty($gametypefilters)) {
            $sql = "SELECT * FROM freegame WHERE `platform` IN ('$platformfilters') AND `gameType` IN ('$gametypefilters') LIMIT $min, $max";
        } else if (!empty($platformfilters) && !empty($featurefilters)) {
            $sql = "SELECT * FROM freegame WHERE `platform` IN ('$platformfilters') AND `gameFeatures` IN ('$featurefilters') LIMIT $min, $max";
        } else if (!empty($releasefilters) && !empty($featurefilters)) {
            $sql = "SELECT * FROM freegame WHERE `releaseStatus` IN ('$releasefilters') AND `gameFeatures` IN ('$featurefilters') LIMIT $min, $max";
        } else if (!empty($platformfilters)) {
            $sql = "SELECT * FROM freegame WHERE `platform` IN ('$platformfilters') LIMIT $min, $max";
        } else if (!empty($releasefilters)) {
            $sql = "SELECT * FROM freegame WHERE `releaseStatus` IN ('$releasefilters') LIMIT $min, $max";
        } else if (!empty($gametypefilters)) {
            $sql = "SELECT * FROM freegame WHERE `gameType` IN ('$gametypefilters') LIMIT $min, $max";
        } else if (!empty($featurefilters)) {
            $sql = "SELECT * FROM freegame WHERE `gameFeatures` IN ('$featurefilters') LIMIT $min, $max";
        }

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
