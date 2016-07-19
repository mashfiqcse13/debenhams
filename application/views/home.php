<?php
header( "Content-Type: application/vnd.ms-excel" );
header( "Content-disposition: attachment; filename=spreadsheet.xls" );
?>
                        <table class="table table-bordered table-striped" id="example1" border="1">
                            <thead>
                                <tr>
                                    <th>Style No</th>
                                    <th>Session</th>
                                    <th>Department:</th>
                                    <th>Style Description</th>
                                    <th>Supplier Name:</th>
                                    <th>Type of Fit:</th>
                                    <th>Fit Send Date:</th>
                                    <th>Fit Receive Date:</th>
                                    <th>Dev Send Date</th>
                                    <th>Dev Receive Date</th>
                                    <th>PP Send Date</th>
                                    <th>PP Receive Date</th>
                                    <th>Wearer Send Date</th>
                                    <th>Wearer Receive Date</th>
                                    <th>Gold sl Send Date</th>
                                    <th>Gold sl Receive Date</th>
                                    <th>Sample pass /fail</th>
                                    <th>Tested by</th>
                                    <th>Technician</th>
                                    <th>Data Entry Date</th>
                                    <th>Actions</th>
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
                                                <td><?php echo $all_informations[$i][0]->supply_name; ?></td>
                                                <td><?php echo $all_informations[$i][0]->department_name; ?></td>
                                                <td><?php echo $all_informations[$i][0]->style_description; ?></td>
                                                <td><?php echo $all_informations[$i][0]->supplyer_name; ?></td>
                                                <?php
                                                if (!empty($all_informations[$i][1][$i])) {
                                                    ?>
                                                    <td><?php echo $all_informations[$i][1][$i]['supply_fit_name']; ?></td>
                                                    <?php
                                                    if ($all_informations[$i][1][$i]['id_supply_fit_name'] <= 5) {
                                                        ?>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_send']; ?></td>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_receive']; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }if ($all_informations[$i][1][$i]['id_supply_fit_name'] == 6) {
                                                        ?>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_send']; ?></td>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_receive']; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }if ($all_informations[$i][1][$i]['id_supply_fit_name'] == 7) {
                                                        ?>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_send']; ?></td>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_receive']; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }if ($all_informations[$i][1][$i]['id_supply_fit_name'] == 8) {
                                                        ?>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_send']; ?></td>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_receive']; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }if ($all_informations[$i][1][$i]['id_supply_fit_name'] == 9) {
                                                        ?>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_send']; ?></td>
                                                        <td><?php echo $all_informations[$i][1][$i]['date_receive']; ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }
                                                }if (empty($all_informations[$i][1][$i])) {
                                                    ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <?php
                                                }
                                                ?>   
                                                <td><?php
                                                    if ($all_informations[$i][0]->sample_result == 1) {
                                                        echo 'Pass';
                                                    } else {
                                                        echo 'Fail';
                                                    }
                                                    ?></td>
                                                <td><?php
                                                    if ($all_informations[$i][0]->approved_by == 1) {
                                                        echo 'United Kingdom';
                                                    } else {
                                                        echo 'Bangladesh';
                                                    }
                                                    ?></td>
                                                <td><?php echo $all_informations[$i][0]->username; ?></td>
                                                <td><?php echo $all_informations[$i][0]->date_created; ?></td>
                                                <td><a href="<?= site_url('supply_info/index/edit/' . $all_informations[$i][0]->id_supply_info); ?>" type="button" class="btn btn-success" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="<?= site_url('search/search_delete/' . $all_informations[$i][0]->id_supply_info); ?>" onclick="return check();"type="button" class="btn btn-danger" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

