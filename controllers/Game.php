<?php

class Game extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        if (isset($_GET['id'])) {
            $gameID = $_GET['id'];


            $this->view->game = $this->model->showSingleGame($gameID);

            $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGame($gameID));

            // $this->view->screenshots = $this->model->getScreenshots($assetID);

            // $this->view->ssCount = count($this->model->getScreenshots($assetID));

            $this->view->render('SingleGame');
        }
    }
}
