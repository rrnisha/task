<script type="text/javascript">
$(document).ready(function() {
	$('#tan').keyup(function(){
	    this.value = this.value.toUpperCase();
	});
	$("#doi" ).datepicker({ dateFormat: "dd-mm-yy", changeMonth: true, changeYear: true});
});
</script>
<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Edit Companyloyee</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
            <form name="frmEditCompanyloyee" id="frmEditCompanyloyee" method="post" action="<?php echo base_url(); ?>index.php/company/edit">    
                    <input type="hidden" name="id" value="<?php echo $company->id; ?>"/>
                    <fieldset>
                        <label class="required" <?php if (form_error('name') !='') echo 'style="color:red;font-style:normal"'; ?> >Name</label>
                        <input type="text" name="name" value="<?php echo $company->name; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('disp_name') !='') echo 'style="color:red;font-style:normal"'; ?> >On Screen Name</label>
                        <input type="text" name="disp_name" value="<?php echo $company->disp_name; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('tan') !='') echo 'style="color:red;font-style:normal"'; ?> >TAN</label>
                        <input type="text" name="tan" value="<?php echo $company->tan; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Phone</label>
                        <input type="text" name="phone" value="<?php echo $company->phone; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Email Id</label>
                        <input type="text" name="email" value="<?php echo $company->email; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Address</label>            
                        <textarea name="address" cols="40"><?php echo $company->address; ?></textarea>
                    </fieldset>        
	                <fieldset>
	                	<label class="required" <?php if (form_error('doi') !='') echo 'style="color:red;font-style:normal"'; ?>>DOI</label>
	                    <input id="doi" name="doi" value="<?php echo $company->doi; ?>" autocomplete="off" style="width:17%;float:left;"/>
	                </fieldset>                    
	                <footer>
                        <div class="submit_link">
                            <input type="submit" name="edit" value="Ok"/>
                        	<a href="<?php echo base_url(); ?>index.php/company/lists"><input type="button" name="No" value="Back"/></a>
                        </div>
                    </footer>                    
            </form>    
        </div>
    </article>
</section>