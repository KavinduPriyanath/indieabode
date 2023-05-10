<?php

class Jams extends Controller
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
                $Sorder = "ASC";
                $sort = "submissionStartDate";
            }
            else if($sort=="nameA-Z"){
                $Sorder = "ASC";
                $sort = "jamTitle";
            }
            else if($sort=="nameZ-A"){
                $Sorder = "DESC";
                $sort = "jamTitle";
            }
        }
        else{
            $sort = "submissionStartDate";
            $Sorder = "ASC";
        }


        $this->view->gamejams = $this->model->showAllGameJams($sort,$Sorder,);

        $this->view->render('Main/Jams');
    }
}
