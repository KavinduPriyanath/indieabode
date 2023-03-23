<?php

class Crowdfund extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        if (isset($_GET['id'])) {
            $crowdfundID = $_GET['id'];


            $this->view->crowdfund = $this->model->showSingleCrowdfund($crowdfundID);

            // $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGame($gameID));

            $this->view->screenshots = $this->model->getScreenshots($crowdfundID);

            $this->view->ssCount = count($this->model->getScreenshots($crowdfundID));

            $this->view->render('SingleCrowdfunding');
        }
    }

    // function reviews()
    // {
    //     $this->view->game = $this->model->showSingleGame($_GET['id']);

    //     $this->view->render('Reviews/Game-Reviews');
    // }
}
