<?php

class Admin_addNew extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        //print_r($_POST);
        $this->view->render('/Admin/Admin_addNew');
    }

    function addAdmin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $userRole = "Admin";

        $count = $this->model->checkUser($email);

        if (!empty($count)) {
            header('location:/indieabode/dw');
        } else {
            $this->model->insertUser($email, $username, $password, $firstname, $lastname,$userRole);

            header('location:/indieabode/GameDB');
        }
    }
}
