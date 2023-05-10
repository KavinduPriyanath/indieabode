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

        // sort part
        if (isset($_GET['sortWhat'])){
            $sort = $_GET['sortWhat'];
            if($sort=="latest"){
                $Sorder = "DESC";
                $sort = "CreatedDate";
            }
            else if($sort=="nameA-Z"){
                $Sorder = "ASC";
                $sort = "name";
            }
            else if($sort=="nameZ-A"){
                $Sorder = "DESC";
                $sort = "name";
            }
        }
        else{
            $sort = "CreatedDate";
            $Sorder = "DESC";
        }
    

        //Redirecting Unprivileged Users
        if (isset($_SESSION['logged'])) {

            if ($_SESSION['userRole'] == "asset creator") {
                header('location:/indieabode/');
            } else if ($_SESSION['userRole'] == "asset creator") {
                header('location:/indieabode/');
            }
        }

        //pagination 
        $maxLimit = 12;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $maxLimit;
        $this->view->prevPage = $page - 1;
        $this->view->nextPage = $page + 1;

        $this->view->checked = [];

        if (isset($_GET['posttypes'])) {
            $this->view->checked = $_GET['posttypes'];

            $checkedTypes = [];
            $checkedTypes =  $_GET['posttypes'];
            $this->view->devlogs = $this->model->showFilteredDevlog($checkedTypes);
        } else {
            $this->view->devlogs = $this->model->showAllDevlogs($sort,$Sorder,$start, $maxLimit);
            $this->view->devlogPagesCount = $this->model->totalDevlogsPageCount($maxLimit);
        }

        $this->view->posttypes = $this->model->filters();


        $this->view->render('Main/Devlogs');
    }
}
