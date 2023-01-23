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
        $this->view->games = $this->model->showAllGames();

        $this->view->render('Main/Games');
    }
}
