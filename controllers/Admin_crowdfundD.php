<?php

class Admin_crowdfundD extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        // get data for the graph of no of crowdfunds
        $Noofcrowdfunds = $this->model->getNoofcrowdfunds();
        $this->view->total_ended_crowdfunds = $Noofcrowdfunds['ended_crowdfunds'];
        $this->view->total_ongoing_crowdfunds = $Noofcrowdfunds['ongoing_crowdfunds'];

        // get data for all the donations have done so far
        $this->view->allDonations = $this->model->getTotalDonations();

        //get data for the all the donations tables
        $this->view->donations = $this->model->getAllDonations();

        //get data for the all the crowdfunds table
        $this->view->crowdfunds = $this->model->getAllCrowdfunds();

        //get total revenue share
        $this->view->totalRevenue = $this->model->getTotalRevenue();

        //get revenue shares of crowdfunds
        $this->view->revenueCrowdfunds = $this->model->getRevenueShare();

        //get data for the revenue graph
        $data = $this->model->revenueGraph();
        $dates = $data['dates'];
        $revenueShares = $data['revenueShares'];

        // pass the arrays to the view
        $this->view->dates = $dates;
        $this->view->revenueShares = $revenueShares;

        $this->view->render('Admin/Admin_crowdfundD');
    }
}
