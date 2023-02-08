<?php

class Register extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        //print_r($_POST);

        $this->view->userRoles = $this->model->UserRoles();

        $this->view->render('Register');
    }

    function signup()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $avatar = $_POST['avatar'];
        $userRole = $_POST['userrole'];

        //hash password
        $hasedPassword = password_hash($password, PASSWORD_DEFAULT);

        $count = $this->model->checkUser($email);

        if (!empty($count)) {
            header('location:/indieabode/dw');
        } else {
            $this->model->insertUser($email, $username, $hasedPassword, $firstname, $lastname, $avatar, $userRole);

            header('location:/indieabode/');
        }
    }
}