<?php

class Library extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        $this->view->myAssets = $this->model->showMyAssetLibrary($_SESSION['id']);

        $this->view->myGames = $this->model->showMyGameLibrary($_SESSION['id']);

        $this->view->render('Library');
    }
}
