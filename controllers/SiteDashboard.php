<?php

class SiteDashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->userCount = $this->model->userCount();
        $this->view->downloadCount = $this->model->downloadCount();

        // $this->view->totalDownloads = $this->model->totalDownloads();


        //chart 
        //print_r($_POST);
        $downloadasset = $this->model->getData("downloadasset", 30);
        $downloadgame = $this->model->getData("downloadgame", 30);

        //var_dump($downloadgame);


        $top_games = $this->model->TopGames();
        $this->view->top_games = $top_games;

        $labels = [];
        $downloadasset_data = [];
        foreach ($downloadasset as $row) {
            $labels[] = $row['date'];
            $downloadasset_data[] = $row['count'];
        }


        $downloadgame_data = [];
        foreach ($downloadgame as $row) {

            $downloadgame_data[] = $row['count'];
        }



        $this->view->labels = $labels;
        $this->view->downloadasset_data = $downloadasset_data;
        $this->view->downloadgame_data = $downloadgame_data;

        $this->view->render('Main/SiteDashboard');
    }
}
