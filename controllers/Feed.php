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
        
            


            $this->view->feed = $this->model->showCart();

        
        $this->view->render('Feed');
    }

}