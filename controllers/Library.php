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

        $this->view->myAssets = $this->model->showMyLibrary($_SESSION['id']);

        $this->view->render('Library');
    }
}
