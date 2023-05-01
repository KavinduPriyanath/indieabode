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

        $this->view->firstRow = $row1;
        $this->view->secondRow = $row2;

        // print_r($row1);

        $this->view->render('GameJam/JamCalender');
    }
}
