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
        $this->view->render('Main/SiteDashboard');
    }
}
