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


        $this->view->render('Giveaways/ZombieGame');
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
            $this->view->updateTotalCoins = $this->model->UpdateTotalCoins($userID, $reward);
        }

        $this->model->InsertDailySpin($userID, $reward);

        echo "Success";
    }
}
