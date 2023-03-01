<?php

class Admin_report extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        $this->view->render('Admin/Admin_report');
    }
}
