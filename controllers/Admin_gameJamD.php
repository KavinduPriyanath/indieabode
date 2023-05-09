<?php

class Admin_gameJamD extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        //get all the game jams in the gamejam table
        $this->view->gamejams = $this->model->getAllJams();

        //get data for the jam graph
        $ongoingCount = 0;
        $finishedCount = 0;
        $upcomingCount = 0;

        foreach ($this->view->gamejams as $jam) {
            switch ($jam['tag']) {
                case 'Jam Submission Ongoing':
                case 'Jam Voting Ongoing':
                    $ongoingCount++;
                    break;
                case 'Jam Ended':
                    $finishedCount++;
                    break;
                case 'Jam Not yet Started':
                    $upcomingCount++;
                    break;
            }
        }

        $this->view->countJamArray = array($ongoingCount, $finishedCount, $upcomingCount);

        $this->view->render('Admin/Admin_gameJamD');
    }
}
