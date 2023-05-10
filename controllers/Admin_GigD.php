<?php

class Admin_GigD extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        // get data for the graph of no of crowdfunds
        $NoofGigs = $this->model->getNoofGigs();
        $this->view->total_ended_gigs = $NoofGigs['orderedGigs'];
        $this->view->total_ongoing_gigs = $NoofGigs['notorderedGigs'];

        // get data for all the donations have done so far
        $this->view->allTransactions = $this->model->getTotalTx();

        //get purchased gigs details
        $this->view->orderedGigs = $this->model->getOrderedGigs();
        // print_r($this->view->orderedGigs);

        //get data for gig revenues graph
        $data = $this->model->revenueGraph();
        $this->view->dates = $data['dates'];
        $this->view->revenueShares = $data['revenueShares'];

        //get total revenue share
        $this->view->totalRevenue = $this->model->getTotalRevenue();

        //get revenues shares of gigs
        $this->view->revenueGigs = $this->model->getRevenueShare();

        $this->view->render('Admin/Admin_GigD');
    }
}
