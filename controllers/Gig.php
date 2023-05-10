<?php

class Gig extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        if (isset($_GET['id'])) {
            $gigID = $_GET['id'];


            $this->view->gig = $this->model->showSingleGig($gigID);

            $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGig($gigID));

            $this->view->screenshots = $this->model->getScreenshots($gigID);

            $this->view->ssCount = count($this->model->getScreenshots($gigID));

            $this->view->render('SingleGig');
        }
    }

    function reviews()
    {
        $this->view->game = $this->model->showSingleGame($_GET['id']);

        $this->view->render('Reviews/Game-Reviews');
    }
}
