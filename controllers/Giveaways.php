<?php

class Giveaways extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->myDetails = $this->model->MyTotalCoins($_SESSION['id']);

        $this->view->giveawayItems = $this->model->ShowAllGiveawayItems();
        // $this->view->render('Giveaways/ZombieGame');
        $this->view->render('Main/Giveaways');
    }

    function dailyWheel()
    {

        $this->view->hasSpinned = $this->model->HasSpinnedToday(date("Y-m-d"), $_SESSION['id']);

        $this->view->render('Giveaways/DailyWheel');
    }

    function insertTodaysSpin()
    {

        $reward = $_POST['reward'];
        $userID = $_SESSION['id'];

        if ($reward != 0) {
            $this->model->UpdateTotalCoins($userID, $reward, "spin");
        }

        $this->model->InsertDailySpin($userID, $reward);

        echo "Success";
    }

    function claimGame()
    {

        $gameID = $_POST['gameID'];
        $pieceWorth = $_POST['pieceWorth'];
        $userID = $_SESSION['id'];

        //update user indiecoins count
        $this->model->UpdateTotalCoins($userID, $pieceWorth, "claim");

        //add game to user's library
        $this->model->AddtoLibrary($gameID, $userID);

        //update giveaway item left copies count
        $this->model->UpdateLeftCopyCount($gameID);

        //update winners table
        $this->model->AddWinners($gameID, $userID);
    }
}
