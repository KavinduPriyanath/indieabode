<?php

class Admin_G extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        // $this->view->userCount = $this->model->userCount();

        // $this->view->totalDownloads = $this->model->totalDownloads();

        $this->view->render('Main/GameDB');
    }
}
