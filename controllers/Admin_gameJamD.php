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
        $jams = $this->model->getAllJams();

        // $today = date('Y-m-d H:i:s');
        // foreach ($jams as &$gamejam) {
        //     if ($gamejam['votingEndDate'] < $today) {
        //         $gamejam['status'] = 'Jam has ended on '.$gamejam['votingEndDate'].' (Voting period ended)';
        //         $gamejam['tag'] = "Jam Ended";
        //     } elseif ($gamejam['submissionStartDate'] <= $today && $gamejam['votingEndDate'] >= $today) {
        //         $gamejam['status'] = 'Jam voting is ongoing and voting will be ended on '.$gamejam['votingEndDate'];
        //         $gamejam['tag'] = "Jam Voting Ongoing";
        //     } elseif ($gamejam['submissionEndDate'] >= $today) {
        //         $gamejam['status'] = 'Jam submission is ongoing and jam submission end and voting period would start on '.$gamejam['submissionEndDate'];
        //         $gamejam['tag'] = "Jam Submission Ongoing";
        //     } else {
        //         $gamejam['status'] = 'Jam not yet started and submissions will be start on '.$gamejam['submissionStartDate'];
        //         $gamejam['tag'] = "Jam Not yet Started";
        //     }
        // }
        $today = date('Y-m-d H:i:s');
        foreach ($jams as &$gamejam) {
            if ($gamejam['votingEndDate'] < $today) {
                $gamejam['status'] = 'Jam has ended on '.$gamejam['votingEndDate'].' (Voting period ended)';
                $gamejam['tag'] = "Jam Ended";

                // Get the ranking data for ended game jams
                $rankingData = $this->model->getRankingDataForGameJam($gamejam['gameJamID']);

                // Set the ranking data in the game jam array
                $gamejam['firstPlace'] = $rankingData['firstPlace'];
                $gamejam['secondPlace'] = $rankingData['secondPlace'];
                $gamejam['thirdPlace'] = $rankingData['thirdPlace'];
            } elseif ($gamejam['submissionStartDate'] <= $today && $gamejam['votingEndDate'] >= $today) {
                $gamejam['status'] = 'Jam voting is ongoing and voting will be ended on '.$gamejam['votingEndDate'];
                $gamejam['tag'] = "Jam Voting Ongoing";
            } elseif ($gamejam['submissionEndDate'] >= $today) {
                $gamejam['status'] = 'Jam submission is ongoing and jam submission end and voting period would start on '.$gamejam['submissionEndDate'];
                $gamejam['tag'] = "Jam Submission Ongoing";
            } else {
                $gamejam['status'] = 'Jam not yet started and submissions will be start on '.$gamejam['submissionStartDate'];
                $gamejam['tag'] = "Jam Not yet Started";
            }
        }

        $this->view->gamejams = $jams;

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
