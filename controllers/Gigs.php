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

        $this->view->gigs = $this->model->showAllGigs();

        $this->view->render('Main/Gigs');
    }

    function requests()
    {
        $this->view->gigs = $this->model->showMyRequestedGigs($_SESSION['id']);

        $this->view->render('Publisher/GigRequests');
    }

    function archive()
    {
        $this->view->gigs = $this->model->showAllAchiveGigs();

        $this->view->render('Publisher/GigArchive');
    }
}
