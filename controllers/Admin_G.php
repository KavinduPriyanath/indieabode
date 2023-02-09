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
        $recent_activities= $this->model->recentActivities();
        $top_games= $this->model->TopGames();

        // var_dump($recent_activities);

        $this->view->recent_activities = $recent_activities;
        $this->view->top_games = $top_games;

        // echo '/indieabode/public/uploads/games/cover/' .$top_games['img'];


        // $this->view->userCount = $this->model->userCount();

        // $this->view->totalDownloads = $this->model->totalDownloads();

        //print_r($_POST);
        $downloadasset = $this->model->getData("downloadasset",30);
        $downloadgame = $this->model->getData("downloadgame",30);

        //var_dump($downloadgame);
        

        

        $labels = [];
        $downloadasset_data = [];
        foreach($downloadasset as $row){
            $labels[] = $row['date'];
            $downloadasset_data[] = $row['count'];
        }


        $downloadgame_data = [];
        foreach($downloadgame as $row){
    
            $downloadgame_data[] = $row['count'];
        }

        

        $this->view->labels=$labels;
        $this->view->downloadasset_data=$downloadasset_data;
        $this->view->downloadgame_data=$downloadgame_data;

        $this->view->render('Admin/Admin_G');
    }
}
