<?php
header( "Content-Type: application/vnd.ms-excel" );
header( "Content-disposition: attachment; filename=spreadsheet.xls" );
?>
        <table class="table table-bordered table-striped table-condensed search_table" id="example1" border="1">
                            <thead>
                                <tr>
                                    <th class="nowrap">Style No</th>
                                    <th class="nowrap">File Hand Over Date</th>
                                    <th class="nowrap">File Receive Date</th>
                                    <th>P.P Meeting Date</th>
                                    <th>Wash Approval Date</th>
                                    <th>Wash Comment</th>
                                    <th>In-Line Date</th>
                                    <th>Final Inspection Date</th>
                                    <th>Orders Comment</th>                                    
                                    <th>Data Entry Date of QC</th>
                                    <th>Last Modified Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($get_all_qc_info as $all_informations) {
                                    ?>
                                    <tr>
                                        <td class="nowrap"><?php echo $all_informations->style_no; ?></td>
                                         <td class="nowrap"><?php echo (date('d/m/Y', strtotime($all_informations->file_hand_over_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->file_hand_over_date)) == '01/01/1970')? '' : date('d/m/Y', strtotime($all_informations->file_hand_over_date)); ?></td>
                                        <td class="nowrap"><?php echo (date('d/m/Y', strtotime($all_informations->file_receive_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->file_receive_date)) == '01/01/1970')? '' : date('d/m/Y', strtotime($all_informations->file_receive_date)); ?></td>
                                        <td><?php echo (date('d/m/Y', strtotime($all_informations->pp_meeting_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->pp_meeting_date)) == '01/01/1970')? '' : date('d/m/Y', strtotime($all_informations->pp_meeting_date)); ?></td>
                                        <td><?php echo (date('d/m/Y', strtotime($all_informations->wash_approval_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->wash_approval_date)) == '01/01/1970')? '' :date('d/m/Y', strtotime($all_informations->wash_approval_date)); ?></td>
                                        <td><?php echo $all_informations->wash_comment; ?></td>
                                        <td><?php echo (date('d/m/Y', strtotime($all_informations->inline_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->inline_date)) == '01/01/1970')? '' :date('d/m/Y', strtotime($all_informations->inline_date)); ?></td>
                                        <td><?php echo (date('d/m/Y', strtotime($all_informations->final_inspection_date)) == '30/11/-0001' || date('d/m/Y', strtotime($all_informations->final_inspection_date)) == '01/01/1970') ? '' : date('d/m/Y', strtotime($all_informations->final_inspection_date)); ?></td>
                                        <td><?php echo $all_informations->orders_comment; ?></td>
                                        <td><?php echo $all_informations->date; ?></td>
                                        <td><?php if($all_informations->last_modified_qc=='0000-00-00 00:00:00' || $all_informations->last_modified_qc=='11/30/-0001'){echo '';}else{echo $all_informations->last_modified_qc;} ?></td>
                                        
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>