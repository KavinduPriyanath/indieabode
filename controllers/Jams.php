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
        if (isset($_GET['sortWhat'])) {
            $sort = $_GET['sortWhat'];
            if ($sort == "latest") {
                $Sorder = "ASC";
                $sort = "submissionStartDate";
            } else if ($sort == "nameA-Z") {
                $Sorder = "ASC";
                $sort = "jamTitle";
            } else if ($sort == "nameZ-A") {
                $Sorder = "DESC";
                $sort = "jamTitle";
            }
        } else {
            $sort = "submissionStartDate";
            $Sorder = "ASC";
        }

        //pagination 
        $maxLimit = 12;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $maxLimit;
        $this->view->prevPage = $page - 1;
        $this->view->nextPage = $page + 1;

        if (isset($_GET['preference']) || isset($_GET['status']) || isset($_GET['type']) || isset($_GET['genre'])) {

            $checkedPreference = [];
            $checkedStatus = [];
            $checkedGenre = null;
            $checkedType = null;

            if (isset($_GET['preference'])) {
                $checkedPreference = $_GET['preference'];
            }

            if (isset($_GET['status'])) {
                $checkedStatus = $_GET['status'];
            }

            if (isset($_GET['type'])) {
                $checkedType = $_GET['type'];
            }

            if (isset($_GET['genre'])) {
                $checkedGenre = $_GET['genre'];
            }

            $this->view->gamejams = $this->model->showFilteredJams($checkedPreference, $checkedStatus, $checkedType, $checkedGenre);
        } else if (isset($_GET['sortWhat'])) {

            $this->view->gamejams = $this->model->showAllSortedGameJams($sort, $Sorder);
        } else {
            $this->view->gamejams = $this->model->showAllGameJams($start, $maxLimit);
            $this->view->jamsPagesCount = $this->model->totalJamsPageCount($maxLimit);
        }



        $this->view->render('Main/Jams');
    }

    function certificateLibrary()
    {

        $this->view->render('GameJam/CertificateLibrary');
    }
}
