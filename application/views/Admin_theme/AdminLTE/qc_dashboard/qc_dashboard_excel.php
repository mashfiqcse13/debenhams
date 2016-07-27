<?php
header( "Content-Type: application/vnd.ms-excel" );
header( "Content-disposition: attachment; filename=spreadsheet.xls" );
?>
<table class="table table-bordered table-striped table-condensed search_table" id="example1" border="1">
                            <thead>
                                <tr>
                                    <th class="nowrap">Style No</th>
                                    <th class="nowrap">File Receive Date</th>
                                    <th>P.P Meeting Date:</th>
                                    <th>In-Line Date</th>
                                    <th>Final Inspection Date:</th>
                                    <th>Orders Comment:</th>
                                    <th>Wash Approval Date:</th>
                                    <th>Wash Comment:</th>
                                    <th>Data Entry Date:</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($get_all_qc_info as $all_informations) {
                                    ?>
                                    <tr>
                                        <td class="nowrap"><?php echo $all_informations->style_no; ?></td>
                                        <td class="nowrap"><?php echo date('d/m/Y', strtotime($all_informations->file_receive_date)); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($all_informations->pp_meeting_date)); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($all_informations->inline_date)); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($all_informations->final_inspection_date)); ?></td>
                                        <td><?php echo $all_informations->orders_comment; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($all_informations->wash_approval_date)); ?></td>
                                        <td><?php echo $all_informations->wash_comment; ?></td>
                                        <td><?php echo $all_informations->date_created; ?></td>
                                        <td><a href="<?= site_url('qc_dashboard/reduce/' . $all_informations->id_qc_info); ?>" type="button" class="btn btn-success" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            </a>
                                            <a href="<?= site_url('qc_dashboard/delete/' . $all_informations->id_qc_info); ?>" onclick="return check();"type="button" class="btn btn-danger" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
