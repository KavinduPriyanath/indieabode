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
        $top_assets= $this->model->TopAssets();
        $this->view->top_assets = $top_assets;

        $recent_activities= $this->model->recentActivities();
        $this->view->recent_activities = $recent_activities;

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

        $this->view->render('Admin/Admin_assetD');
    }
}
