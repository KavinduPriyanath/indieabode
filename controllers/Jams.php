<?php

class Jams extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->gamejams = $this->model->showAllGameJams();

        $this->view->render('Main/Jams');
    }
}
