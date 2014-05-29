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
        <header><h3>Create New Comtany</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <form name="frmCreateComtany" id="frmCreateComtany" method="post" action="<?php echo base_url(); ?>index.php/company/create">    
                <table>
                    <fieldset>
                        <label class="required" <?php if (form_error('name') !='') echo 'style="color:red;font-style:normal"'; ?> >Name</label>
                        <input type="text" name="name" value="<?php echo $values['name']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('disp_name') !='') echo 'style="color:red;font-style:normal"'; ?> >On Screen Name</label>
                        <input type="text" name="disp_name" value="<?php echo $values['disp_name']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('tan') !='') echo 'style="color:red;font-style:normal"'; ?>>TAN</label>
                        <input type="text" id="tan" name="tan" style="width:300px" value="<?php echo set_value('tan'); ?>"/>
                    </fieldset>                    
                    <fieldset>
                        <label class="required" <?php if (form_error('phone') !='') echo 'style="color:red;font-style:normal"'; ?>>Phone</label>
                        <input type="text" name="phone" value="<?php echo $values['phone']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('email') !='') echo 'style="color:red;font-style:normal"'; ?>>Email Id</label>
                        <input type="text" name="email" value="<?php echo $values['email']; ?>"/>
                    </fieldset>
                	<fieldset>
                    	<label class="required" <?php if (form_error('doi') !='') echo 'style="color:red;font-style:normal"'; ?>>DOI</label>
                    	<input id="doi" name="doi" value="<?php echo set_value('doi'); ?>" autocomplete="off" style="width:17%;float:left;"/>
                	</fieldset>
                    <fieldset>
                        <label>Address</label>            
                        <textarea name="address" cols="40"><?php echo $values['address']; ?></textarea>
                    </fieldset>        
                    <footer>
                        <div class="submit_link">    
                            <input type="submit" name="create" value="Create"/>
                        </div>
                    </footer>                    
                </table>
            </form>    
        </div>
    </article>
</section>            