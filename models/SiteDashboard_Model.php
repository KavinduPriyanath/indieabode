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

  function blockUserCount() {
    $sql = "SELECT COUNT(*) AS active_users,
            (SELECT COUNT(*) FROM gamer WHERE accountStatus = 0) AS blocked_users
            FROM gamer WHERE accountStatus = 1";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $userCounts = $stmt->fetch(PDO::FETCH_ASSOC);
    return $userCounts;
  }

  function getTotalGameRevenue() {
    $sql = "SELECT ROUND(SUM(siteShare), 2) AS totalGameRevenue FROM sitegamesrevenue";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalGameRevenue = $row['totalGameRevenue'];
    return $totalGameRevenue;
  }

  function getTotalAssetRevenue() {
    $sql = "SELECT ROUND(SUM(siteShare), 2) AS totalAssetRevenue FROM site_assets_revenue";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalAssetRevenue = $row['totalAssetRevenue'];
    return $totalAssetRevenue;
  }

  function getgigTotalRevenue() {
    $sql = "SELECT ROUND(SUM(siteShare), 2) as total_revenue_share
    FROM site_gig_revenue";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalRevenue = $row['total_revenue_share'];
    return $totalRevenue;
  }

  function getcrowdfundTotalRevenue() {
    $sql = "SELECT ROUND(SUM(IF(expectedAmount = currentAmount, expectedAmount * 0.05, 0)), 2) as total_revenue_share
    FROM crowdfund WHERE expectedAmount = currentAmount";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalRevenue = $row['total_revenue_share'];
    return $totalRevenue;
  }

}
