<?php

class Dashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session_start();
    }

    function index()
    {
        $currentUser = $_SESSION['id'];

        $this->view->games = $this->model->showAllMyGames($currentUser);

        $this->view->render('Dashboard/Dashboard');
    }

    function gigs()
    {
        $this->view->gigs = $this->model->showAllMyGigs($_SESSION['id']);

        $this->view->render('Dashboard/Dashboard-Gigs');
    }

    function devlogs()
    {
        $this->view->devlogs = $this->model->showAllMyDevlogs($_SESSION['id']);

        $this->view->render('Dashboard/Dashboard-Devlogs');
    }

    function gamejams()
    {
        $this->view->render('Dashboard/Dashboard-Jams');
    }

    function crowdfundings()
    {
        $this->view->render('Dashboard/Dashboard-Crowdfunding');
    }

    function sales()
    {
        $this->view->render('Dashboard/Dashboard-Sales');
    }

    function analytics()
    {
        $this->view->render('Dashboard/Dashboard-Analytics');
    }

    function payouts()
    {
        $this->view->render('Dashboard/Dashboard-Payout');
    }
}
