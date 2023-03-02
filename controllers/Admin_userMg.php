<?php

class Admin_userMg extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $this->view->users = $this->model->viewUser();
            // if(empty($this->users)){
            //     echo "empty";

            // }else{
            //     echo "na";
            // }
        //$this->view->totalDownloads = $this->model->totalDownloads();

        // $this->view = $this->model->delete_user($user['id']);

        // if(isset($_POST['delete_user'])){
        //    $user_id = mysqli_real_escape_string($con, $_POST['id']); 
        //    echo $user_id;
        //    $this->view = $this->model->delete_user($user_id);
        // }
        $this->view->active="all";
        $this->view->render('Admin/Admin_userMg');
    }

    public function viewFilteredUser($filter_text){

        echo $filter_text;
        $this->view->users = $this->model->viewUser($filter_text);
        if(empty($this->users)){
            echo "empty";

        }else{
            echo "na";
        }
        $this->view->active=$filter_text;
        $this->view->render('Admin/Admin_userMg');
    }

    public function deleteUser($userid){
        
     
               $this->view = $this->model->delete_user($userid);
               if($this->view){
                 echo" wade hari";
               }else{
                echo "ba";
               }
            

    }
    public function downloadUser($userid){
        
     
            //    $this->view->user = $this->model->download_user($userid);
            //    if($this->view){
            //      echo" wade hari";
            //    }else{
            //     echo "ba";
            //    }
        $user = $this->model->download_user($userid);
            
        if($user['userRole']=="game developer"){
            $this->view->render('Admin/reports/Admin_report');
        }
        if($user['userRole']=="gamer"){
            $this->view->render('Admin/reports/Admin_gamer_report');
        }
        if($user['userRole']=="gamejam organizer"){
            $this->view->render('Admin/reports/Admin_jamOrganizer_report');
        }
        if($user['userRole']=="asset creator"){
            $this->view->render('Admin/reports/Admin_assetCreator_report');
        }
        if($user['userRole']=="game publisher"){
            $this->view->render('Admin/reports/Admin_gamePublisher_report');
        }

    }
    // if(isset($_POST['delete_user'])){
    //     $user_id = mysqli_real_escape_string($con, $_POST['id']); 
    //     echo $user_id;
    //     $this->view = $this->model->delete_user($user_id);
    //  }

    //  $this->view->render('Main/Admin_userMg');
}
