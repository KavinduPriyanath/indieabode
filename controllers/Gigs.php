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
