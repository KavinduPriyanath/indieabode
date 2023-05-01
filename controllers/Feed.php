<?php

class Feed extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->feed = $this->model->showFeed($_SESSION['id']);

        $this->view->render('Feeds/Feed');
    }

}