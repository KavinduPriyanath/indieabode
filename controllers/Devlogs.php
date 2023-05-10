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
        $this->view->checked = [];

        if (isset($_GET['posttypes'])) {
            $this->view->checked = $_GET['posttypes'];

            $checkedTypes = [];
            $checkedTypes =  $_GET['posttypes'];
            $this->view->devlogs = $this->model->showFilteredDevlog($checkedTypes);
        } else {
            $this->view->devlogs = $this->model->showAllDevlogs();
        }

        $this->view->posttypes = $this->model->filters();


        $this->view->render('Main/Devlogs');
    }
}
