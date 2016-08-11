<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=spreadsheet.xls");
?>

<table class="table table-bordered table-striped table-condensed search_table" id="example1" border="1">
    <thead>
        <tr>
            <th>Style No</th>
            <th>Season</th>
            <!--<th style="display:none;">supply id</th>-->
            <th>Department:</th>
            <th>Style Description</th>
            <th>Supplier Name:</th>
            <th>Dev Send Date</th>
            <th>Dev Receive Date</th>
            <th>Dev Pass/Fail By</th>
            <th>First Fit Send Date:</th>
            <th>First Fit Receive Date:</th>
            <th>Second Fit Send Date:</th>
            <th>Second Fit Receive Date:</th>
            <th>Third Fit Send Date:</th>
            <th>Third Fit Receive Date:</th>
            <th>Forth Fit Send Date:</th>
            <th>Forth Fit Receive Date:</th>
            <th>Fifth Fit Send Date:</th>
            <th>Fifth Fit Receive Date:</th>
            <th>Fit Sample Pass/Fail</th>
            <th>Fit Sample Approved By</th>
            <th>PP Send Date</th>
            <th>PP Receive Date</th>
            <th>PP Pass/Fail By</th>
            <th>Wearer Send Date</th>
            <th>Wearer Receive Date</th>
            <th>Wearer Pass/Fail By</th>
            <th>Gold Sl Send Date</th>
            <th>Gold Sl Receive Date</th>
            <th>Gold Sl Pass/Fail BY</th>
            <th>Lab Test Report</th>
            <th>Pattern Block</th>
            <th>File Receive Date</th>
            <th>PP Meeting Date</th>                                
            <th>Wash Pass/Fail Date</th>
            <th>Wash Comment</th>
            <th>Inline Date</th>
            <th>Final Inspection Date</th>
            <th>Orders Comment</th>

            <th>Technician</th>

            <th>Remark</th>

            <th>Data Entry Date</th>
            <th>Last Modified by Technician</th>
            <th>Last Modified by QC</th>
<!--<th>Actions</th>-->
        </tr>
    </thead>
    <tbody>
        <?php
//                                echo print_r($max_supply_info->id_supply_info);
        if (isset($all_informations)) {
            for ($i = $max_supply_info->id_supply_info; $i >= 1; $i--) {
                if (!empty($all_informations[$i][0]->id_supply_info)) {
                    ?>
                    <tr>
                        <td><?php echo $all_informations[$i][0]->style_no; ?></td>
                        <td><?php echo $all_informations[$i][0]->supply_name; ?> </td>
            <!--                        <td style="display:none;"><?php echo $all_informations[$i][0]->id_supply_info;
                    ?></td>-->
                        <td><?php echo $all_informations[$i][0]->department_name; ?></td>
                        <td><?php echo $all_informations[$i][0]->style_description; ?></td>
                        <td><?php echo $all_informations[$i][0]->supplyer_name; ?></td>

                        <td>

                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td> 
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td> 

                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date"><?php
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
                            ?>
                        </td>
                        <?php
                        ?>  
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <?php ?>  
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <?php
                        ?>  
                        <td class="fit_date">

                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <?php ?>  
                        <td class="fit_date">

                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($all_informations[$i][0]->sample_result == 1) {
                                echo 'Pass';
                            }if ($all_informations[$i][0]->sample_result == 2) {
                                echo 'Fail';
                            }
                            ?>
                        </td>
                        <td><?php
                            if ($all_informations[$i][0]->approved_by == 1) {
                                echo 'United Kingdom';
                            }if ($all_informations[$i][0]->approved_by == 2) {
                                echo 'Bangladesh';
                            }
                            ?>
                        </td>

                        <td class="fit_date">

                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>

                        <?php ?>  
                        <td class="fit_date">

                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <?php
                        ?>   
                        <td class="fit_date">

                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <td class="fit_date">
                            <?php
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
                            ?>
                        </td>
                        <?php ?>   



                        <td>
                            <?php
                            if ($all_informations[$i][0]->lab_test_report == 1) {
                                echo 'Pass';
                            }if ($all_informations[$i][0]->lab_test_report == 2) {
                                echo 'Fail';
                            }
                            ?>
                        </td>
                        <td><?php
                            if ($all_informations[$i][0]->pattern_block == 1) {
                                echo 'United Kingdom';
                            }if ($all_informations[$i][0]->pattern_block == 2) {
                                echo 'Bangladesh';
                            }
                            ?>
<!--                        </td>
                        <td>
                            <?php
                            if ($all_informations[$i][0]->sample_result == 1) {
                                echo 'Pass';
                            }if ($all_informations[$i][0]->sample_result == 2) {
                                echo 'Fail';
                            }
                            ?>
                        </td>
                        <td><?php
                            if ($all_informations[$i][0]->approved_by == 1) {
                                echo 'United Kingdom';
                            }if ($all_informations[$i][0]->approved_by == 2) {
                                echo 'Bangladesh';
                            }
                            ?>
                        </td>-->
                        <td><?php
                            if (date('d/m/Y', strtotime($all_informations[$i][0]->file_receive_date)) == '30/11/-0001' or '01/01/1970') {
                                echo '';
                            } else {
                                echo date('d/m/Y', strtotime($all_informations[$i][0]->file_receive_date));
                            }
                            ?></td>
                        <td><?php
                            if (date('d/m/Y', strtotime($all_informations[$i][0]->pp_meeting_date)) == '30/11/-0001' or '01/01/1970') {
                                echo '';
                            } else {
                                echo date('d/m/Y', strtotime($all_informations[$i][0]->pp_meeting_date));
                            }
                            ?></td>
                        <td><?php
                            if (date('d/m/Y', strtotime($all_informations[$i][0]->wash_approval_date)) == '30/11/-0001' or '01/01/1970') {
                                echo '';
                            } else {
                                echo date('d/m/Y', strtotime($all_informations[$i][0]->wash_approval_date));
                            }
                            ?></td>
                        <td><?php echo $all_informations[$i][0]->wash_comment; ?></td>
                        <td><?php
                            if (date('d/m/Y', strtotime($all_informations[$i][0]->inline_date)) == '30/11/-0001' or '01/01/1970') {
                                echo '';
                            } else {
                                echo date('d/m/Y', strtotime($all_informations[$i][0]->inline_date));
                            }
                            ?></td>
                        <td><?php
                            if (date('d/m/Y', strtotime($all_informations[$i][0]->final_inspection_date)) == '30/11/-0001' or '01/01/1970') {
                                echo '';
                            } else {
                                echo date('d/m/Y', strtotime($all_informations[$i][0]->final_inspection_date));
                            }
                            ?></td>
                        <td><?php echo $all_informations[$i][0]->orders_comment; ?></td>



                        <td><?php echo $all_informations[$i][0]->username; ?></td>

                        <td><?php echo $all_informations[$i][0]->remark; ?></td>

                        <td><?php echo $all_informations[$i][0]->date; ?></td>
                        <td><?php echo $all_informations[$i][0]->last_modified; ?></td>
                        <td><?php echo $all_informations[$i][0]->last_modified_qc; ?></td>

                    </tr>
                    <?php
                }
            }
        }
        ?>
    </tbody>
</table>