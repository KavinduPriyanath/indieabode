<?php

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
}
