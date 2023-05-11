<?php

class SiteDashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->developerCount = $this->model->usertypeCount("game developer");
        $this->view->gamerCount = $this->model->usertypeCount("gamer");
        $this->view->publisherCount = $this->model->usertypeCount("game publisher");
        $this->view->jamorganizerCount = $this->model->usertypeCount("gamejam organizer");
        $this->view->assetcreatorCount = $this->model->usertypeCount("asset creator");


        // get active & block user counts
        $this->view->usercounts = $this->model->blockUserCount();


        // get total revenues
        $totalGameRevenue = $this->model->getTotalGameRevenue();
        // print($totalGameRevenue);
        $totalAssetRevenue = $this->model->getTotalAssetRevenue();
        // print($totalAssetRevenue);
        $totalGigRevenue = $this->model->getgigTotalRevenue();
        // print($totalGigRevenue);
        $totalCrowdfundRevenue = $this->model->getcrowdfundTotalRevenue();
        // print($totalCrowdfundRevenue);

        $totalRevenues = $totalGameRevenue +  $totalAssetRevenue + $totalGigRevenue + $totalCrowdfundRevenue ; 

        // print($totalRevenues);
        $this->view->allRevenue = $totalRevenues;

        $this->view->revenues = array($totalGameRevenue , $totalAssetRevenue, $totalGigRevenue,$totalCrowdfundRevenue);






        $this->view->render('Main/SiteDashboard');
    }
}
