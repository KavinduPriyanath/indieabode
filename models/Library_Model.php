<?php

class Library_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function showMyAssetLibrary($currentUserID)
    {
        $sql = "SELECT asset_library.developerID, asset_library.assetID, asset_library.createdAt, 
                freeasset.assetName , freeasset.assetID, freeasset.assetCoverImg, freeasset.assetType
                FROM asset_library 
                INNER JOIN freeasset 
                ON asset_library.assetID=freeasset.assetID 
                WHERE developerID='$currentUserID'";


        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function showMyGameLibrary($currentUserID)
    {
        $sql = "SELECT game_library.gamerID, game_library.gameID, game_library.createdAt, 
                freegame.gameName , freegame.gameID, freegame.gameCoverImg
                FROM game_library 
                INNER JOIN freegame 
                ON game_library.gameID=freegame.gameID 
                WHERE gamerID='$currentUserID'";


        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
