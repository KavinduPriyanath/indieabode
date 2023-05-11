<?php

class Admin_GigD_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getNoofGigs(){
        $sql = "SELECT COUNT(*) AS orderedGigs, (SELECT COUNT(*) FROM gig WHERE gigStatus=0) AS notorderedGigs 
        FROM gig WHERE gigStatus=0";

        $stmt = $this->db->prepare($sql);
  
        $stmt->execute();
  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
        $total_ended_gigs = $row['orderedGigs'];
        $total_ongoing_gigs = $row['notorderedGigs'];
      
        return array('orderedGigs' => $total_ended_gigs, 'notorderedGigs' => $total_ongoing_gigs);
    }

    function getTotalTx() {
        $sql = "SELECT ROUND(SUM(publisherCost), 2) AS totalTx FROM gig_purchases";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalTx = $row['totalTx'];
        return $totalTx;
    }

    function getOrderedGigs(){
        $sql= "SELECT * FROM gig_purchases";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $gigs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $gigs;
    }

    function revenueGraph(){
        $sql="SELECT DATE(sale_date) as date, SUM(siteShare) as revenue_share
        FROM site_gig_revenue GROUP BY DATE(sale_date)";
    
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

    function getTotalRevenue() {
        $sql = "SELECT ROUND(SUM(siteShare), 2) as total_revenue_share
        FROM site_gig_revenue";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalRevenue = $row['total_revenue_share'];
        return $totalRevenue;
    }

    function getRevenueShare(){
        $sql = "SELECT * FROM site_gig_revenue";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $gigs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $gigs;
    }
}
