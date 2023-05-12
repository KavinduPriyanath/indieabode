<?php

class Site_Game extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        $this->view->allgames = $this->model->showAllGame();


        $this->view->render('Admin/Site_Game');
    }
}
