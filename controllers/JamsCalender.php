<?php

class JamsCalender extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        // $this->view->gamejams = $this->model->showAllGameJams();
        $monthList = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $currentMonth = date('m');

        $visibleMonthList = [];

        array_push($visibleMonthList, $monthList[(int)$currentMonth - 2]);
        array_push($visibleMonthList, $monthList[(int)$currentMonth - 1]);
        array_push($visibleMonthList, $monthList[(int)$currentMonth]);

        $this->view->months = $visibleMonthList;

        $allJams = $this->model->GetGamejams($currentMonth);
        $jamsCount = count($allJams);

        $row1 = [];
        $row2 = [];

        for ($i = 0; $i < $jamsCount; $i++) {

            if ($i == 0) {
                array_push($row1, $allJams[$i]);
            } else if ($allJams[$i]['submissionStartDate'] < $allJams[$i - 1]['votingEndDate']) {
                array_push($row2, $allJams[$i]);
            } else if ($allJams[$i]['submissionStartDate'] > $allJams[$i - 1]['votingEndDate']) {
                array_push($row1, $allJams[$i]);
            }
        }

        $row3 = $row2;
        $row4 = [];
        $row2Count = count($row2);

        for ($i = 1; $i < $row2Count; $i++) {

            if ($row3[$i]['submissionStartDate'] < $row3[$i - 1]['votingEndDate']) {
                array_push($row4, $row3[$i]);
                unset($row2[$i]);
            }

            // if ($i == 0) {
            //     array_push($row1, $allJams[$i]);
            // } else if ($allJams[$i]['submissionStartDate'] < $allJams[$i - 1]['votingEndDate']) {
            //     array_push($row4, $allJams[$i]);
            // } else if ($allJams[$i]['submissionStartDate'] > $allJams[$i - 1]['votingEndDate']) {
            //     array_push($row1, $allJams[$i]);
            // }

        }

        // print_r($row3);


        $this->view->firstRow = $row1;
        $this->view->secondRow = $row2;
        $this->view->thirdRow = $row4;

        // print_r($row1);

        $this->view->render('GameJam/JamCalender');
    }
}
