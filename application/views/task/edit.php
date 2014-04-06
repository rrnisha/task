<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.timepicker.js"></script>

<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Edit Task</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
            <form name="frmEditTask" id="frmEditTask" method="post" action="<?php echo base_url(); ?>index.php/task/edit">    
                <input type="hidden" name="id" value="<?php echo $task->id; ?>"></input>
                <fieldset>
                    <label class="required" <?php if (form_error('title') !='') echo 'style="color:red;font-style:normal"'; ?>>Task Description</label>
                    <input type="text" name="title" value="<?php echo $task->title; ?>"/>
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
                    <label>Priority</label>
                    <input type="radio" name="priority" value="high" <?php if ($task->priority == 'high') { ?>checked<?php } ?>/> High
                    <input type="radio" name="priority" value="medium"  <?php if ($task->priority == 'medium') { ?>checked<?php } ?>/> Medium
                    <input type="radio" name="priority" value="low"   <?php if ($task->priority == 'low') { ?>checked<?php } ?>/> Low
                </fieldset>
                <div class="clear"></div>
<!--
                <fieldset>
                    <label>Client</label>
                    <?php echo form_dropdown('client_id', $clients, $task->client_id); ?>
                </fieldset>
                <fieldset>
                    <label>Employee</label>
                    <?php echo form_dropdown('emp_id', $employees, $task->emp_id); ?>
                </fieldset>
                <div class="clear"></div>
                <fieldset>
                    <label>Start Date</label>
                    <p class="datepair" data-language="javascript" style="">
                        <input class="date start" name="date_start" value="<?php echo $task->date_start; ?>" style="width:40%;float:left;"/>
                    </p>    
                </fieldset>
                <fieldset>
                    <label>Due Date</label>
                    <p class="datepair" data-language="javascript" style="">
                        <input class="date end" name="date_end" value="<?php echo $task->date_due; ?>" style="width:40%;float:left;"/>
                    </p>
                </fieldset>
                
-->
<!--                <fieldset style="width:49%; float:left; margin-right: 1%;">
                    <label>Date</label>
                    <p>&nbsp;</p>
                    <p class="datepair" data-language="javascript" style="">
                        <input type="text" class="date start" name="date_start" value="<?php echo $task->date_start; ?>" style="width:40%;float:left;"/>
                    </p>    
                    <p class="datepair" data-language="javascript" style="">
                        <input type="text" class="date end" name="date_end" value="<?php echo $task->date_end; ?>" style="width:40%;float:left;"/>
                    </p>
                </fieldset>-->
                <div class="clear"></div>
                <footer>
                    <div class="submit_link">
                        <input type="submit" name="Yes" value="Ok"/>
                        <a href="<?php echo base_url(); ?>index.php/task/index"><input type="button" name="No" value="Back"/></a>
                   </div>
                </footer>
            </form>    
        </div>
    </article>
</section>