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
        $confirmPassword = $_POST['confirmPassword'];

        //check password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        $strongPassword = false;

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $strongPassword = false;
        } else {
            $strongPassword = true;
        }

        if ($password == $confirmPassword && $strongPassword == true) {
            //hash password
            $hasedPassword = password_hash($password, PASSWORD_DEFAULT);

            $count = $this->model->checkUser($email);

            if (!empty($count)) {
                header('location:/indieabode/dw');
            } else {
                $this->model->insertUser($email, $username, $hasedPassword, $firstname, $lastname, $avatar, $userRole);

                header('location:/indieabode/');
            }
        } else {
            print_r("Passwords do not match!");
        }
    }
}
