<?php

class Admin_G_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getGameTypeCount($gameType){
      $sql = "SELECT COUNT(*) AS total FROM freegame WHERE releaseStatus = '$gameType'";


      $stmt = $this->db->prepare($sql);

      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $gameTypeCount = $row['total'];

      return $gameTypeCount;
    }

    function getTotalTxGame(){
      $sql = "SELECT ROUND(SUM(purchasedPrice), 2) AS totalPurchases FROM game_purchases";

      $stmt = $this->db->prepare($sql);

      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $totalTxGame = $row['totalPurchases'];

      return $totalTxGame;
    }

    function getTxSummary(){
      $sql = "SELECT purchasedDate, SUM(purchasedPrice) AS totalPurchases FROM game_purchases GROUP BY purchasedDate";
      $stmt = $this->db->prepare($sql);
      if ($stmt->execute()) {
          $txSummary = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
          $dates = array();
          $totals = array();
  
          foreach ($txSummary as $row) {
              $date = $row['purchasedDate'];
              $total = round($row['totalPurchases'], 2);
              $dates[] = $date;
              $totals[] = $total;
          }
  
          return array('dates' => $dates, 'totals' => $totals);
      } else {
          // handling the error here, by returning an empty array
          return array('dates' => array(), 'totals' => array());
      }
    }
    
    function getUploadGame(){
      $sql ="SELECT DATE(created_at) AS upload_date, COUNT(gameID) AS game_count
      FROM freegame GROUP BY upload_date";
      $stmt = $this->db->prepare($sql);
      if ($stmt->execute()) {
        $txSummary = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dates = array();
        $totals = array();

        foreach ($txSummary as $row) {
            $date = $row['upload_date'];
            $total = round($row['game_count'], 2);
            $dates[] = $date;
            $totals[] = $total;
        }

        return array('dates' => $dates, 'totals' => $totals);
      } else {
          // handling the error here, by returning an empty array
          return array('dates' => array(), 'totals' => array());
      }

    }

    function getAllPayments() {
      $sql = "SELECT * FROM game_purchases";
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      $purchases = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $purchases;
    }

    function getAllGameRevenues() {
      $sql ="SELECT sale_date, ROUND(SUM(siteShare), 2) AS totalSiteShares
      FROM sitegamesrevenue GROUP BY sale_date";
      $stmt = $this->db->prepare($sql);
      if ($stmt->execute()) {
        $totalRevenue = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dates = array();
        $totals = array();

        foreach ($totalRevenue as $row) {
            $date = $row['sale_date'];
            $total = round($row['totalSiteShares'], 2);
            $dates[] = $date;
            $totals[] = $total;
        }

        return array('dates' => $dates, 'totals' => $totals);
      } else {
          // handling the error here, by returning an empty array
          return array('dates' => array(), 'totals' => array());
      }
    }

    function getTotalGameRevenue() {
      $sql = "SELECT ROUND(SUM(siteShare), 2) AS totalGameRevenue FROM sitegamesrevenue";
      $stmt = $this->db->prepare($sql);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $totalGameRevenue = $row['totalGameRevenue'];
      return $totalGameRevenue;
  }

  function getGameRevenueShare() {
    $sql = "SELECT * FROM sitegamesrevenue";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $revenues = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $revenues;
  }
}
