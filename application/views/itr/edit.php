<script type="text/javascript">
$(document).ready(function() {
	$('#pan').keyup(function(){
	    this.value = this.value.toUpperCase();
	});
	$("#dob" ).datepicker({ dateFormat: "dd-mm-yy", changeMonth: true, changeYear: true});
});
</script>
<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Edit ITR</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
            <form name="frmEditITR" id="frmEditITR" method="post" action="<?php echo base_url(); ?>index.php/itr/edit/">    
                <fieldset>
                    <input type="hidden" name="id" value="<?php echo $itr->itr_id; ?>"/>
                </fieldset>
                <fieldset>
                    <label>Client Name</label>
                    <label style="width:400px"><?php echo $itr->client_name; ?></label>
                </fieldset>                
                <fieldset>
                    <label class="required" <?php if (form_error('assessment_year') !='') echo 'style="color:red;font-style:normal"'; ?>>Assessment Year</label>
                    <!-- <input type="text" name="assessment_year" value="<?php echo $itr->assessment_year; ?>"/> -->
                    <?php echo form_dropdown('assessment_year', $assessment_year, $itr->assessment_year); ?>
                </fieldset>                
                <fieldset>
                    <label>Uploading Date</label>
                    <label><?php echo $itr->date_of_uploading; ?></label>
                    <!-- <input type="text" name="date_of_uploading" value="<?php echo $itr->date_of_uploading; ?>"/> -->
                </fieldset>                
                <fieldset>
                    <label>Mailing Date</label>
                    <label><?php echo $itr->date_of_mailing; ?></label>
                    <!-- <input type="text" name="date_of_mailing" value="<?php echo $itr->date_of_mailing; ?>"/> -->
                </fieldset>                
                <fieldset>
                    <label>Billing Date</label>
                    <label><?php echo $itr->date_of_billing; ?></label>
                    <!-- <input type="text" name="date_of_billing" value="<?php echo $itr->date_of_billing; ?>"/> -->
                </fieldset>                
                <footer>
                    <div class="submit_link">    
                        <input type="submit" name="edit" value="Ok"/>
                        <a href="<?php echo base_url(); ?>index.php/itr/lists"><input type="button" name="No" value="Back"/></a>
                    </div>
                </footer>                     
            </form>    
        </div>
    </article>
</section>             
