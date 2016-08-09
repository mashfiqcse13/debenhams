<?php
//header( "Content-Type: application/vnd.ms-excel" );
//header( "Content-disposition: attachment; filename=spreadsheet.xls" );
?>
                         <table class="table table-bordered table-striped table-condensed search_table" id="example1" border="1">
                            <thead>
                                <tr>
                                    <th class="nowrap">Style No</th>
                                    <th style="display:none;"></th>
                                    <th class="nowrap">File Receive Date</th>
                                    <th>P.P Meeting Date:</th>
                                    <th>Wash Approval Date:</th>
                                    <th>Wash Comment:</th>
                                    <th>In-Line Date</th>
                                    <th>Final Inspection Date:</th>
                                    <th>Orders Comment:</th>                                    
                                    <th>Data Entry Date:</th>
                                    <th>Last Modified Date:</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($get_all_qc_info as $all_informations) {
                                    ?>
                                    <tr>
                                        <td class="nowrap"><?php echo $all_informations->style_no; ?></td>
                                        <td style="display:none;"><?php echo $all_informations->id_qc_info; ?></td>
                                        <td class="nowrap"><?php if( $all_informations->file_receive_date=='01/01/1970' ){
                                            echo '';
                                            
                                        }else{
                                            echo date('d/m/Y', strtotime($all_informations->file_receive_date)); 
                                            
                                        }?></td>
                                        <td><?php if( date('d/m/Y', strtotime($all_informations->pp_meeting_date))=='01/01/1970'){
                                            echo '';
                                            
                                        }else{
                                            echo date('d/m/Y', strtotime($all_informations->pp_meeting_date)); 
                                            
                                        }?></td>
                                        <td><?php if( date('d/m/Y', strtotime($all_informations->wash_approval_date))=='01/01/1970'){
                                            echo '';
                                            
                                        }else{
                                            echo date('d/m/Y', strtotime($all_informations->wash_approval_date)); 
                                            
                                        }?></td>
                                        <td><?php if( date('d/m/Y', strtotime($all_informations->wash_comment))=='01/01/1970'){
                                            echo '';
                                            
                                        }else{
                                            echo $all_informations->wash_comment; 
                                            
                                            }?></td>
                                        <td><?php if( date('d/m/Y', strtotime($all_informations->inline_date))=='01/01/1970'){
                                            echo '';
                                            
                                        }else{
                                            echo date('d/m/Y', strtotime($all_informations->inline_date)); 
                                            
                                        }?></td>
                                        <td><?php if( date('d/m/Y', strtotime($all_informations->final_inspection_date))=='01/01/1970'){
                                            echo '';
                                            
                                        }else{
                                            echo date('d/m/Y', strtotime($all_informations->final_inspection_date)); 
                                            
                                        }?></td>
                                        <td><?php if( date('d/m/Y', strtotime($all_informations->orders_comment))=='01/01/1970'){
                                            echo '';
                                            
                                        }else{
                                            echo $all_informations->orders_comment; 
                                            
                                        }?></td>
                                        <td><?php if( date('d/m/Y', strtotime($all_informations->date_created))=='01/01/1970'){
                                            echo '';
                                            
                                        }else{
                                            echo $all_informations->date_created; 
                                            
                                        }?></td>
                                        <td><?php if( date('d/m/Y', strtotime($all_informations->last_modified_qc))=='01/01/1970'){
                                            echo '';
                                            
                                        }else{
                                            echo $all_informations->last_modified_qc; 
                                            
                                        }?></td>
                                        
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>