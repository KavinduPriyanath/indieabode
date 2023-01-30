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

        $this->view->title = "Games";

        if (isset($_GET['classification'])) {
            $gameClassification = $_GET['classification'];

            if ($gameClassification == 'action') {
                $this->view->games = $this->model->showClassifiedGames('action');
                $this->view->title = "Category: Action";
            } else if ($gameClassification == 'adventure') {
                $this->view->games = $this->model->showClassifiedGames('adventure');
                $this->view->title = "Category: Adventure";
            } else if ($gameClassification == 'rpg') {
                $this->view->games = $this->model->showClassifiedGames('rpg');
                $this->view->title = "Category: RPG";
            } else if ($gameClassification == 'racing') {
                $this->view->games = $this->model->showClassifiedGames('racing');
                $this->view->title = "Category: Racing";
            } else if ($gameClassification == 'simulation') {
                $this->view->games = $this->model->showClassifiedGames('simulation');
                $this->view->title = "Category: Simulation";
            } else if ($gameClassification == 'strategy') {
                $this->view->games = $this->model->showClassifiedGames('strategy');
                $this->view->title = "Category: Strategy";
            }
        } else {
            $this->view->games = $this->model->showAllGames();
        }


        $this->view->render('Main/Games');
    }

    function sideFilters()
    {
        // header('location:/indieabode/aaa');
        echo "hello";
    }
}
