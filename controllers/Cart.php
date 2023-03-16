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

        $this->view->myAssets = $this->model->showMyAssetCart($_SESSION['id']);

        $this->view->myGames = $this->model->showMyGameCart($_SESSION['id']);

        $this->view->render('Cart');
    }

    function removeAssetFromCart()
    {

        $this->model->RemoveAssetFromCart($_SESSION['id'], $_GET['id']);

        header('location:/indieabode/cart');
    }

    function removeGameFromCart()
    {
        $this->model->RemoveGameFromCart($_SESSION['id'], $_GET['id']);

        header('location:/indieabode/cart');
    }
}
