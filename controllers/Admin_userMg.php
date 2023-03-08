<?php

require_once('includes/tcpdf/tcpdf.php');

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

        

        if($filter_text=="gd")
            $usertype = "game developer";
        if($filter_text=="gp")
            $usertype = "game publisher";
        if($filter_text=="go")
            $usertype = "gamejam organizer";
        if($filter_text=="gamer")
            $usertype = "gamer";
        if($filter_text=="ac")
            $usertype = "asset creator";
        
        $this->view->users = $this->model->viewUser($usertype);

        $this->view->active=$usertype;
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
    public function viewUser($userid){
        
     
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
    public function downloadUser($userid){
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


        //Asset Creator's report generate
        if($user['userRole']=="asset creator"){

            ob_start();
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

             // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

             // Disable header and footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            $pdf->SetFont('times', 'BI', 12);

            // add a page
            $pdf->AddPage();

            $pdf->Cell(0, 10, 'My Document Title', 0, 1, 'C');

            $pdf->SetFont('helvetica', '', 12);
            $pdf->MultiCell(0, 10, 'This is my paragraph of text. It can span multiple lines and will automatically wrap to fit within the page margins.', 0, 'J', false);

            $pdf->SetFont('helvetica', '', 12);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Cell(60, 10, 'Column 1', 1, 0, 'C', 1);
            $pdf->Cell(60, 10, 'Column 2', 1, 0, 'C', 1);
            $pdf->Cell(60, 10, 'Column 3', 1, 1, 'C', 1);
            $pdf->SetFont('helvetica', '', 10);
            for ($i = 1; $i <= 10; $i++) {
                $pdf->Cell(60, 10, 'Row ' . $i . ', Column 1', 1, 0, 'L', 1);
                $pdf->Cell(60, 10, 'Row ' . $i . ', Column 2', 1, 0, 'L', 1);
                $pdf->Cell(60, 10, 'Row ' . $i . ', Column 3', 1, 1, 'L', 1);
            }

            // set some text to print
            $txt = <<<EOD
            INDIE ABODE 
            Asset Creator  Report<br>

            EOD;

            // add a table
            $header = array('Name', 'Age', 'Country');
            $data = array(
                array('John Doe', '35', 'USA'),
                array('Jane Smith', '27', 'Canada'),
                array('Bob Johnson', '42', 'Australia')
            );
            $pdf->Ln(10); // add some vertical spacing before the table
            $pdf->SetFont('times', '', 10);
            $pdf->SetFillColor(240, 240, 240); // set background color for header row
            $pdf->SetTextColor(0); // set text color for header row
            $pdf->SetDrawColor(255, 255, 255); // set border color for all cells
            $pdf->Cell(30, 7, $header[0], 1, 0, 'C', 1);
            $pdf->Cell(30, 7, $header[1], 1, 0, 'C', 1);
            $pdf->Cell(30, 7, $header[2], 1, 1, 'C', 1);
            $pdf->SetFillColor(255, 255, 255); // set background color for data rows
            $pdf->SetTextColor(0); // set text color for data rows
            $pdf->SetFont('times', '', 8);
            foreach ($data as $row) {
                $pdf->Cell(30, 6, $row[0], 1, 0, 'C', 1);
                $pdf->Cell(30, 6, $row[1], 1, 0, 'C', 1);
                $pdf->Cell(30, 6, $row[2], 1, 1, 'C', 1);
            }    
            
            // print a block of text using Write()
            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);


            
            // ---------------------------------------------------------

            ob_clean();
            ob_flush();
            //Close and output PDF document
            $pdf->Output('example_003.pdf', 'I');

            ob_end_flush();
            ob_end_clean();




            //$this->view->render('Admin/reports/Admin_assetCreator_report');
        }


        
        if($user['userRole']=="game publisher"){
            $this->view->render('Admin/reports/Admin_gamePublisher_report');
        }

    }
}
