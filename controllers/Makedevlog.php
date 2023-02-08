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
        $releaseDate = $_POST['rdate'];

        $this->model->addNewDevlog(
            $name,
            $tagline,
            $description,
            $type,
            $visibility,
            $devlogImg,
            $gameName,
            $releaseDate
        );

        header('location:/indieabode/');
    }
}
