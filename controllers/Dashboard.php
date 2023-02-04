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

    function devlogs()
    {
        $this->view->render('Dashboard/Dashboard-Devlogs');
    }
}
