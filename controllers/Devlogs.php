<?php

class Devlogs extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->devlogs = $this->model->showAllDevlogs();

        $this->view->render('Main/Devlogs');
    }
}
