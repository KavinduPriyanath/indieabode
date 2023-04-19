<?php

class Home extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        // session_destroy();
    }

    function index()
    {
    }

    function developer()
    {

        $this->view->games = $this->model->showRecentGames();

        $this->view->assets = $this->model->showRecentAssets();

        $this->view->devlogs = $this->model->showRecentDevlogs();

        // $this->view->gamejams = $this->model->showRecentJams();

        $this->view->gigs = $this->model->showRecentGigs();


        $this->view->render('HomePages/DeveloperHome');
    }
}
