<?php

class Test extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->gamejams = $this->model->showAllGameJams();

        $this->view->render('Test');
    }
}
