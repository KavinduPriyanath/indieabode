<?php

class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        // session_destroy();
    }

    function index()
    {
        if (isset($_SESSION['id'])) {
            print_r($_SESSION['id']);
        }

        // echo "Im index controller";
        $this->view->render('Home');
    }
}
