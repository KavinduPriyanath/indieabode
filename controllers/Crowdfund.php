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

            $thisCrowdfund = $this->model->showSingleCrowdfund($crowdfundID);

            //Get the remaining Days Left to go of the crowdfunding
            $todayDate = date("Y-m-d");

            $endDate = $thisCrowdfund['deadline'];

            $origin = new DateTime($todayDate);
            $target = new DateTime($endDate);

            $interval = $origin->diff($target);

            $daysLeft = $interval->format('%R%a');

            $this->view->days = $interval->format('%a');;

            //Check whether the crowdfund has expired or not
            if ($daysLeft == "+0" || substr($daysLeft, 0, 1) == "-") {
                $this->view->expired = true;

                //Check whether the crowdfund has reached its goal
                if ($thisCrowdfund['currentAmount'] > $thisCrowdfund['expectedAmount']) {

                    //If crowdfund succeeded then get 5% cut
                    $this->model->IndieAbodeShare($crowdfundID, $thisCrowdfund['currentAmount']);

                    //Mark crowdfund revenue share collected by Indieabode
                    $this->model->SiteShareCollected($crowdfundID);
                }
            } else {
                $this->view->expired = false;
            }


            // $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGame($gameID));

            $this->view->screenshots = $this->model->getScreenshots($crowdfundID);

            $this->view->ssCount = count($this->model->getScreenshots($crowdfundID));

            $this->view->backers = $this->model->AllBackers($crowdfundID);

            //For Showing Recommended Crowdfundings
            $thisCrowdfunds = $this->model->RecommendedCrowdfunds($crowdfundID);

            $crowdfundCount = count($thisCrowdfunds);

            $todayDate = date("Y-m-d");

            $origin = new DateTime($todayDate);

            for ($i = 0; $i < $crowdfundCount; $i++) {

                $fundingPercentage = ($thisCrowdfunds[$i]['currentAmount'] / $thisCrowdfunds[$i]['expectedAmount']) * 100;

                //Adding Percentage Value of current funding amount to the associative array
                $thisCrowdfunds[$i]['fundingPercentage'] = (int)$fundingPercentage;
                $thisCrowdfunds[$i][7] = $fundingPercentage;

                //Adding remaining days count to the associative array
                $endDate = $thisCrowdfunds[$i]['deadline'];

                $target = new DateTime($endDate);

                $interval = $origin->diff($target);

                $daysLeft = $interval->format('%R%a');

                $thisCrowdfunds[$i]['daysLeft'] = $daysLeft;
                $thisCrowdfunds[$i][8] = $daysLeft;
            }

            $this->view->recommendedCrowdfunds = $thisCrowdfunds;

            if (isset($_SESSION['logged'])) {
                $viewTracker = $this->model->CrowdfundViewTracker($_SESSION['id'], $_SESSION['session'], $crowdfundID);

                if ($viewTracker) {
                    $this->model->UpdateCrowdfundViews($crowdfundID);
                }
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

        //Update backers count, current amount of the crowdfund after payment gateway cut
        $this->model->UpdateCrowdfundProgress($_GET['id'], $amount);

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
