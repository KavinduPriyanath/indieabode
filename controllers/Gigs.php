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
}
