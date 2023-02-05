<?php

class Cart extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        $this->view->myAssets = $this->model->showMyCart($_SESSION['id']);

        $this->view->render('Cart');
    }
}
