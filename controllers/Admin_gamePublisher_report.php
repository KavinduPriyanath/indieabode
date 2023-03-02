<?php

class Admin_gamePublisher_report extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        $this->view->render('Admin/reports/Admin_gamePublisher_report');
    }
}
