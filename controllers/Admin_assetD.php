<?php

class Admin_assetD extends Controller
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
        $this->view->totalTxAssets = $this->model->getTotalTxAsset();

        //get data for the transaction graph
        $assetTxSummary = $this->model->getTxSummary();
        if ($assetTxSummary !== null) {
            $this->view->txDates = $assetTxSummary['dates'];
            $this->view->txTotals = $assetTxSummary['totals'];
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
        $this->view->assetPurchases = $this->model->getAllPayments();

        //get game revenues shares for each day
        $totalRevenues = $this->model->getAllAssetRevenues();
        if ($totalRevenues !== null) {
            $this->view->revenueDates = $totalRevenues['dates'];
            $this->view->revenueTotals = $totalRevenues['totals'];
        } else {
            // handling the error here, such as displaying an error message to admin
            echo 'hriynnaaaa';
        }

        //get total game revenue
        $this->view->totalAssetRevenue = $this->model->getTotalAssetRevenue();

        //game revenue all the details
        $this->view->assetRevenues = $this->model->getAssetRevenueShare();
        $this->view->render('Admin/Admin_assetD');

    }
}
