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
        <header><h3>Edit Client</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
            <form name="frmEditClient" id="frmEditClient" method="post" action="<?php echo base_url(); ?>index.php/client/edit/">    
                <fieldset>
                    <input type="hidden" name="id" value="<?php echo $client->id; ?>"/>
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('client_type') !='') echo 'style="color:red;font-style:normal"'; ?>>Type</label>
                    <input type="radio" name="client_type" value="individual" <?php if ($client->client_type == 'individual') { ?>checked<?php } ?>/> Individual
                    <input type="radio" name="client_type" value="company" <?php if ($client->client_type == 'company') { ?>checked<?php } ?>/> Company
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('title') !='') echo 'style="color:red;font-style:normal"'; ?>>Title</label>
                    <input type="radio" name="title" value="Mr" <?php if ($client->title == 'Mr') { ?>checked<?php } ?>/> Mr
                    <input type="radio" name="title" value="Mrs" <?php if ($client->title == 'Mrs') { ?>checked<?php } ?>/> Mrs
                    <input type="radio" name="title" value="Mfrs" <?php if ($client->title == 'Mfrs') { ?>checked<?php } ?>/> M/s
				</fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('full_name') !='') echo 'style="color:red;font-style:normal"'; ?> >Name</label>
                    <input type="text" name="full_name" value="<?php echo $client->full_name; ?>"/>
                </fieldset>
                <fieldset>
                    <label>Address</label>            
                    <textarea name="address" cols="40"><?php echo $client->address; ?></textarea>
                </fieldset>        
                <fieldset>
                    <label class="required" <?php if (form_error('pan') !='') echo 'style="color:red;font-style:normal"'; ?> >PAN</label>
                    <input type="text" name="pan" value="<?php echo $client->pan; ?>"/>
                </fieldset>
                <fieldset>
                	<label>Phone 1</label>                        
                    <label class="required" <?php if (form_error('phone_mobile') !='') echo 'style="color:red;font-style:normal"'; ?> style="width:70px">Mobile</label>
                    <input type="text" style="width:180px; float:left" name="phone_mobile" value="<?php echo $client->phone_mobile; ?>"/>
                    <label style="float:absolute; width:60px">Office</label>
                    <input type="text" style="width:180px" name="phone_office" value="<?php echo $client->phone_office; ?>"/>
                </fieldset>                 
                <fieldset>
                	<label>Phone 2</label>                        
                    <label style="width:70px">Mobile</label>
                    <input type="text" style="width:180px; float:left" name="phone_mobile2" value="<?php echo $client->phone_mobile2; ?>"/>
                    <label style="float:absolute; width:60px">Office</label>
                    <input type="text" style="width:180px" name="phone_office2" value="<?php echo $client->phone_office2; ?>"/>
                </fieldset>                 
                <fieldset>
                    <label class="required_can_null" <?php if (form_error('email') !='') echo 'style="color:red;font-style:normal"'; ?>>Email Id</label>
                    <input type="text" name="email" value="<?php echo $client->email; ?>"/>
                </fieldset>
                <fieldset>
                	<label class="required" <?php if (form_error('dob') !='') echo 'style="color:red;font-style:normal"'; ?>>DOB/DOI</label>
                    <input id="dob" name="dob" value="<?php echo $client->dob; ?>" autocomplete="off" style="width:17%;float:left;"/>
                </fieldset>                
                <fieldset>
                    <label class="required" <?php if (form_error('genius_id') !='') echo 'style="color:red;font-style:normal"'; ?> >Genius Id</label>
                    <input type="text" name="genius_id" value="<?php echo $client->genius_id; ?>"/>
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('file_id') !='') echo 'style="color:red;font-style:normal"'; ?> >File Id</label>
                    <input type="text" name="file_id" value="<?php echo $client->file_id; ?>"/>
                </fieldset>
                <footer>
                    <div class="submit_link">    
                        <input type="submit" name="edit" value="Ok"/>
                        <a href="<?php echo base_url(); ?>index.php/client/lists"><input type="button" name="No" value="Back"/></a>
                    </div>
                </footer>                     
            </form>    
        </div>
    </article>
</section>             
