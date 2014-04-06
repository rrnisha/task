<script type="text/javascript">
    $(document).ready(function() {
        $('.deleteType').click(function() {
            var typeId = $(this).attr('href').substr(1);
            $('#del_type_id').val(typeId);
            $.blockUI({message: $('#delete_type')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.activateType').click(function() {
            var typeId = $(this).attr('href').substr(1);
            $('#act_type_id').val(typeId);
            $.blockUI({message: $('#activate_type')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
    });

    function closeBox() {
        $.unblockUI();
        return false;
    }    
    function deleteType() {
        $.post("<?php echo base_url(); ?>index.php/task_type/delete/", $("#frmDeleteType").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task_type/lists/?msg=delTypeSuccess";
            }
        });
    }
    function activateType() {
        $.post("<?php echo base_url(); ?>index.php/task_type/activate/", $("#frmActivateType").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task_type/lists/?msg=activateTypeSuccess";
            }
        });
    }
</script>
<section id="main" class="column">

    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Task Types</h3>
        </header>
        <div id="success">
            <?php if ($msg == 'delTypeSuccess') { ?> 
                <h4 class="alert_success">Task Type delete Successful</h4> 
            <?php } elseif ($msg == 'createTypeSuccess') { ?> 
                <h4 class="alert_success">Task Type created Successfully</h4> 
            <?php } elseif ($msg == 'activateTypeSuccess') { ?> 
                <h4 class="alert_success">Task Type activation Successful</h4> 
            <?php } elseif ($msg == 'editTypeSuccess') { ?> 
                <h4 class="alert_success">Task Type edit Successful</h4> 
            <?php } ?>                            
        </div>
        <br>  

            <div id="delete_type" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Delete Task Type</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmDeleteType" id="frmDeleteType" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr>
                                <td>
                                    <input type="hidden" name="type_id" id="del_type_id" value=""/>
                                    <input type="button" name="submit_deleteType" value="Yes" onclick="deleteType();"/>
                                    <input type="button" name="no_deleteType" value="No" onclick="return closeBox();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>     

            <div id="activate_type" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Activate Task Type</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmActivateType" id="frmActivateType" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr>
                                <td>
                                    <input type="hidden" name="type_id" id="act_type_id" value=""/>
                                    <input type="button" name="submit_activateType" value="Yes" onclick="activateType();"/>
                                    <input type="button" name="no_activateType" value="No" onclick="return closeBox();"/>
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
							<tr>
								<th>ID</th>
	                            <th>Type</th>
	                            <th>Type UI Desc</th> 
	                            <th  rowspan="1" colspan="2">Action</th>
	                        </tr> 
                            </thead>
                            <tbody>                            
                                <?php
                                foreach ($types as $type) {
                                    ?>
                                    <tr>
                                    	<td><?php echo $type->id; ?></td>
                                    	<td><?php echo $type->type; ?></td>
                                        <td><?php echo $type->type_ui_desc; ?></td>
                                        <td><a href="<?php echo base_url(); ?>index.php/task_type/get/<?php echo $type->id; ?>">Edit</a></td>
                                        <?php if ($type->status == 'active') { ?>
                                            <td><a href="#<?php echo $type->id; ?>" class="deleteType">Delete</a></td>
                                        <?php } else { ?>
                                            <td><a href="#<?php echo $type->id; ?>" class="activateType">Activate</a></td>
                                        <?php } ?>
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