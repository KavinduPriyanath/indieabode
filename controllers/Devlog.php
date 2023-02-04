<?php

class Devlog extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        if (isset($_GET['id'])) {
            $devlogID = $_GET['id'];


            $this->view->devlog = $this->model->showSingleDevlog($devlogID);

            // $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleDevlog($devlogID));

            // $this->view->screenshots = $this->model->getScreenshots($assetID);

            // $this->view->ssCount = count($this->model->getScreenshots($assetID));

            $this->view->render('SingleDevlog');
        }
    }
}
