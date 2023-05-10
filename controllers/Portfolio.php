<?php

class Portfolio extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {


        $owner = $this->model->GetDeveloperDetails($_GET['profile']);

        $this->view->isFollowing = $this->model->IsFollowing($_SESSION['id'], $owner['gamerID']);

        $this->view->developerDetails = $this->model->GetDeveloperDetails($_GET['profile']);

        $this->view->additionalDeveloperDetails = $this->model->GetAdditionalDeveloperDetails($_GET['profile']);

        $this->view->games = $this->model->GetDeveloperGames($_GET['profile']);

        $this->view->render('Portfolio');
    }

    function followOthers()
    {

        $follower = $_POST['follower'];
        $following = $_POST['following'];

        $isFollowing = $this->model->IsFollowing($follower, $following);

        if (empty($isFollowing)) {
            $this->model->FollowUser($follower, $following);
            $this->model->UpdateFollowerDetails($follower, "followed");
            $this->model->UpdateFolloweeDetails($following, "followed");
            echo "Followed";
        } else {
            $this->model->UnFollowUser($follower, $following);
            $this->model->UpdateFollowerDetails($follower, "unfollowed");
            $this->model->UpdateFolloweeDetails($following, "unfollowed");
            echo "UnFollowed";
        }
    }
}
