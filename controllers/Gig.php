<?php

require "includes/PHPMailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Gig extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        if (isset($_GET['id'])) {
            $gigID = $_GET['id'];


            $this->view->gig = $this->model->showSingleGig($gigID);

            $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGig($gigID));

            $this->view->screenshots = $this->model->getScreenshots($gigID);

            $this->view->ssCount = count($this->model->getScreenshots($gigID));

            $this->view->hasRequested = $this->model->HasRequested($gigID, $_SESSION['id']);

            $viewTracker = $this->model->GigViewTracker($_SESSION['id'], $_SESSION['session'], $_GET['id']);

            if ($viewTracker) {
                $this->model->UpdateGigViews($_GET['id']);
            }

            $this->view->render('SingleGig');
        }
    }

    function reviews()
    {
        $this->view->game = $this->model->showSingleGame($_GET['id']);

        $this->view->render('Reviews/Game-Reviews');
    }

    function gigrequest()
    {


        if ($_POST['gig_request_made'] == true) {

            $gigID = $_POST['gigID'];
            $estimatedShare = $_POST['estimatedShare'];
            $expectedCost = $_POST['expectedCost'];

            $developer = $this->model->getGameDeveloper($this->model->showSingleGig($gigID));

            $this->model->RequestGig($gigID, $developer['gamerID'], $_SESSION['id'], $expectedCost, $estimatedShare);
        }
    }

    function viewgig()
    {

        $gigID = $_GET['id'];

        $gigToken = $_GET['token'];

        $this->view->gig = $this->model->showSingleGig($gigID);

        $this->view->gameDeveloper = $this->model->getGameDeveloper($this->model->showSingleGig($gigID));

        $developer = $this->model->getGameDeveloper($this->model->showSingleGig($gigID));

        $this->view->currentRequest = $this->model->currentRequest($gigID, $gigToken);

        $this->view->screenshots = $this->model->getScreenshots($gigID);

        $thisRequest = $this->model->currentRequest($gigID, $gigToken);

        if ($_SESSION['userRole'] == "game developer") {

            $user = $this->model->GetUser($thisRequest['publisherID']);
            $this->view->role = "Game Publisher";
        } else if ($_SESSION['userRole'] == "game publisher") {

            $user = $this->model->GetUser($thisRequest['developerID']);
            $this->view->role = "Game Developer";
        }

        $this->view->contactName = $user['firstName'] . " " . $user['lastName'];

        $this->view->ssCount = count($this->model->getScreenshots($gigID));

        $this->view->render('RequestedGig');
    }

    function updateCurrentRequest()
    {
        if ($_POST['gig_request_update'] == true) {

            $gigToken = $_POST['gigToken'];
            $cost = $_POST['cost'];
            $share = $_POST['share'];
            $pubShareApproval = $_POST['pubShareAppr'];
            $devShareApproval = $_POST['devShareAppr'];
            $pubCostApproval = $_POST['pubCostAppr'];
            $devCostApproval = $_POST['devCostAppr'];

            $eligible = 0;

            if (
                $pubCostApproval == "Approved" &&
                $devCostApproval == "Approved" &&
                $pubShareApproval == "Approved" &&
                $devShareApproval == "Approved"
            ) {
                $eligible = 1;
                echo "1";
            } else {
                $eligible = 0;
            }


            $this->model->updateCurrentRequest($gigToken, $cost, $share, $pubShareApproval, $devShareApproval, $pubCostApproval, $devCostApproval, $eligible);
        }
    }

    function updateEligibility()
    {

        if ($_POST['eligible'] == true) {

            $gigToken = $_POST['gigToken'];

            $this->model->UpdateEligibilityOfRequest($gigToken);
        }
    }

    function sendMessages()
    {

        $gigID = $_POST['gigID'];
        $message = $_POST['message'];
        $receiverID = $_POST['incoming_id'];
        $senderID = $_POST['senderID'];

        $this->model->InsertMessages($gigID, $senderID, $receiverID, $message);
    }

    function viewMessages()
    {
        $output = "";

        $gigId = $_GET['id'];
        $receiverId = $_POST['receiverId'];

        $allMessages = $this->model->ViewMessages($_SESSION['id'], $receiverId, $gigId);

        if (!empty($allMessages)) {

            foreach ($allMessages as $msg) {

                if ($msg['senderID'] == $_SESSION['id']) {
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>' . $msg['message'] . '</p>
                                    </div>
                                    </div>';
                } else {
                    $output .= '<div class="chat incoming">
                                    <img src="/indieabode/public/images/avatars/' . $msg['avatar'] . '" alt="">
                                    <div class="details">
                                        <p>' . $msg['message'] . '</p>
                                    </div>
                                    </div>';
                }
            }
        } else {
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }

        echo $output;
    }


    function purchaseGig()
    {
        $gigID = $_GET['id'];
        $purchaseCost = $_POST['publisherCost'];


        $userBillingInfo = $this->model->getUserBillingInfo($_SESSION['id']);

        $userDetails = $this->model->getUserDetails($_SESSION['id']);

        // $amount = $purchaseCost;
        $amount = 30.00;
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

    function gigPurchaseSuccessful()
    {


        $gigID = $_GET['id'];

        $publisherCost = $_POST['cost'];
        $share = $_POST['share'];
        $orderID = $_POST['orderID'];
        $developerID = $_POST['developerID'];
        $publisherID = $_SESSION['id'];

        $publisher = $this->model->getUserDetails($_SESSION['id']);

        $publisherEmail = $publisher['email'];

        $this->model->successfulPurchase($gigID, $publisherID, $developerID, $publisherCost, $share, $orderID);

        $this->model->gigPurchased($gigID);

        $this->model->AddPublisherToGame($gigID, $publisherID);

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
            $mail->addAddress($publisherEmail);

            $email_template = '
                <h2>Hello</h2>
                <p>You have purchased this gig</p>
            ';

            $mail->isHTML(true);
            $mail->Subject = "New Gig";
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
