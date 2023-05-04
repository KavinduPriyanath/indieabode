<?php

class AddAdvertisement extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        // session_destroy();
    }

    function index()
    {




        $this->view->render('Forms/AddAdvertisement');
    }
}
