<?php

header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=spreadsheet.csv");

$header_array = array("Style No", "Season", "Department", "Style Description", "Supplier Name", "Dev Send Date", "Dev Receive Date", "Dev Pass/Fail By", "First Fit Send Date", "First Fit Receive Date", "First Fit Comment", "Second Fit Send Date", "Second Fit Receive Date", "Second Fit Comment", "Third Fit Send Date", "Third Fit Receive Date", "Third Fit Comment", "Fourth Fit Send Date", "Fourth Fit Receive Date", "Fourth Fit Comment", "Fifth Fit Send Date", "Fifth Fit Receive Date", "Fifth Fit Comment", "Fit Sample Pass/Fail", "Fit Sample Approved By", "PP Send Date", "PP Receive Date", "PP Pass/Fail By", "Wearer Send Date", "Wearer Receive Date", "Wearer Pass/Fail By", "Gold Sl Send Date", "Gold Sl Receive Date", "Gold Sl Pass/Fail BY", "Lab Test Report", "Pattern Block", "File Hand Over Date", "File Receive Date", "PP Meeting Date", "Wash Approval Date", "Wash Comment", "Inline Date", "Final Inspection Date", "Orders Comment", "Technician", "Remark", "Files", "Data Entry Date of Technician", "Data Entry Date of QC", "Last Modified by Technician", "Last Modified by QC");
foreach ($header_array as $value) {
    echo "$value,";  // separator
}
echo "\n";

if (isset($all_informations)) {
    for ($i = $max_supply_info->id_supply_info; $i >= 1; $i--) {
        if (!empty($all_informations[$i][0]->id_supply_info)) {
            echo $all_informations[$i][0]->style_no;
            echo ",";
            echo $all_informations[$i][0]->supply_name;
            echo ",";
            echo $all_informations[$i][0]->department_name;
            echo ",";
            echo $all_informations[$i][0]->style_description;
            echo ",";
            echo $all_informations[$i][0]->supplyer_name;
            echo ",";

            for ($o = 0; $o < $max_supply_fit_register->id_supply_fit_register; $o++) {
                if (!empty($all_informations[$i][1][$o])) {
                    if ($all_informations[$i][1][$o]->id_supply_fit_name == 6) {
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$o]->date_send)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$o]->date_send));
                        }
                    }
                }
            }
            echo ",";
            for ($o = 0; $o < $max_supply_fit_register->id_supply_fit_register; $o++) {
                if (!empty($all_informations[$i][1][$o])) {
                    if ($all_informations[$i][1][$o]->id_supply_fit_name == 6) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$o]->date_receive));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$o]->date_receive)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$o]->date_receive));
                        }
                    }
                }
            }
            echo ",";
            for ($o = 0; $o < $max_supply_fit_register->id_supply_fit_register; $o++) {
                if (!empty($all_informations[$i][1][$o])) {
                    if ($all_informations[$i][1][$o]->id_supply_fit_name == 6) {
                        $approved = $all_informations[$i][1][$o]->sample_approved;
                        if ($approved == 1) {
                            echo 'Pass By United Kingdom';
                        }if ($approved == 2) {
                            echo 'Pass By Bangladesh';
                        }if ($approved == 3) {
                            echo 'Fail By United Kingdom';
                        }if ($approved == 4) {
                            echo 'Fail By Bangladesh';
                        }
                    }
                }
            }
            echo ",";
            for ($j = 0; $j < $max_supply_fit_register->id_supply_fit_register; $j++) {
                if (!empty($all_informations[$i][1][$j])) {
                    if ($all_informations[$i][1][$j]->id_supply_fit_name == 1) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$j]->date_send));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$j]->date_send)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$j]->date_send));
                        }
                    }
                }
            }
            echo ",";
            for ($j = 0; $j < $max_supply_fit_register->id_supply_fit_register; $j++) {
                if (!empty($all_informations[$i][1][$j])) {
                    if ($all_informations[$i][1][$j]->id_supply_fit_name == 1) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$j]->date_receive));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$j]->date_receive)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$j]->date_receive));
                        }
                    }
                }
            }
            echo ",";
            for ($j = 0; $j < $max_supply_fit_register->id_supply_fit_register; $j++) {
                if (!empty($all_informations[$i][1][$j])) {
                    if ($all_informations[$i][1][$j]->id_supply_fit_name == 1) {
                        echo $all_informations[$i][1][$j]->fit_comment;
                    }
                }
            }
            echo ",";
            for ($k = 0; $k < $max_supply_fit_register->id_supply_fit_register; $k++) {
                if (!empty($all_informations[$i][1][$k])) {
                    if ($all_informations[$i][1][$k]->id_supply_fit_name == 2) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$k]->date_send));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$k]->date_send)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$k]->date_send));
                        }
                    }
                }
            }
            echo ",";
            for ($k = 0; $k < $max_supply_fit_register->id_supply_fit_register; $k++) {
                if (!empty($all_informations[$i][1][$k])) {
                    if ($all_informations[$i][1][$k]->id_supply_fit_name == 2) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$k]->date_receive));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$k]->date_receive)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$k]->date_receive));
                        }
                    }
                }
            }
            echo ",";
            for ($k = 0; $k < $max_supply_fit_register->id_supply_fit_register; $k++) {
                if (!empty($all_informations[$i][1][$k])) {
                    if ($all_informations[$i][1][$k]->id_supply_fit_name == 2) {
                        echo $all_informations[$i][1][$k]->fit_comment;
                    }
                }
            }
            echo ",";
            for ($l = 0; $l < $max_supply_fit_register->id_supply_fit_register; $l++) {
                if (!empty($all_informations[$i][1][$l])) {
                    if ($all_informations[$i][1][$l]->id_supply_fit_name == 3) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$l]->date_send));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$l]->date_send)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$l]->date_send));
                        }
                    }
                }
            }
            echo ",";
            for ($l = 0; $l < $max_supply_fit_register->id_supply_fit_register; $l++) {
                if (!empty($all_informations[$i][1][$l])) {
                    if ($all_informations[$i][1][$l]->id_supply_fit_name == 3) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$l]->date_receive));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$l]->date_receive)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$l]->date_receive));
                        }
                    }
                }
            }
            echo ",";
            for ($l = 0; $l < $max_supply_fit_register->id_supply_fit_register; $l++) {
                if (!empty($all_informations[$i][1][$l])) {
                    if ($all_informations[$i][1][$l]->id_supply_fit_name == 3) {
                        echo $all_informations[$i][1][$l]->fit_comment;
                    }
                }
            }
            echo ",";
            for ($m = 0; $m < $max_supply_fit_register->id_supply_fit_register; $m++) {
                if (!empty($all_informations[$i][1][$m])) {
                    if ($all_informations[$i][1][$m]->id_supply_fit_name == 4) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$m]->date_send));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$m]->date_send)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$m]->date_send));
                        }
                    }
                }
            }
            echo ",";
            for ($m = 0; $m < $max_supply_fit_register->id_supply_fit_register; $m++) {
                if (!empty($all_informations[$i][1][$m])) {
                    if ($all_informations[$i][1][$m]->id_supply_fit_name == 4) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$m]->date_receive));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$m]->date_receive)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$m]->date_receive));
                        }
                    }
                }
            }
            echo ",";
            for ($m = 0; $m < $max_supply_fit_register->id_supply_fit_register; $m++) {
                if (!empty($all_informations[$i][1][$m])) {
                    if ($all_informations[$i][1][$m]->id_supply_fit_name == 4) {
                        echo $all_informations[$i][1][$m]->fit_comment;
                    }
                }
            }
            echo ",";
            for ($n = 0; $n < $max_supply_fit_register->id_supply_fit_register; $n++) {
                if (!empty($all_informations[$i][1][$n])) {
                    if ($all_informations[$i][1][$n]->id_supply_fit_name == 5) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$n]->date_send));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$n]->date_send)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$n]->date_send));
                        }
                    }
                }
            }
            echo ",";
            for ($n = 0; $n < $max_supply_fit_register->id_supply_fit_register; $n++) {
                if (!empty($all_informations[$i][1][$n])) {
                    if ($all_informations[$i][1][$n]->id_supply_fit_name == 5) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$n]->date_receive));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$n]->date_receive)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$n]->date_receive));
                        }
                    }
                }
            }
            echo ",";
            for ($n = 0; $n < $max_supply_fit_register->id_supply_fit_register; $n++) {
                if (!empty($all_informations[$i][1][$n])) {
                    if ($all_informations[$i][1][$n]->id_supply_fit_name == 5) {
                        echo $all_informations[$i][1][$n]->fit_comment;
                    }
                }
            }
            echo ",";
            if ($all_informations[$i][0]->sample_result == 1) {
                echo 'Pass';
            }if ($all_informations[$i][0]->sample_result == 2) {
                echo 'Fail';
            }
            echo ",";
            if ($all_informations[$i][0]->approved_by == 1) {
                echo 'United Kingdom';
            }if ($all_informations[$i][0]->approved_by == 2) {
                echo 'Bangladesh';
            }
            echo ",";
            for ($p = 0; $p < $max_supply_fit_register->id_supply_fit_register; $p++) {
                if (!empty($all_informations[$i][1][$p])) {
                    if ($all_informations[$i][1][$p]->id_supply_fit_name == 7) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$p]->date_send));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$p]->date_send)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$p]->date_send));
                        }
                    }
                }
            }
            echo ",";
            for ($p = 0; $p < $max_supply_fit_register->id_supply_fit_register; $p++) {
                if (!empty($all_informations[$i][1][$p])) {
                    if ($all_informations[$i][1][$p]->id_supply_fit_name == 7) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$p]->date_receive));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$p]->date_receive)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$p]->date_receive));
                        }
                    }
                }
            }
            echo ",";
            for ($p = 0; $p < $max_supply_fit_register->id_supply_fit_register; $p++) {
                if (!empty($all_informations[$i][1][$p])) {
                    if ($all_informations[$i][1][$p]->id_supply_fit_name == 7) {
                        $approved = $all_informations[$i][1][$p]->sample_approved;
                        if ($approved == 1) {
                            echo 'Pass By United Kingdom';
                        }if ($approved == 2) {
                            echo 'Pass By Bangladesh';
                        }if ($approved == 3) {
                            echo 'Fail By United Kingdom';
                        }if ($approved == 4) {
                            echo 'Fail By Bangladesh';
                        }
                    }
                }
            }
            echo ",";
            for ($r = 0; $r < $max_supply_fit_register->id_supply_fit_register; $r++) {
                if (!empty($all_informations[$i][1][$r])) {
                    if ($all_informations[$i][1][$r]->id_supply_fit_name == 8) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$r]->date_send));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$r]->date_send)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$r]->date_send));
                        }
                    }
                }
            }
            echo ",";
            for ($r = 0; $r < $max_supply_fit_register->id_supply_fit_register; $r++) {
                if (!empty($all_informations[$i][1][$r])) {
                    if ($all_informations[$i][1][$r]->id_supply_fit_name == 8) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$r]->date_receive));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$r]->date_receive)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$r]->date_receive));
                        }
                    }
                }
            }
            echo ",";
            for ($r = 0; $r < $max_supply_fit_register->id_supply_fit_register; $r++) {
                if (!empty($all_informations[$i][1][$r])) {
                    if ($all_informations[$i][1][$r]->id_supply_fit_name == 8) {
                        $approved = $all_informations[$i][1][$r]->sample_approved;
                        if ($approved == 1) {
                            echo 'Pass By United Kingdom';
                        }if ($approved == 2) {
                            echo 'Pass By Bangladesh';
                        }if ($approved == 3) {
                            echo 'Fail By United Kingdom';
                        }if ($approved == 4) {
                            echo 'Fail By Bangladesh';
                        }
                    }
                }
            }
            echo ",";
            for ($w = 0; $w < $max_supply_fit_register->id_supply_fit_register; $w++) {
                if (!empty($all_informations[$i][1][$w])) {
                    if ($all_informations[$i][1][$w]->id_supply_fit_name == 9) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$w]->date_send));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$w]->date_send)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$w]->date_send));
                        }
                    }
                }
            }
            echo ",";
            for ($w = 0; $w <= $max_supply_fit_register->id_supply_fit_register; $w++) {
                if (!empty($all_informations[$i][1][$w])) {
                    if ($all_informations[$i][1][$w]->id_supply_fit_name == 9) {
//                                                            echo date('d/m/Y', strtotime($all_informations[$i][1][$w]->date_receive));
                        if (date('d/m/Y', strtotime($all_informations[$i][1][$w]->date_receive)) == '01/01/1970') {
                            echo '';
                        } else {
                            echo date('d/m/Y', strtotime($all_informations[$i][1][$w]->date_receive));
                        }
                    }
                }
            }
            echo ",";
            for ($w = 0; $w <= $max_supply_fit_register->id_supply_fit_register; $w++) {
                if (!empty($all_informations[$i][1][$w])) {
                    if ($all_informations[$i][1][$w]->id_supply_fit_name == 9) {
                        $approved = $all_informations[$i][1][$w]->sample_approved;
                        if ($approved == 1) {
                            echo 'Pass By UK';
                        }if ($approved == 2) {
                            echo 'Pass By BD';
                        }if ($approved == 3) {
                            echo 'Fail By UK';
                        }if ($approved == 4) {
                            echo 'Fail By BD';
                        }
                    }
                }
            }
            echo ",";
            if ($all_informations[$i][0]->lab_test_report == 1) {
                echo 'Pass';
            }if ($all_informations[$i][0]->lab_test_report == 2) {
                echo 'Fail';
            }
            echo ",";

            if ($all_informations[$i][0]->pattern_block == 1) {
                echo 'United Kingdom';
            }if ($all_informations[$i][0]->pattern_block == 2) {
                echo 'Bangladesh';
            }
            echo ",";

            if (date('d/m/Y', strtotime($all_informations[$i][0]->file_hand_over_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations[$i][0]->file_hand_over_date)) == '01/01/1970') {
                echo '';
            } else {
                echo date('d/m/Y', strtotime($all_informations[$i][0]->file_hand_over_date));
            }
            echo ",";

            if (date('d/m/Y', strtotime($all_informations[$i][0]->file_receive_date)) == '01/01/1970') {
                echo '';
            } else {
                echo date('d/m/Y', strtotime($all_informations[$i][0]->file_receive_date));
            }
            echo ",";

            if (date('d/m/Y', strtotime($all_informations[$i][0]->pp_meeting_date)) == '01/01/1970') {
                echo '';
            } else {
                echo date('d/m/Y', strtotime($all_informations[$i][0]->pp_meeting_date));
            }
            echo ",";

            if (date('d/m/Y', strtotime($all_informations[$i][0]->wash_approval_date)) == '01/01/1970') {
                echo '';
            } else {
                echo date('d/m/Y', strtotime($all_informations[$i][0]->wash_approval_date));
            }
            echo ",";
            echo $all_informations[$i][0]->wash_comment;
            echo ",";

            if (date('d/m/Y', strtotime($all_informations[$i][0]->inline_date)) == '01/01/1970') {
                echo '';
            } else {
                echo date('d/m/Y', strtotime($all_informations[$i][0]->inline_date));
            }
            echo ",";

            if (date('d/m/Y', strtotime($all_informations[$i][0]->final_inspection_date)) == '01/01/1970') {
                echo '';
            } else {
                echo date('d/m/Y', strtotime($all_informations[$i][0]->final_inspection_date));
            }
            echo ",";
            echo $all_informations[$i][0]->orders_comment;
            echo ",";
            echo $all_informations[$i][0]->username;
            echo ",";

            echo $all_informations[$i][0]->remark;
            echo ",";
            $files = explode(',', $all_informations[$i][0]->file_upload);
            foreach ($files as $file) {
                '<a href="'. base_url('file_upload/' . $file . '').'"  id="download"  target="blank">'.$file.'</a>';
            }
            echo ",";
            echo $all_informations[$i][0]->date;
            echo ",";
            echo $all_informations[$i][0]->date_qc;
            echo ",";
            if ($all_informations[$i][0]->last_modified == '0000-00-00 00:00:00' || $all_informations[$i][0]->last_modified == '11/30/-0001') {
                echo '';
            } else {
                echo $all_informations[$i][0]->last_modified;
            }
            echo ",";
            if ($all_informations[$i][0]->last_modified_qc == '0000-00-00 00:00:00' || $all_informations[$i][0]->last_modified_qc == '11/30/-0001') {
                echo '';
            } else {
                echo $all_informations[$i][0]->last_modified_qc;
            }
            echo "\n";
        }
    }
}
?>