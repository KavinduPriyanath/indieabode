<?php

class Crowdfundings extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->crowdfundings = $this->model->showAllCrowdfundings();

        $this->view->render('Main/Crowdfundings');
    }
}
