<?php

class Admin_complaints extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->complaints = $this->model->viewComplaints();

        $this->view->active="all";

        $this->view->render('Admin/Admin_complaints');
    }
}
