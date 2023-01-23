<?php

class Assets extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->assets = $this->model->showAllAssets();

        $this->view->render('Main/Assets');
    }

    function classification_2D()
    {
        $this->view->assets = $this->model->show2dAssets();

        $this->view->render('Main/Assets');
    }
}
