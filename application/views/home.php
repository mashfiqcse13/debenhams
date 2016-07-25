<?php
header( "Content-Type: application/vnd.ms-excel" );
header( "Content-disposition: attachment; filename=spreadsheet.xls" );
?>
                        <table class="table table-bordered table-striped table-condensed search_table" id="example1" border="1">
                            <thead>
                                <tr>
                                    <th>Style No</th>
                                    <th>Session</th>
                                    <th style="display:none;">supply id</th>
                                    <th>Department:</th>
                                    <th>Style Description</th>
                                    <th>Supplier Name:</th>
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
                                    <th>Dev Send Date</th>
                                    <th>Dev Receive Date</th>
                                    <th>PP Send Date</th>
                                    <th>PP Receive Date</th>
                                    <th>Wearer Send Date</th>
                                    <th>Wearer Receive Date</th>
                                    <th>Gold sl Send Date</th>
                                    <th>Gold sl Receive Date</th>
                                    <th>File Receive Date</th>
                                    <th>PP Meeting Date</th>
                                    <th>Inline Date</th>
                                    <th>Final Inspection Date</th>
                                    <th>Sample pass /fail</th>
                                    <th>Tested by</th>
                                    <th>Technician</th>
                                    <th>Data Entry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
//                                echo print_r($max_supply_info->id_supply_info);
                                if (isset($all_informations)) {
                                    for ($i = 1; $i <= $max_supply_info->id_supply_info; $i++) {
                                        if (!empty($all_informations[$i][0]->id_supply_info)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $all_informations[$i][0]->style_no; ?></td>
                                                <td><?php echo $all_informations[$i][0]->supply_name;?> </td>
                                                <td style="display:none;"><?php echo $all_informations[$i][0]->id_supply_info; 
                                                ?></td>
                                                <td><?php echo $all_informations[$i][0]->department_name; ?></td>
                                                <td><?php echo $all_informations[$i][0]->style_description; ?></td>
                                                <td><?php echo $all_informations[$i][0]->supplyer_name; ?></td>
                                                <?php
                                                ?>
                                                <td>
                                                    <?php
                                                    for ($j = 0; $j < $max_supply_fit_register->id_supply_fit_register; $j++) {
                                                        if (!empty($all_informations[$i][1][$j])) {
                                                            if ($all_informations[$i][1][$j]->id_supply_fit_name == 1) {
                                                                echo $all_informations[$i][1][$j]->date_send;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php
                                                    for ($j = 0; $j < $max_supply_fit_register->id_supply_fit_register; $j++) {
                                                        if (!empty($all_informations[$i][1][$j])) {
                                                            if ($all_informations[$i][1][$j]->id_supply_fit_name == 1) {
                                                                echo $all_informations[$i][1][$j]->date_receive;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                ?>  
                                                <td>
                                                    <?php
                                                    for ($k = 0; $k < $max_supply_fit_register->id_supply_fit_register; $k++) {
                                                        if (!empty($all_informations[$i][1][$k])) {
                                                            if ($all_informations[$i][1][$k]->id_supply_fit_name == 2) {
                                                                echo $all_informations[$i][1][$k]->date_send;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    for ($k = 0; $k < $max_supply_fit_register->id_supply_fit_register; $k++) {
                                                        if (!empty($all_informations[$i][1][$k])) {
                                                            if ($all_informations[$i][1][$k]->id_supply_fit_name == 2) {
                                                                echo $all_informations[$i][1][$k]->date_receive;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                ?>  
                                                <td>
                                                    <?php
                                                    for ($l = 0; $l < $max_supply_fit_register->id_supply_fit_register; $l++) {
                                                        if (!empty($all_informations[$i][1][$l])) {
                                                            if ($all_informations[$i][1][$l]->id_supply_fit_name == 3) {
                                                                echo $all_informations[$i][1][$l]->date_send;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    for ($l = 0; $l < $max_supply_fit_register->id_supply_fit_register; $l++) {
                                                        if (!empty($all_informations[$i][1][$l])) {
                                                            if ($all_informations[$i][1][$l]->id_supply_fit_name == 3) {
                                                                echo $all_informations[$i][1][$l]->date_receive;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                ?>  
                                                <td>

                                                    <?php
                                                    for ($m = 0; $m < $max_supply_fit_register->id_supply_fit_register; $m++) {
                                                        if (!empty($all_informations[$i][1][$m])) {
                                                            if ($all_informations[$i][1][$m]->id_supply_fit_name == 4) {
                                                                echo $all_informations[$i][1][$m]->date_send;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    for ($m = 0; $m < $max_supply_fit_register->id_supply_fit_register; $m++) {
                                                        if (!empty($all_informations[$i][1][$m])) {
                                                            if ($all_informations[$i][1][$m]->id_supply_fit_name == 4) {
                                                                echo $all_informations[$i][1][$m]->date_receive;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                ?>  
                                                <td>

                                                    <?php
                                                    for ($n = 0; $n < $max_supply_fit_register->id_supply_fit_register; $n++) {
                                                        if (!empty($all_informations[$i][1][$n])) {
                                                            if ($all_informations[$i][1][$n]->id_supply_fit_name == 5) {
                                                                echo $all_informations[$i][1][$n]->date_send;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    for ($n = 0; $n < $max_supply_fit_register->id_supply_fit_register; $n++) {
                                                        if (!empty($all_informations[$i][1][$n])) {
                                                            if ($all_informations[$i][1][$n]->id_supply_fit_name == 5) {
                                                                echo $all_informations[$i][1][$n]->date_receive;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                ?>  
                                                <td>

                                                    <?php
                                                    for ($o = 0; $o < $max_supply_fit_register->id_supply_fit_register; $o++) {
                                                        if (!empty($all_informations[$i][1][$o])) {
                                                            if ($all_informations[$i][1][$o]->id_supply_fit_name == 6) {
                                                                echo $all_informations[$i][1][$o]->date_send;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    for ($o = 0; $o < $max_supply_fit_register->id_supply_fit_register; $o++) {
                                                        if (!empty($all_informations[$i][1][$o])) {
                                                            if ($all_informations[$i][1][$o]->id_supply_fit_name == 6) {
                                                                echo $all_informations[$i][1][$o]->date_receive;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                ?>  
                                                <td>

                                                    <?php
                                                    for ($p = 0; $p < $max_supply_fit_register->id_supply_fit_register; $p++) {
                                                        if (!empty($all_informations[$i][1][$p])) {
                                                            if ($all_informations[$i][1][$p]->id_supply_fit_name == 7) {
                                                                echo $all_informations[$i][1][$p]->date_send;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    for ($p = 0; $p < $max_supply_fit_register->id_supply_fit_register; $p++) {
                                                        if (!empty($all_informations[$i][1][$p])) {
                                                            if ($all_informations[$i][1][$p]->id_supply_fit_name == 7) {
                                                                echo $all_informations[$i][1][$p]->date_receive;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <?php ?>  
                                                <td>

                                                    <?php
                                                    for ($r = 0; $r < $max_supply_fit_register->id_supply_fit_register; $r++) {
                                                        if (!empty($all_informations[$i][1][$r])) {
                                                            if ($all_informations[$i][1][$r]->id_supply_fit_name == 8) {
                                                                echo $all_informations[$i][1][$r]->date_send;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    for ($r = 0; $r < $max_supply_fit_register->id_supply_fit_register; $r++) {
                                                        if (!empty($all_informations[$i][1][$r])) {
                                                            if ($all_informations[$i][1][$r]->id_supply_fit_name == 8) {
                                                                echo $all_informations[$i][1][$r]->date_receive;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                ?>   
                                                <td>

                                                    <?php
                                                    for ($w = 0; $w < $max_supply_fit_register->id_supply_fit_register; $w++) {
                                                        if (!empty($all_informations[$i][1][$w])) {
                                                            if ($all_informations[$i][1][$w]->id_supply_fit_name == 9) {
                                                                echo $all_informations[$i][1][$w]->date_send;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    for ($w = 0; $w <= $max_supply_fit_register->id_supply_fit_register; $w++) {
                                                        if (!empty($all_informations[$i][1][$w])) {
                                                            if ($all_informations[$i][1][$w]->id_supply_fit_name == 9) {
                                                                echo $all_informations[$i][1][$w]->date_receive;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <?php ?>   
                                                <td>
                                                    <?php
                                                    if ($all_informations[$i][0]->sample_result == 1) {
                                                        echo 'Pass';
                                                    } else {
                                                        echo 'Fail';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $all_informations[$i][0]->file_receive_date; ?></td>
                                                <td><?php echo $all_informations[$i][0]->pp_meeting_date; ?></td>
                                                <td><?php echo $all_informations[$i][0]->inline_date; ?></td>
                                                <td><?php echo $all_informations[$i][0]->final_inspection_date; ?></td>
                                                <td><?php
                                                    if ($all_informations[$i][0]->approved_by == 1) {
                                                        echo 'United Kingdom';
                                                    } else {
                                                        echo 'Bangladesh';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $all_informations[$i][0]->username; ?></td>
                                                <td><?php echo $all_informations[$i][0]->date_created; ?></td>
                                                
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>