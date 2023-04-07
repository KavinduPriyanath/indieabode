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
        $gigID = $_GET['id'];

        $developer = $this->model->getGameDeveloper($this->model->showSingleGig($gigID));

        $this->model->RequestGig($gigID, $developer['gamerID'], $_SESSION['id']);

        // $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        // parse_str($query, $result);
        // header('location:/indieabode/gig?' . http_build_query($result));
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
