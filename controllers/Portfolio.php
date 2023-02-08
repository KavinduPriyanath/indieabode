<?php

class Portfolio extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        $this->view->developerDetails = $this->model->GetDeveloperDetails($_GET['profile']);

        $this->view->additionalDeveloperDetails = $this->model->GetAdditionalDeveloperDetails($_GET['profile']);

        $this->view->games = $this->model->GetDeveloperGames($_GET['profile']);

        $this->view->render('Portfolio');
    }
}
