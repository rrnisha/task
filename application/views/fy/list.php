<script type="text/javascript">
    $(document).ready(function() {
        $('.deleteYear').click(function() {
            var yearId = $(this).attr('href').substr(1);
            $('#del_year_id').val(yearId);
            $.blockUI({message: $('#delete_year')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
    });

    function closeBox() {
        $.unblockUI();
        return false;
    }    
    function deleteYear() {
        $.post("<?php echo base_url(); ?>index.php/fy/delete/", $("#frmDeleteYear").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/fy/lists/?msg=delYearSuccess";
            }
        });
    }

</script>
<section id="main" class="column">

    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Financial Year/Assessment Year</h3>
        </header>

        <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
        <div id="success">
            <?php if ($msg == 'finyearaddedsuccess') { ?> 
                <h4 class="alert_success">Fin Year created Successfully</h4> 
            <?php } elseif ($msg == 'delYearSuccess') { ?> 
                <h4 class="alert_success">Fin Year delete Successful</h4> 
            <?php } elseif ($msg == 'editYearSuccess') { ?> 
                <h4 class="alert_success">Fin Year edit Successful</h4> 
            <?php } ?>           
        </div>
        <br>
        
            <div id="delete_year" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Delete Task Year</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmDeleteYear" id="frmDeleteYear" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr>
                                <td>
                                    <input type="hidden" name="year_id" id="del_year_id" value=""/>
                                    <input type="button" name="submit_deleteYear" value="Yes" onclick="deleteYear();"/>
                                    <input type="button" name="no_deleteYear" value="No" onclick="return closeBox();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>
                      
        <div style="clear:both;" id="list">
            <div class="tab_container">
                <div class="itr_list">
                    <div id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
<!--                            <th>Id</th>-->
							<tr>
								<th>Current FY</th>
	                            <th>Financial Year</th>
	                            <th>From Year</th> 
	                            <th>To Year</th> 
	                            <th>From Date</th>
	                            <th>To Date</th>
	                            <th>Assessment Year</th>
	                            <th  rowspan="1" colspan="2">Action</th>	                            
	                        </tr> 
                            </thead>
                            <tbody>                            
                                <?php
                                foreach ($years as $year) {
                                    ?>
                                    <tr>
                                    	<!--<td><?php echo $year->id; ?></td>-->
                                    	<td><input type="checkbox" disabled name="curr_fy" <?php if ($year->is_curr_year == 'Y') { ?>checked<?php } ?>/></td>
                                    	<td><?php echo $year->fin_year; ?></td>
                                        <td><?php echo $year->from_year; ?></td>
                                        <td><?php echo $year->to_year; ?></td> 
                                        <td><?php echo $year->from_date; ?></td>
                                        <td><?php echo $year->to_date; ?></td>
                                        <td><?php echo $year->assessment_year; ?></td>
                                        <td><a href="<?php echo base_url(); ?>index.php/fy/get/<?php echo $year->id; ?>">Edit</a></td>
                                        <td><a href="#<?php echo $year->id; ?>" class="deleteYear">Delete</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
    </article>
</section>