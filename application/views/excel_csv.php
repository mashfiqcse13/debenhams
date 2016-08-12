<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=spreadsheet.csv");

$header_array = array("Style No", "Season", "supply id", "Department:", "Style Description", "Supplier Name:", "Dev Send Date", "Dev Receive Date", "First Fit Send Date:", "First Fit Receive Date:", "Second Fit Send Date:", "Second Fit Receive Date:", "Third Fit Send Date:", "Third Fit Receive Date:", "Forth Fit Send Date:", "Forth Fit Receive Date:", "Fifth Fit Send Date:", "Fifth Fit Receive Date:", "PP Send Date", "PP Receive Date", "Wearer Send Date", "Wearer Receive Date", "Gold Sl Send Date", "Gold Sl Receive Date", "Lab Test Report", "Pattern Block", "Fit Sample Pass/Fail", "Fit Sample Approved By", "File Receive Date", "PP Meeting Date", "Wash Approval Date", "Wash Comment", "Inline Date", "Final Inspection Date", "Orders Comment", "Technician", "Remark", "Data Entry Date", "Last Modified by Technician", "Last Modified by QC", "Actions");
foreach ($header_array as $value) {
    echo "$value,";
}
echo "\n";
if (isset($all_informations)) {
    for ($i = $max_supply_info->id_supply_info; $i >= 1; $i--) {
        if (!empty($all_informations[$i][0]->id_supply_info)) {
            echo $all_informations[$i][0]->style_no . ","
            . $all_informations[$i][0]->supply_name . ","
            . $all_informations[$i][0]->id_supply_info . ","
            . $all_informations[$i][0]->department_name . ","
            . $all_informations[$i][0]->style_description . ","
            . $all_informations[$i][0]->supplyer_name . ",";
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
                if (date('d/m/Y', strtotime($all_informations[$i][0]->file_receive_date)) == '30/11/-0001' or '01/01/1970') {
                    echo '';
                } else {
                    echo date('d/m/Y', strtotime($all_informations[$i][0]->file_receive_date));
                }
            echo ",";
                if (date('d/m/Y', strtotime($all_informations[$i][0]->pp_meeting_date)) == '30/11/-0001' or '01/01/1970') {
                    echo '';
                } else {
                    echo date('d/m/Y', strtotime($all_informations[$i][0]->pp_meeting_date));
                }
            echo ",";
                if (date('d/m/Y', strtotime($all_informations[$i][0]->wash_approval_date)) == '30/11/-0001' or '01/01/1970') {
                    echo '';
                } else {
                    echo date('d/m/Y', strtotime($all_informations[$i][0]->wash_approval_date));
                }
            echo ",";
            echo $all_informations[$i][0]->wash_comment; 
            echo ",";
                if (date('d/m/Y', strtotime($all_informations[$i][0]->inline_date)) == '30/11/-0001' or '01/01/1970') {
                    echo '';
                } else {
                    echo date('d/m/Y', strtotime($all_informations[$i][0]->inline_date));
                }
            echo ",";
                if (date('d/m/Y', strtotime($all_informations[$i][0]->final_inspection_date)) == '30/11/-0001' or '01/01/1970') {
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
            echo $all_informations[$i][0]->date; 
            echo ",";
            echo $all_informations[$i][0]->last_modified; 
            echo ",";
            echo $all_informations[$i][0]->last_modified_qc; 
            echo "\n";
           
        }
    }
}