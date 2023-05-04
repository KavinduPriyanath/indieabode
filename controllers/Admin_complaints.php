<?php

require "includes/PHPMailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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

    public function updateComplaintChecked()
    {
        if (isset($_POST['complaintID']) && isset($_POST['isChecked'])) {
            $complaintID = $_POST['complaintID'];
            $isChecked = $_POST['isChecked'];

            // Update the complaint status in the database
            $this->model->updateComplaint($complaintID, $isChecked);

            // Get the complainer's email address
            $complainer = $this->model->getComplainerEmail($complaintID);
            $complainerEmail = $complainer['email'];
            // $complainerEmail = 'nadeedarshi1999@gmail.com';
            $c_username = $complainer['username'];

            if ($isChecked && !empty($complainerEmail)) {
                // The complaint has been checked and the complainer's email is available,
                // so send an email to the complainer to notify them of the status change.

                $mail = new PHPMailer(true);

                $mail->SMTPDebug = SMTP::DEBUG_SERVER;

                $mail->isSMTP();
                $mail->SMTPAuth = true;

                $mail->Host = "smtp.gmail.com";
                $mail->SMTPSecure = "tls";
                $mail->Port = 587;

                $mail->Username = "tech2019man@gmail.com";
                $mail->Password = "qohvqzbaieleualv";

                $mail->setFrom("tech2019man@gmail.com", "Indieabode Admin");
                $mail->addAddress($complainerEmail);

                $email_template = '
                    <html>
                    <body>
                        <p>Dear '.$c_username.',</p>
                        <p>We are writing to inform you that your recent complaint regarding <b>that game</b> has been reviewed and action has been taken. We appreciate you taking the time to bring this issue to our attention and we hope that you will be satisfied with the outcome.</p>
                        <p>If you have any further questions or concerns, please do not hesitate to contact us at '.$_SESSION['email'].'.</p>
                        <p>Thank you for choosing IndieAbode as your gaming platform.</p>
                        <p>Best regards,</p>
                        <p>IndieAbode Admin</p>
                    </body>
                    </html>
                ';



                $mail->isHTML(true);
                $mail->Subject = "Your Complaint Has Been Checked";
                $mail->Body = $email_template;

                $mail->send();
            }
        }
    }

}
