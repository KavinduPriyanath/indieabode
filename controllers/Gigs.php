<?php

class Gigs extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        //Redirecting Unprivileged Users
        if (isset($_SESSION['logged'])) {

            if ($_SESSION['userRole'] == "asset creator") {
                header('location:/indieabode/');
            } else if ($_SESSION['userRole'] == "asset creator") {
                header('location:/indieabode/');
            }
        }

        //pagination 
        $maxLimit = 16;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $maxLimit;
        $this->view->prevPage = $page - 1;
        $this->view->nextPage = $page + 1;

        if (isset($_GET['genre']) || isset($_GET['stage']) || isset($_GET['cost']) || isset($_GET['share'])) {

            $checkedGenres = [];
            $checkedStage = null;
            $checkedCost = null;
            $checkedShare = null;

            if (isset($_GET['genre'])) {
                $checkedGenres = $_GET['genre'];
            }

            if (isset($_GET['stage'])) {
                $checkedStage = $_GET['stage'];
            }

            if (isset($_GET['cost'])) {
                $checkedCost = $_GET['cost'];
            }

            if (isset($_GET['share'])) {
                $checkedShare = $_GET['share'];
            }

            $this->view->gigs = $this->model->showFilteredGigs($checkedGenres, $checkedStage, $checkedCost, $checkedShare);
        } else {
            $this->view->gigs = $this->model->showAllGigs($start, $maxLimit);
            $this->view->gigsPagesCount = $this->model->totalGigsPageCount($maxLimit);
        }

        //to keep track of the filters selected
        $this->view->genreChecked = [];
        $this->view->currentStage = null;
        $this->view->expectedCost = null;
        $this->view->estimatedShare = null;

        if (isset($_GET['genre'])) {
            $this->view->genreChecked = $_GET['genre'];
        }

        if (isset($_GET['stage'])) {
            $this->view->currentStage = $_GET['stage'];
        }

        if (isset($_GET['cost'])) {
            $this->view->expectedCost = $_GET['cost'];
        }

        if (isset($_GET['share'])) {
            $this->view->estimatedShare = $_GET['share'];
        }


        $this->view->render('Main/Gigs');
    }

    // function requests()
    // {
    //     $this->view->gigs = $this->model->showMyRequestedGigs($_SESSION['id']);

    //     $this->view->render('Publisher/GigRequests');
    // }

    function archive()
    {
        //pagination 
        $maxLimit = 16;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $maxLimit;
        $this->view->prevPage = $page - 1;
        $this->view->nextPage = $page + 1;

        if (isset($_GET['genre']) || isset($_GET['stage']) || isset($_GET['cost']) || isset($_GET['share'])) {

            $checkedGenres = [];
            $checkedStage = null;
            $checkedCost = null;
            $checkedShare = null;

            if (isset($_GET['genre'])) {
                $checkedGenres = $_GET['genre'];
            }

            if (isset($_GET['stage'])) {
                $checkedStage = $_GET['stage'];
            }

            if (isset($_GET['cost'])) {
                $checkedCost = $_GET['cost'];
            }

            if (isset($_GET['share'])) {
                $checkedShare = $_GET['share'];
            }

            $this->view->gigs = $this->model->showFilteredArchiveGigs($checkedGenres, $checkedStage, $checkedCost, $checkedShare);
        } else {
            $this->view->gigs = $this->model->showAllAchiveGigs($start, $maxLimit);
            $this->view->gigsPagesCount = $this->model->totalArchivedGigsPageCount($maxLimit);
        }

        //to keep track of the filters selected
        $this->view->genreChecked = [];
        $this->view->currentStage = null;
        $this->view->expectedCost = null;
        $this->view->estimatedShare = null;

        if (isset($_GET['genre'])) {
            $this->view->genreChecked = $_GET['genre'];
        }

        if (isset($_GET['stage'])) {
            $this->view->currentStage = $_GET['stage'];
        }

        if (isset($_GET['cost'])) {
            $this->view->expectedCost = $_GET['cost'];
        }

        if (isset($_GET['share'])) {
            $this->view->estimatedShare = $_GET['share'];
        }

        $this->view->render('Publisher/GigArchive');
    }
}
