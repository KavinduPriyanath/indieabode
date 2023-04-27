<?php

class JamsCalender extends Controller
{

    function __construct()
    {
        parent::__construct();
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

        $this->view->render('GameJam/JamCalender');
    }
}
