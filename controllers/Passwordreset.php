<?php

class Passwordreset extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $this->view->linkValidity = $this->model->CheckLinkValidity($_GET['id'], $_GET['token']);

        $this->view->render('PasswordReset');
    }
}
