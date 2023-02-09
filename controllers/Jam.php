<?php

class Jam extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        if (isset($_GET['id'])) {
            $gameJamID = $_GET['id'];


            $this->view->gamejam = $this->model->showSingleJam($gameJamID);

            //$this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGame($gameJamID));

            // $this->view->screenshots = $this->model->getScreenshots($assetID);

            // $this->view->ssCount = count($this->model->getScreenshots($assetID));

            $this->view->render('SingleGameJam');
        }
    }
}
