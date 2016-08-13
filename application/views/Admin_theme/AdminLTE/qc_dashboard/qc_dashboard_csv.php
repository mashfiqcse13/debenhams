<?php
header( "Content-Type: application/vnd.ms-excel" );
header( "Content-disposition: attachment; filename=spreadsheet.csv" );

echo " Style No,File Hand Over Date,File Receive Date,P.P Meeting Date,Wash Approval Date,Wash Comment,In-Line Date,Final Inspection Date,Orders Comment,Data Entry Date of QC,Last Modified Date\n";
                          
     foreach ($get_all_qc_info as $all_informations) {       
        
             echo $all_informations->style_no;
             echo ",";
             echo date('d/m/Y', strtotime($all_informations->file_hand_over_date));
             echo ",";
             echo date('d/m/Y', strtotime($all_informations->file_receive_date));
             echo ",";
             echo date('d/m/Y', strtotime($all_informations->pp_meeting_date));
             echo ",";
             echo date('d/m/Y', strtotime($all_informations->wash_approval_date));
             echo ",";
             echo $all_informations->wash_comment;
             echo ",";
             echo date('d/m/Y', strtotime($all_informations->inline_date));
             echo ",";
             echo date('d/m/Y', strtotime($all_informations->final_inspection_date));
             echo ",";
             echo $all_informations->orders_comment;
             echo ",";
             echo $all_informations->date;
             echo ",";
             if($all_informations->last_modified_qc=='0000-00-00 00:00:00' || $all_informations->last_modified_qc=='11/30/-0001'){echo '';}else{echo $all_informations->last_modified_qc;}
             echo "\n";

        
        
    }
    ?>
