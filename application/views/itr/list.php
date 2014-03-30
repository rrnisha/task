<script>
    function submitRemark() {
        var itrId = document.getElementById("selected_itr_id").value;
        document.getElementById("sr_itr_id").value = itrId;
        $.post("<?php echo base_url(); ?>index.php/itr/add_remark/", $("#frmSubmitRemark").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $('#addRemarkStatus').show();
                showRemark();
            }
        });
    }
    function showRemark() {
        var itrId = document.getElementById("selected_itr_id").value;
        document.getElementById("sr_itr_id").value = itrId;
        $.get("<?php echo base_url(); ?>index.php/itr/list_remarks/" + itrId).done(function(data) {
            $('#show_itr_remarks').html(data);
        });
    }
    function captureItrId(itrId) {
        document.getElementById("selected_itr_id").value = itrId;
        showRemark();
    }
</script>
<section id="main" class="column">

    <article class="module width_3_quarter">
        <header>
            <h3 class="tabs_involved">ITRs</h3>
        </header>

        <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->

        <div style="clear:both;" id="list">
            <div class="tab_container">
                <div class="itr_list">
                    <div id="tab1" class="tab_content">
                        <div>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>    
                        <input type="hidden" name="doc_id" id="selected_itr_id" value="<?php
                        if (count($itrs) < 1) {
                            echo '';
                        } else {
                            echo $itrs[0]->itr_id;
                        }
                        ?>"/>                        
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
                            <th rowspan="1"></th>  
                            <th rowspan="1">Id</th>
                            <!--<th rowspan="1">Task</th>-->
                            <th rowspan="1">Client</th> 
                            <th rowspan="1">Asst Year</th> 
                            <th rowspan="1">Filed By</th> 
                            <th rowspan="1">Upload Date</th> 
                            <th rowspan="1">Mailing Date</th>
                            <th rowspan="1">Bill Date</th> 
                            <th rowspan="1">Ack Date</th>
                            <th rowspan="1">Amt</th>
                            <th  rowspan="1">Action</th>
                            </thead>
                            <tbody>                            
                                <?php
                                $i = 1;
                                foreach ($itrs as $itr) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="radio" name="select" value="selected" <?php if ($i == 1) { ?>checked<?php } ?> onclick="captureItrId(<?php echo $itr->itr_id; ?>)"/>
                                        </td>                                          
                                        <td><?php echo $itr->itr_id; ?></td>
                                        <!--<td><?php echo $itr->task_id; ?></td>-->
                                        <td><?php echo $itr->client_name; ?></td>
                                        <td><?php echo $itr->assessment_year; ?></td>
                                        <td><?php echo $itr->filed_by_name; ?></td>                                        
                                        <td><?php echo $itr->date_of_uploading; ?></td>
                                        <td><?php echo $itr->date_of_mailing; ?></td>
                                        <td><?php echo $itr->date_of_billing; ?></td>
                                        <td><?php echo $itr->date_of_acknowledgement; ?></td>
                                        <td><?php echo $itr->bill_amount; ?></td>
                                        <td><a href="#<?php echo $itr->itr_id; ?>" class="acknowledgement">Ack</a></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
    </article>

    <article class="module width_quarter">
        <header>
            <h3 class="tabs_involved">ITR Remarks</h3>
        </header>
        <div class="tab_container">
            <div class="itr_remarks_list">
                <div id="show_itr_remarks">
                    <?php
                    if (count($itrs) < 1) {
                        ?>    
                        <div class="message">
                            <p>No Remarks added</p>
                        </div>
                        <?php
                    } else {
                        if ($itrs[0]->remarks == '') {
                            ?>    
                            <div class="message">
                                <p>No Remarks added</p>
                            </div>
                            <?php
                        }

                        $remarkslist = explode('<br>', $itrs[0]->remarks);
                        $cnt = count($remarkslist);
                        for ($index = $cnt - 1; $index >= 0; $index--) {
                            ?>
                            <div class="message"><p><?php echo $remarkslist[$index]; ?></p></div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <input type="hidden" name="sr_itr_id" id="sr_itr_id" value="<?php
            if (count($itrs) < 1) {
                echo '';
            } else {
                echo $itrs[0]->itr_id;
            }
            ?>"/>            
<!--            <footer>
                <form class="post_message" name="frmSubmitRemark" id="frmSubmitRemark" onsubmit="return false;">

                    <input type="text" name="remarks" value="Remarks" onfocus="if (!this._haschanged) {
            this.value = ''
        }
        ;
        this._haschanged = true;">
                    <input type="submit" class="btn_post_message" value="" onclick="submitRemark();"></input>
                </form>
            </footer>               -->
        </div>        
    </article>    
</section>