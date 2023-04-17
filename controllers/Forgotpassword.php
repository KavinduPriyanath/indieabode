<?php

require "includes/PHPMailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Forgotpassword extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $this->view->render('ForgotPassword');
    }

    public function resetmailsent()
    {
        $this->view->render('PasswordResetMailSent');
    }

    public function forgotpassword()
    {

        // if (isset($_POST["submit"])) {
        //     $userEmail = $_POST['email'];
        // }

        $user = $this->model->resetPassword();

        $userEmail = $user['email'];
        $userName = $user['username'];

        $userID = $user['gamerID'];
        $token = md5(rand());

        $this->model->UpdateToken($userID, $token);


        try {
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

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
                <h3>Someone attempted to reset the password for your account ' . $userName .  ' on Indieabode. If that person was you click the link below to update your password. If it wasnt you then you dont have to do anything.
                </h3>
                <a href="http://localhost/indieabode/passwordreset?id=' . $userID . '&token=' . $token . '">Click Me</a>
            ';

            $mail->isHTML(true);
            $mail->Subject = "Reset your Indieabode password";
            $mail->Body = $email_template;

            $mail->send();
            header('location:/indieabode/forgotpassword/resetmailsent');
        } catch (Exception $e) {
            header('location:/indieabode/failedpasswordreset');
        }
    }

    function updateUserPassword()
    {

        if ($_POST['password_reset'] == true) {

            $userID = $_POST['userID'];
            $newPassword = $_POST['newPassword'];
            $token = $_POST['token'];
            $newToken = md5(rand());

            $hasedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $this->model->ResetUserPassword($userID, $token, $hasedPassword, $newToken);

            echo "1";
        } else {
            echo "2";
        }
    }
}
