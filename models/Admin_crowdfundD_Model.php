<?php

class Admin_crowdfundD_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getNoofcrowdfunds(){
        $sql = "SELECT COUNT(*) AS total_ended_crowdfunds, (SELECT COUNT(*) FROM crowdfund WHERE deadline >= CURDATE()) AS total_ongoing_crowdfunds 
        FROM crowdfund WHERE deadline < CURDATE()";

        $stmt = $this->db->prepare($sql);
  
        $stmt->execute();
  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
        $total_ended_crowdfunds = $row['total_ended_crowdfunds'];
        $total_ongoing_crowdfunds = $row['total_ongoing_crowdfunds'];
      
        return array('ended_crowdfunds' => $total_ended_crowdfunds, 'ongoing_crowdfunds' => $total_ongoing_crowdfunds);
    }

    function getTotalDonations() {
        $sql = "SELECT ROUND(SUM(donationAmount), 2) AS totalDonations FROM crowdfund_donations";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalDonations = $row['totalDonations'];
        return $totalDonations;
    }
    
    function getAllDonations() {
        $sql = "SELECT * FROM crowdfund_donations";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $donations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $donations;
    }

    function getAllCrowdfunds() {
        $sql = "SELECT * FROM crowdfund";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $crowdfunds = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $crowdfunds;
    }

    function getRevenueShare(){
        $sql = "SELECT *, IF(expectedAmount = currentAmount, expectedAmount * 0.05, 0) as revenue_share 
        FROM crowdfund WHERE expectedAmount = currentAmount";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $crowdfunds = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $crowdfunds;
    }

    function getTotalRevenue() {
        $sql = "SELECT ROUND(SUM(IF(expectedAmount = currentAmount, expectedAmount * 0.05, 0)), 2) as total_revenue_share
        FROM crowdfund WHERE expectedAmount = currentAmount";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalRevenue = $row['total_revenue_share'];
        return $totalRevenue;
    }


    function revenueGraph(){
        $sql="SELECT DATE(deadline) as date, SUM(IF(expectedAmount = currentAmount, expectedAmount * 0.05, 0)) as revenue_share
        FROM crowdfund
        WHERE expectedAmount = currentAmount GROUP BY DATE(deadline)";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $dates = array();
        $revenueShares = array();
    
        foreach ($results as $row) {
            $dates[] = $row['date'];
            $revenueShares[] = $row['revenue_share'];
        }
    
        return array('dates' => $dates, 'revenueShares' => $revenueShares);
    }
}
