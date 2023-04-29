<?php

require "includes/PHPMailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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

        $admin = $this->model->IsAdmin();

        $this->view->loggedUser = $this->model->signin();

        if (!empty($admin)) {
            $_SESSION['logged'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];
            $_SESSION['userRole'] = "admin";
            $_SESSION['email'] = $admin['email'];
            header('location:/indieabode/SiteDashboard');
        } else if (!empty($user) && $user['verified'] == 1) {
            //$_SESSION['role'] = "Game-Developer";
            $_SESSION['session'] = rand(10, 100);
            $_SESSION['logged'] = $user['gamerID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['gamerID'];
            $_SESSION['avatar'] = $user['avatar'];
            $_SESSION['userRole'] = $user['userRole'];
            $_SESSION['status'] = "Welcome Back!";


            if ($user['userRole'] == "game developer") {
                header('location:/indieabode/home/developer');
            } else if ($user['userRole'] == "gamer") {
                header('location:/indieabode/home');
            } else {
                header('location:/indieabode/');
            }
        } else if (!empty($user) && $user['verified'] == 0) {
            $_SESSION['session'] = rand(10, 100);
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['gamerID'];
            $_SESSION['avatar'] = $user['avatar'];
            $_SESSION['userRole'] = $user['userRole'];
            $_SESSION['status'] = "Account Verification Successful!";

            $userEmail = $_SESSION['email'];
            $userName = $_SESSION['username'];
            $otpCode = $this->model->OTPGeneration($_SESSION['id']);

            try {
                $mail = new PHPMailer(true);

                $mail->SMTPDebug = SMTP::DEBUG_SERVER;

                $mail->isSMTP();
                $mail->SMTPAuth = true;

                $mail->Host = "smtp.gmail.com";
                $mail->SMTPSecure = "tls";
                $mail->Port = 587;

                $mail->Username = "tech2019man@gmail.com";
                $mail->Password = "qohvqzbaieleualv";

                $mail->setFrom("tech2019man@gmail.com", "Indieabode");
                $mail->addAddress($userEmail);

                $email_template = '
                    <h2>Hello</h2>
                    <h3>Activate your account ' . $userName .  ' on Indieabode. 
                    Your OTP Code is ' . $otpCode . ' for now.
                    </h3>
                ';

                $mail->isHTML(true);
                $mail->Subject = "Indieabode - Account Activation";
                $mail->Body = $email_template;

                $mail->send();
                header('location:/indieabode/login/activation');
            } catch (Exception $e) {
                header('location:/indieabode/failedpasswordreset');
            }
            // header('location:/indieabode/activation');
        }
    }

    function logout()
    {
        session_destroy();
        header('location:/indieabode/games');
    }

    function activation()
    {
        $this->view->render('LoginVerification');
    }

    function activateAccount()
    {
        $first = $_POST['first-digit'];
        $second = $_POST['second-digit'];
        $third = $_POST['third-digit'];
        $fourth = $_POST['fourth-digit'];
        $fifth = $_POST['fifth-digit'];

        if ($this->model->OTPValidation($first, $second, $third, $fourth, $fifth, $_SESSION['id'])) {
            $_SESSION['logged'] = $_SESSION['id'];
            $this->model->ActivateAccount($_SESSION['id']);
            if ($_SESSION['userRole'] == "game developer") {
                header('location:/indieabode/home/developer');
            } else {
                header('location:/indieabode/');
            }
        } else {
            print_r($this->model->OTPValidation($first, $second, $third, $fourth, $fifth, $_SESSION['id']));
            print_r($first . $second . $third . $fourth . $fifth);
            //header('location:/indieabode/aa');
        }
    }



    function loginValidation()
    {

        if ($_POST['login_validation'] == true) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->signin();

            if (!empty($user)) {
                echo "success";
            } else {
                echo "failure";
            }
        }
    }
}

