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
            if(empty($this->users)){
                echo "empty";

            }else{
                echo "na";
            }
        //$this->view->totalDownloads = $this->model->totalDownloads();

        // $this->view = $this->model->delete_user($user['id']);

        // if(isset($_POST['delete_user'])){
        //    $user_id = mysqli_real_escape_string($con, $_POST['id']); 
        //    echo $user_id;
        //    $this->view = $this->model->delete_user($user_id);
        // }

        $this->view->render('Main/Admin_userMg');
    }

    public function deleteUser($userid){
        
     
               $this->view = $this->model->delete_user($userid);
               if($this->view){
                 echo" wade hari";
               }else{
                echo "ba";
               }
            

    }
    // if(isset($_POST['delete_user'])){
    //     $user_id = mysqli_real_escape_string($con, $_POST['id']); 
    //     echo $user_id;
    //     $this->view = $this->model->delete_user($user_id);
    //  }

    //  $this->view->render('Main/Admin_userMg');
}
