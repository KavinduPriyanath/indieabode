<?php

class DevlogComments_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function AddComment($userID, $msg, $devlogID)
    {

        $sql = "INSERT INTO devlog_comments(userID, comment, devlogID) VALUES ('$userID', '$msg', '$devlogID')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function GetAllComments($devlogID)
    {
        $sql = "SELECT * FROM devlog_comments WHERE devlogID='$devlogID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function GetCommenter($userID)
    {

        $sql = "SELECT * FROM gamer WHERE gamerID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $commenter = $stmt->fetch(PDO::FETCH_ASSOC);

        return $commenter;
    }


    function AddReply($userID, $reply, $commentID)
    {

        $sql = "INSERT INTO devlog_comments_replies(userID, commentID, replyMsg) VALUES ('$userID', '$commentID', '$reply')";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }

    function GetAllReplies($cmtID)
    {

        $sql = "SELECT * FROM devlog_comments_replies WHERE commentID='$cmtID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function GetReplier($userID)
    {

        $sql = "SELECT * FROM gamer WHERE gamerID='$userID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $replier = $stmt->fetch(PDO::FETCH_ASSOC);

        return $replier;
    }

    function IncrementCommentCount($devlogID)
    {

        $sql = "SELECT * FROM devlog WHERE devLogID='$devlogID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devlog = $stmt->fetch(PDO::FETCH_ASSOC);

        $commentCount = $devlog['commentCount'] + 1;

        // $incrementSQL = "INSERT INTO devlog(commentCount) VALUES '$commentCount' WHERE devLogID='$devlogID'";

        $incrementSQL = "UPDATE devlog SET commentCount='$commentCount' WHERE devLogID='$devlogID'";

        $incrementStmt = $this->db->prepare($incrementSQL);

        $incrementStmt->execute();
    }

    function AlreadyLiked($userID, $devlogID)
    {

        $sql = "SELECT * FROM devlog_likes WHERE devlogID='$devlogID' AND userID='$userID'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll();

        if (count($result) != 0) {
            return true;
        } else {
            return false;
        }
    }

    function AddLike($devlogID, $userID)
    {

        $sql = "SELECT * FROM devlog WHERE devLogID='$devlogID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devlog = $stmt->fetch(PDO::FETCH_ASSOC);

        $likeCount = $devlog['likeCount'] + 1;

        $incrementSQL = "UPDATE devlog SET likeCount='$likeCount' WHERE devLogID='$devlogID'";

        $incrementStmt = $this->db->prepare($incrementSQL);

        $incrementStmt->execute();

        //addingLike to liketable

        $likeSQL = "INSERT INTO devlog_likes(devlogID, userID) VALUES ($devlogID, $userID)";

        $likestmt = $this->db->prepare($likeSQL);

        $likestmt->execute();
    }

    function RemoveLike($devlogID, $userID)
    {

        $sql = "SELECT * FROM devlog WHERE devLogID='$devlogID' LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        $devlog = $stmt->fetch(PDO::FETCH_ASSOC);

        $likeCount = $devlog['likeCount'] - 1;

        $decrementSQL = "UPDATE devlog SET likeCount='$likeCount' WHERE devLogID='$devlogID'";

        $decrementStmt = $this->db->prepare($decrementSQL);

        $decrementStmt->execute();

        //removing Like to liketable

        $dislikeSQL = "DELETE FROM devlog_likes WHERE devlogID='$devlogID' AND userID='$userID'";

        $dislikestmt = $this->db->prepare($dislikeSQL);

        $dislikestmt->execute();
    }
}
