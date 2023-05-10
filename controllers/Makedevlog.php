<?php

class Makedevlog extends Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
    }

    function index()
    {
        $currentUser = $_SESSION['id'];

        $this->view->posttypes = $this->model->DevlogPostTypes();

        $this->view->games = $this->model->currentDevGames($currentUser);

        $this->view->render('Forms/MakeDevlog');
    }

    function makeDevlog()
    {

        $name = $_POST['title'];
        $tagline = $_POST['tagline'];
        $description = $_POST['devLog-details'];
        $type = $_POST['type'];
        $visibility = $_POST['dev-visibility'];
        $gameName = $_POST['gname'];
        $devlogImg = $this->model->uploadCoverImg($gameName);

        $this->model->addNewDevlog(
            $name,
            $tagline,
            $description,
            $type,
            $visibility,
            $devlogImg,
            $gameName,
        );

        $addedDevlog = $this->model->GetThisDevlogRecord($name, $gameName);

        // header('location:/indieabode/');

        header('location:' . BASE_URL . 'devlog?id=' . $addedDevlog['devLogID']);
    }
}
