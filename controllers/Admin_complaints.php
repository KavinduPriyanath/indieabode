<?php

class Admin_complaints extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->complaints = $this->model->viewComplaints();

        $this->view->active="all";

        $this->view->render('Admin/Admin_complaints');
    }

    public function viewFilteredComplaints($filter_text){
        $this->view->complaints = $this->model->viewComplaints($filter_text);

        $this->view->active=$filter_text;
        $this->view->render('Admin/Admin_complaints');
    }

    public function updateComplaintChecked() {
        if (isset($_POST['complaintID']) && isset($_POST['isChecked'])) {
            $complaintID = $_POST['complaintID'];
            $isChecked = $_POST['isChecked'];

            echo 'complaintID: ' . $complaintID . '<br>';
            echo 'isChecked: ' . $isChecked . '<br>';

            $this->model->updateComplaint($complaintID, $isChecked);
        }
    }
}
