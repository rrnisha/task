<script type="text/javascript" src="<?php echo base_url() ?>assets/js/select2.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.css" />

<script>
	$(document).ready(function() { 
		$("#client_select").select2({});
		$("#start_date" ).datepicker({ dateFormat: "dd-mm-yy" });
		$("#due_date" ).datepicker({ dateFormat: "dd-mm-yy", minDate : 0 }); 
	});
	
</script>
<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Create New Task</h3></header>
        <div class="module_content">
            <form name="frmCreateTask" id="frmCreateTask" method="post" action="<?php echo base_url(); ?>index.php/task/create">    
                <fieldset>
                    <label class="required" <?php if (form_error('title') !='') echo 'style="color:red;font-style:normal"'; ?> >Task Description</label>
                    <input type="text" name="title" value="<?php echo set_value('title'); ?>"/>
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('type') !='') echo 'style="color:red;font-style:normal"'; ?> >Type</label>
                    <?php foreach ($types as $type) { ?>
                    	<?php 
                    		echo form_radio($type); 
                    		echo '<span>'.' '.$type['ui_desc'].' '.'</span>';
                    	?>
                    <?php } ?>
                </fieldset>                
                <fieldset>
                    <label class="required">Priority</label>
                    <input type="radio" name="priority" value="high" <?php if ($values['priority'] == 'high') { ?>checked<?php } ?>/> High
                    <input type="radio" name="priority" value="medium"  <?php if ($values['priority'] == 'medium') { ?>checked<?php } ?>/> Medium
                    <input type="radio" name="priority" value="low"   <?php if ($values['priority'] == 'low') { ?>checked<?php } ?>/> Low
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('client_id') !='') echo 'style="color:red;font-style:normal"'; ?> >Client</label>
                    <?php $js = 'id="client_select"'; echo form_dropdown('client_id', $clients, $values['client_id'], $js); ?>
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('company') !='') echo 'style="color:red;font-style:normal"'; ?>>Company</label>
                   	<?php foreach ($companies as $company) { ?>
                   		<?php 
                   			echo form_radio($company); 
                   			echo ' '.$company['ui_name'].' ';
                   		?>
                   	<?php } ?>
                </fieldset>                
                <fieldset>
                    <label class="required" <?php if (form_error('emp_id') !='') echo 'style="color:red;font-style:normal"'; ?>>Employee</label>
                    <?php echo form_dropdown('emp_id', $employees, $values['emp_id']); ?>
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('date_start') !='') echo 'style="color:red;font-style:normal"'; ?>>Start Date</label>
                    <input id="start_date" name="date_start" value="<?php echo set_value('date_start'); ?>" autocomplete="off" style="width:17%;float:left;"/>
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('date_end') !='') echo 'style="color:red;font-style:normal"'; ?>>Due Date</label>
                    <input id="due_date" name="date_end" value="<?php echo set_value('date_end'); ?>" autocomplete="off" style="width:17%;float:left;"/>
                </fieldset>
                <fieldset>
                    <label>Remarks</label>
                    <textarea name="remarks"><?php echo $values['remarks']; ?></textarea>
                </fieldset>
                <footer>
                    <div class="submit_link">    
                        <input type="submit" name="create" value="Create"/>
                    </div>
                </footer>
            </form>    
        </div>
    </article>
</section>
