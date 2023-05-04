<?php

require "includes/PHPMailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Crowdfund extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        if (isset($_GET['id'])) {
            $crowdfundID = $_GET['id'];


            $this->view->crowdfund = $this->model->showSingleCrowdfund($crowdfundID);

            // $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGame($gameID));

            $this->view->screenshots = $this->model->getScreenshots($crowdfundID);

            $this->view->ssCount = count($this->model->getScreenshots($crowdfundID));

            $this->view->backers = $this->model->AllBackers($crowdfundID);


            $viewTracker = $this->model->CrowdfundViewTracker($_SESSION['id'], $_SESSION['session'], $crowdfundID);

            if ($viewTracker) {
                $this->model->UpdateCrowdfundViews($crowdfundID);
            }

            $this->view->render('SingleCrowdfunding');
        }
    }



    function donation()
    {
        $crowdfundID = $_GET['id'];
        $donationAmount = $_POST['donationAmount'];


        $userBillingInfo = $this->model->getUserBillingInfo($_SESSION['id']);

        $userDetails = $this->model->getUserDetails($_SESSION['id']);



        // if (empty($asseID)) {
        //     echo "2";
        // }

        // $amount = $asset['assetPrice'];
        $amount = $donationAmount;
        $merchant_id = "1222729";
        $order_id = uniqid();
        $merchant_secret = "MjczNjU0OTYzMzM3NDA3NzYzMjczNzEyMjI2MjM4MTQ3MjE2OTkxMg==";
        $currency = "LKR";

        //more information
        $address = $userBillingInfo['streetLine1'];
        $city = $userBillingInfo['city'];
        $country = $userBillingInfo['country'];
        $firstName = $userDetails['firstName'];
        $lastName = $userDetails['lastName'];
        $email = $userDetails['email'];


        $hash = strtoupper(
            md5(
                $merchant_id .
                    $order_id .
                    number_format($amount, 2, '.', '') .
                    $currency .
                    strtoupper(md5($merchant_secret))
            )
        );

        $array = [];

        $array['amount'] = $amount;
        $array['merchant_id'] = $merchant_id;
        $array['order_id'] = $order_id;
        $array['currency'] = $currency;
        $array['hash'] = $hash;

        $array['address'] = $address;
        $array['city'] = $city;
        $array['country'] = $country;
        $array['firstName'] = $firstName;
        $array['lastName'] = $lastName;
        $array['email'] = $email;

        $jsonObj = json_encode($array);

        echo $jsonObj;
    }

    function donationsuccessful()
    {


        $orderId = $_POST['orderID'];
        $amount = $_POST['amount'];

        $downloadingDev = $this->model->currentUser($_SESSION['id']);

        $developerEmail = $downloadingDev['email'];

        //Update Donations table for donation history
        $this->model->successfulDonation($_GET['id'], $_SESSION['id'], $amount, $orderId);

        //Update backers count, current amount of the crowdfund

        //If crowdfund succeeded then get 5% cut

        //sending an email receipt
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
            $mail->addAddress($developerEmail);

            $email_template = '
                <h2>Hello</h2>
                <p>You have donated to this crowdfunding</p>
            ';

            $mail->isHTML(true);
            $mail->Subject = "New Asset";
            $mail->Body = $email_template;

            $mail->send();


            //$this->model->AddtoLibrary($_GET['id'], $_SESSION['id']);
            //header('location:/indieabode/forgotpassword/resetmailsent');
            //header("location:/indieabode/asset?id=" . $_GET['id']);
        } catch (Exception $e) {
            header('location:/indieabode/downloadfailed');
            // echo "1";
        }
    }
}
