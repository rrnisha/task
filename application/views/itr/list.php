<script>
	$(function() {
	    $("#filter_client_search").autocomplete({
	        source: "<?php echo base_url(); ?>index.php/task/get_client",
	        minLength: 1,
	        select: function(event, ui) {
	            $('#filter_client_id').val(ui.item.id)
	        }
	    });
	});
	
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
    <article class="module width_full">
	    <div id="filterlink">
			<header>
		    	<h3 class="tabs_involved">Filters</h3>
		    </header>
	    </div>
		<div id="filters">
		    <div class="module_content" >
				<form id="frmFilterClient" method="post" action="<?php echo base_url(); ?>index.php/itr/lists/filter">
			    	<fieldset>
			    		<label>By Client</label>
			    		<input type="text" id="filter_client_search" name="filter_client_search"  value="<?php echo $filter_client_search; ?>">
						<input type="hidden" name="filter_client_id" id="filter_client_id" value="<?php echo $filter_client_id; ?>"/>
			    	</fieldset>

                    <fieldset>
                        <label>Assessment Year</label>
                        <?php $js = 'id="fys"'; echo form_dropdown('fy', $fys, $values['fy'], $js); ?>
                        <input type="submit" name="filter_submit" id="filter_submit" value="Filter"/>
                        <a href="<?php echo base_url(); ?>index.php/itr/lists">Reset Filter</a>
                    </fieldset>                     
		        </form>
		    </div>
	    </div>
	</article>
    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">ITRs</h3>
        </header>

       <div style="clear:both;" id="list">
            <?php if ($msg == 'clientNotFound') { ?> 
                <h4 class="alert_error">Client Not Found</h4> 
            <?php } ?>
            
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
                            <th rowspan="1">Posting Date</th>
                            <th rowspan="1">Bill Date</th> 
<!--                             <th rowspan="1">Ack Date</th> -->
                            <?php if ($_SESSION['emp_role_id']==2) { ?>
                            	<th rowspan="1">Amt</th>
                            <?php } ?>
                            <th rowspan="1" colspan="2">Action</th>
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
                                        <!--<td><  ?php echo $itr->date_of_acknowledgement; ?></td>-->
                                        <?php if ($_SESSION['emp_role_id']==2) { ?>
                                        	<td><?php echo $itr->bill_amount; ?></td>
                                        <?php } ?>

                                        <td><a href="<?php echo base_url(); ?>index.php/itr/get/<?php echo $itr->itr_id; ?>/edit">Edit</a></td>
                                        <!-- <td><a href="#<?php echo $itr->itr_id; ?>" class="reverseITR">Reverse</a></td> -->
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
    <div class="clear"></div>
    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">ITR Remarks</h3>
        </header>
        <div class="tab_container">
            <div class="itr_remarks_list">
                <div id="show_itr_remarks">
                    <?php
                    if (count($itrs) < 1) {
                        ?>    
                        <div class="itr_message">
                            <p>No Remarks added</p>
                        </div>
                        <?php
                    } else {
                        if ($itrs[0]->remarks == '') {
                            ?>    
                            <div class="itr_message">
                                <p>No Remarks added</p>
                            </div>
                            <?php
                        }

                        $remarkslist = explode('<br>', $itrs[0]->remarks);
                        $cnt = count($remarkslist);
                        for ($index = $cnt - 1; $index >= 0; $index--) {
                            ?>
                            <div class="itr_message"><p><?php echo $remarkslist[$index]; ?></p></div>
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