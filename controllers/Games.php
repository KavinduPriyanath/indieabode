<?php

class Games extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        if (isset($_GET['classification'])) {
            $gameClassification = $_GET['classification'];

            if ($gameClassification == 'action') {
                $this->view->games = $this->model->showClassifiedGames('action');
            } else if ($gameClassification == 'adventure') {
                $this->view->games = $this->model->showClassifiedGames('adventure');
            } else if ($gameClassification == 'rpg') {
                $this->view->games = $this->model->showClassifiedGames('rpg');
            } else if ($gameClassification == 'racing') {
                $this->view->games = $this->model->showClassifiedGames('racing');
            } else if ($gameClassification == 'simulation') {
                $this->view->games = $this->model->showClassifiedGames('simulation');
            } else if ($gameClassification == 'strategy') {
                $this->view->games = $this->model->showClassifiedGames('strategy');
            }
        } else {
            $this->view->games = $this->model->showAllGames();
        }


        $this->view->render('Main/Games');
    }

    function sideFilters()
    {
        header('location:/indieabode/aaa');
    }
}
