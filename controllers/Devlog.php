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

            $likedorNot = $this->model->AlreadyLiked($_SESSION['id'], $_GET['id']);
            $this->view->likesStatus = ($likedorNot == true) ? "liked" : "disliked";

            $this->view->devlog = $this->model->showSingleDevlog($devlogID);

            // $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleDevlog($devlogID));

            // $this->view->screenshots = $this->model->getScreenshots($assetID);

            // $this->view->ssCount = count($this->model->getScreenshots($assetID));

            $gameId = $this->model->showSingleDevlog($devlogID)['gameName'];

            $this->view->game = $this->model->GetGame($gameId);

            $currentdevlog = $this->model->showSingleDevlog($devlogID);


            $this->view->game = $this->model->gameDetails($currentdevlog['gameName']);

            $this->view->render('SingleDevlog');
        }
    }
}
