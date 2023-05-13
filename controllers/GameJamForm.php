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
        $jamType = $_POST['ranking'];
        $jamStartDate = $_POST['Sdate'];
        $jamEndtDate = $_POST['Edate'];
        $jamVEndDate = ($_POST['ranking'] == "Ranked") ? $_POST['V_E_Date'] : $_POST['Edate'];
        $jamContent = $_POST['description'];
        $jamCriteria = ($_POST['ranking'] == "Ranked") ? $_POST['criteria'] : null;
        $jamVisibility = $_POST['visibility'];
        $jamHostID = $_SESSION['id'];
        $jamVoters = $_POST['voters'];
        $jamTwitterHashtag = $_POST['twitter'];
        $jamTheme = ($_POST['ranking'] == "Ranked") ? $_POST['jamTheme'] : null;


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
            $jamHostID,
            $jamVoters,
            $jamTwitterHashtag,
            $jamCoverImg,
            $jamTheme
        );

        $hostedJam = $this->model->GetThisJamRecord($gamejamTitle, $jamHostID);

        header('location:' . BASE_URL . 'jam?id=' . $hostedJam['gameJamID']);
    }
}
