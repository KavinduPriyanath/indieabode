<?php

class SiteDashboard_Model extends Model
{

  function __construct()
  {
    parent::__construct();
  }


  function usertypeCount($usertype)
  {
    $sql = "SELECT * FROM `gamer` WHERE accountStatus=1 AND userRole='".$usertype."'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    $users = $stmt->fetchAll();

    $count = 0;

    foreach ($users as $user) {
      $count += 1;
    }

    return $count;
  }

  function userCount()
  {

    $stmt = $this->db->prepare("SELECT * FROM gamer");
    $stmt->execute();

    $users = $stmt->fetchAll();

    $count = 0;

    foreach ($users as $user) {
      $count += 1;
    }

    return $count;
  }

  function blockUserCount(){
    $sql = "SELECT COUNT(*) AS active_users,
    (SELECT COUNT(*) FROM gamer WHERE accountStatus = 0) AS blocked_users
    FROM gamer WHERE accountStatus = 1";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $userCounts = $stmt->fetchAll();
    return $userCounts;
  }

  



  function TopGames()
  {
    $sql = "SELECT downloadgame.gameID, freegame.gameName as name, COUNT(downloadgame.gameID) as count, freegame.gameCoverImg as img
      FROM downloadgame
      LEFT JOIN freegame ON downloadgame.gameID = freegame.gameID
      GROUP BY downloadgame.gameID, freegame.gameName ORDER BY count DESC LIMIT 3        
      ";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll();

    // print_r($data);
    return $data;
  }

  function TopAssets(){
    $sql = "SELECT downloadasset.assetID, freeasset.assetName as name, COUNT(downloadasset.assetID) as count, freeasset.assetCoverImg as img
    FROM downloadasset
    LEFT JOIN freeasset ON downloadasset.assetID = freeasset.assetID
    GROUP BY downloadasset.assetID, freeasset.assetName ORDER BY count DESC LIMIT 3        
    ";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll();


    return $data;

  }
}
