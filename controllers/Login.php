<?php

class Login extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->render('Login');
    }

    function signin()
    {
        $user = $this->model->signin();

        if (!empty($user)) {
            //$_SESSION['role'] = "Game-Developer";
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['gamerID'];
            $_SESSION['avatar'] = $user['avatar'];
            $_SESSION['userRole'] = $user['userRole'];
            header('location:/indieabode/');
        } else {
            header('location:/indieabode/aa');
        }
    }

    function logout()
    {
        session_destroy();
        header('location:/indieabode/');
    }
}
