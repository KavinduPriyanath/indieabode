<?php

class DevlogComments extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {


        if (isset($_POST['cliked_like'])) {

            $currentUserID = $_SESSION['id'];
            $currentDevlogID = $_GET['id'];

            $alreadyLiked = $this->model->AlreadyLiked($currentUserID, $currentDevlogID);

            $likeStatus = null;

            if ($alreadyLiked) {
                //remove like
                $this->model->RemoveLike($currentDevlogID, $currentUserID);
                $this->view->likesStatus = "disliked";
                $likeStatus = "disliked";
            } else {
                $this->model->AddLike($currentDevlogID, $currentUserID);
                $this->view->likesStatus = "liked";
                $likeStatus = "liked";
            }

            echo json_encode($likeStatus);
        }

        if (isset($_POST['add_comment'])) {

            $msg = $_POST['msg'];
            $userID = $_SESSION['id'];
            $devlogID = $_GET['id'];

            $this->model->AddComment($userID, $msg, $devlogID);

            $this->model->IncrementCommentCount($devlogID);

            echo "Comment Added Successfully!";
        }

        if (isset($_POST['comment_load_data'])) {

            $array_result = [];
            $devlogID = $_GET['id'];

            $allComments = $this->model->GetAllComments($devlogID);

            foreach ($allComments as $row) {

                $userID = $row['userID'];

                $commenter = $this->model->GetCommenter($userID);

                array_push($array_result, ['cmt' => $row, 'user' => $commenter]);
            }

            header('Content-type: application/json');
            echo json_encode($array_result);
        }

        if (isset($_POST['add_reply'])) {

            $commentID = $_POST['comment_id'];
            $reply = $_POST['reply_msg'];
            $userID = $_SESSION['id'];

            $this->model->AddReply($userID, $reply, $commentID);

            echo "Reply added successfully";
        }

        if (isset($_POST['view_comment_data'])) {

            $results_array = [];
            $cmtID = $_POST['cmt_id'];

            $allReplies = $this->model->GetAllReplies($cmtID);

            foreach ($allReplies as $reply) {

                $replierID = $reply['userID'];

                $replier = $this->model->GetReplier($replierID);

                array_push($results_array, ['reply' => $reply, 'replier' => $replier]);
            }

            header('Content-type: application/json');
            echo json_encode($results_array);
        }

        if (isset($_POST['add_subreplies'])) {

            $commentID = $_POST['cmt_id'];
            $reply = $_POST['reply_msg'];
            $userID = $_SESSION['id'];

            $this->model->AddReply($userID, $reply, $commentID);

            echo "Sub Reply added successfully";
        }
    }
}
