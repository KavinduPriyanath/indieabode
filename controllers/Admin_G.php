<?php

class Admin_G extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        // get data for the game db pie chart
        $earlyAccessGame = $this->model->getGameTypeCount('early access');
        $upcomingGame = $this->model->getGameTypeCount('Upcoming');
        $releasedGame = $this->model->getGameTypeCount('Released');

        $this->view->gameTypes = [];
        $this->view->gameTypes[0] = $earlyAccessGame;
        $this->view->gameTypes[1] = $upcomingGame;
        $this->view->gameTypes[2] = $releasedGame;

        //get data for the total transactions of game
        $this->view->totalTxGames = $this->model->getTotalTxGame();

        //get data for the transaction graph
        $gameTxSummary = $this->model->getTxSummary();
        if ($gameTxSummary !== null) {
            $this->view->txDates = $gameTxSummary['dates'];
            $this->view->txTotals = $gameTxSummary['totals'];
        } else {
            // handling the error here, such as displaying an error message to admin
            echo 'hriynnaaaa';
        }

        

        $this->view->render('Admin/Admin_G');

    }
}
