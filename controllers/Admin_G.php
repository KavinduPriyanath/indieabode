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

        //get upload games details
        $uploadGames = $this->model->getUploadGame();
        if ($uploadGames !== null) {
            $this->view->Dates = $uploadGames['dates'];
            $this->view->Totals = $uploadGames['totals'];
        } else {
            // handling the error here, such as displaying an error message to admin
            echo 'hriynnaaaa';
        }

        //get data of game purchasings
        $this->view->gamePurchases = $this->model->getAllPayments();

        //get game revenues shares for each day
        $totalRevenues = $this->model->getAllGameRevenues();
        if ($totalRevenues !== null) {
            $this->view->revenueDates = $totalRevenues['dates'];
            $this->view->revenueTotals = $totalRevenues['totals'];
        } else {
            // handling the error here, such as displaying an error message to admin
            echo 'hriynnaaaa';
        }

        //get total game revenue
        $this->view->totalGameRevenue = $this->model->getTotalGameRevenue();

        //game revenue all the details
        $this->view->gameRevenues = $this->model->getGameRevenueShare();
        $this->view->render('Admin/Admin_G');

    }
}
