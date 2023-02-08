<?php

class GameJamForm extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {


        $this->view->render('Forms/GameJamForm');
    }

    function hostGameJam()
    {

        $gamejamTitle = $_POST['title'];
        $gamejamTagline = $_POST['tagline'];
        $jamStartDate = $_POST['Sdate'];
        $jamEndtDate = $_POST['Edate'];
        $jamVEndDate = $_POST['V_E_Date'];
        $jamContent = $_POST['game-details'];
        $jamType = $_POST['jamType'];
        $jamCriteria = $_POST['criteria'];
        $jamVisibility = $_POST['visibility'];
        $jamParticipants = $_POST['Max'];
        $canJoinAfterStarted = $_POST['canJoinAfterStarted'];
        $jamHostID = $_SESSION['id'];
        $jamVoters = $_POST['voters'];
        $jamTwitterHashtag = $_POST['twitter'];

        
        $jamCoverImg = $this->model->uploadCoverImg($gamejamTitle);
       

        $this->model->hostGameJam(
            $gamejamTitle,
            $gamejamTagline,
            $jamStartDate,
            $jamEndtDate,
            $jamVEndDate,
            $jamContent,
            $jamType,
            $jamCriteria,
            $jamVisibility,
            $jamParticipants,
            $canJoinAfterStarted,
            $jamHostID,
            $jamVoters,
            $jamTwitterHashtag,
            $jamCoverImg
        );

        header('location:/indieabode/');
    }
}
