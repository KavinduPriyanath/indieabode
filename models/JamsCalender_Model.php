<?php

class JamsCalender_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function GetGamejams($currentMonth)
    {

        $previousMonth = '0' . ($currentMonth - 1);
        $nextMonth = '0' . ($currentMonth + 1);

        $previousMonthSubmissionDate = '2023-' . $previousMonth .  '-%';
        $previousMonthVotingEndDate = '2023-' . $previousMonth . '-%';
        $currentMonthSubmissionDate = '2023-' . $currentMonth .  '-%';
        $currentMonthVotingEndDate = '2023-' . $currentMonth . '-%';
        $nextMonthSubmissionDate = '2023-' . $nextMonth .  '-%';
        $nextMonthVotingEndDate = '2023-' . $nextMonth . '-%';


        $sql = "SELECT gameJamID, submissionStartDate, votingEndDate, jamTitle 
                FROM gamejam WHERE submissionStartDate LIKE '$previousMonthSubmissionDate' OR 
                votingEndDate LIKE '$previousMonthVotingEndDate' OR
                submissionStartDate LIKE '$currentMonthSubmissionDate' OR
                votingEndDate LIKE '$currentMonthVotingEndDate' OR
                submissionStartDate LIKE '$nextMonthSubmissionDate' OR
                votingEndDate LIKE '$nextMonthVotingEndDate'                
                ORDER BY submissionStartDate ASC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
