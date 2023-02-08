<?php

class DashboardJamO extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session_start();
    }

    function index()
    {
        
        $this->view->render('Dashboard\Dashboard-JamOrganizer');
    }

    
}
