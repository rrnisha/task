<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Edit Client</h3></header>
        <div class="module_content">
                <fieldset>
                    <input type="hidden" name="id" value="<?php echo $client->id; ?>"/>
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('client_type') !='') echo 'style="color:red;font-style:normal"'; ?>>Type</label>
                    <label><?php if ($client->client_type == 'individual') { echo "individual"; } else { echo "company"; } ?></label>
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('full_name') !='') echo 'style="color:red;font-style:normal"'; ?> >Name</label>
                    <label><?php echo $client->full_name; ?></label>
                </fieldset>
                <fieldset>
                    <label>Address</label>            
                    <textarea readonly name="address" cols="40"><?php echo $client->address; ?></textarea>
                </fieldset>        
                <fieldset>
                    <label class="required" <?php if (form_error('pan') !='') echo 'style="color:red;font-style:normal"'; ?> >PAN</label>
                    <label><?php echo $client->pan; ?></label>
                </fieldset>
                <fieldset>
                	<label>Phone 1</label>                        
                    <label class="required" <?php if (form_error('phone_mobile') !='') echo 'style="color:red;font-style:normal"'; ?> style="width:70px">Mobile</label>
                    <label><?php echo $client->phone_mobile; ?></label>
                    <label style="float:absolute; width:60px">Office</label>
                    <label><?php echo $client->phone_office; ?></label>
                </fieldset>                 
                <fieldset>
                	<label>Phone 2</label>                        
                    <label style="width:70px">Mobile</label>
                    <label><?php echo $client->phone_mobile2; ?></label>
                    <label style="float:absolute; width:60px">Office</label>
                    <label><?php echo $client->phone_office2; ?></label>
                </fieldset>                 
                <fieldset>
                    <label class="required_can_null" <?php if (form_error('email') !='') echo 'style="color:red;font-style:normal"'; ?>>Email Id</label>
                    <label><?php echo $client->email; ?></label>
                </fieldset>
                <fieldset>
                	<label class="required" <?php if (form_error('dob') !='') echo 'style="color:red;font-style:normal"'; ?>>DOB/DOI</label>
                    <label><?php echo $client->dob; ?></label>
                </fieldset>                
                <fieldset>
                    <label class="required" <?php if (form_error('genius_id') !='') echo 'style="color:red;font-style:normal"'; ?> >Genius Id</label>
                    <label><?php echo $client->genius_id; ?></label>
                </fieldset>
                <fieldset>
                    <label class="required" <?php if (form_error('file_id') !='') echo 'style="color:red;font-style:normal"'; ?> >File Id</label>
                    <label><?php echo $client->file_id; ?></label>
                </fieldset>
                <footer>
                    <div class="submit_link">    
                        <a href="<?php echo base_url(); ?>index.php/client/lists"><input type="button" name="No" value="Back"/></a>
                    </div>
                </footer>                     
        </div>
    </article>
</section>             
