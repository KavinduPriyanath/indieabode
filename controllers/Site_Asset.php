<?php

class Site_Asset extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {

        $this->view->allassets = $this->model->showAllAsset();

        $this->view->render('Admin/Site_Asset');
    }
}
