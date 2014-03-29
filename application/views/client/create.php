<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Create New Client</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
            <form name="frmCreateClient" id="frmCreateClient" method="post" action="<?php echo base_url(); ?>index.php/client/create">    
                    <fieldset>
                        <label>Type</label>
                        <input type="radio" name="client_type" value="individual" <?php if ($values['client_type'] == 'individual') { ?>checked<?php } ?>/> Individual
                        <input type="radio" name="client_type" value="company" <?php if ($values['client_type'] == 'company') { ?>checked<?php } ?>/> Company
                    </fieldset>
                    <fieldset>
                        <label>Title</label>
                        <input type="radio" name="title" value="Mr" <?php if ($values['title'] == 'Mr') { ?>checked<?php } ?>/> Mr
                        <input type="radio" name="title" value="Mrs" <?php if ($values['title'] == 'Mrs') { ?>checked<?php } ?>/> Mrs
                        <input type="radio" name="title" value="Mfrs" <?php if ($values['title'] == 'Mfrs') { ?>checked<?php } ?>/> M/s
                    </fieldset>
                    <fieldset>
                        <label>Name</label>
                        <input type="text" name="fullname" value="<?php echo $values['fullname']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>PAN</label>
                        <input type="text" name="pan_tan" value="<?php echo $values['pan_tan']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Address</label>            
                        <textarea name="address" cols="40" value="<?php echo $values['address']; ?>"></textarea>
                    </fieldset>        
                    <fieldset>
                        <label>Phone</label>                        
                    	<label style="width:60px">Mobile</label>
                        <input type="text" style="width:180px; float:left" name="phone_mobile" value="<?php echo $values['phone_mobile']; ?>"/>
                        <label style="float:absolute; width:60px">Office</label>
                        <input type="text" style="width:180px" name="phone_office" value="<?php echo $values['phone_office']; ?>"/>
                    </fieldset>        
                    <fieldset>
                        <label>Email Id</label>
                        <input type="text" name="email" value="<?php echo $values['email']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Genius Id</label>
                        <input type="text" name="genius_id" value="<?php echo $values['genius_id']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>File Id</label>
                        <input type="text" name="file_id" value="<?php echo $values['file_id']; ?>"/>
                    </fieldset>
<!--                    <fieldset>
                        <label>ITR Password</label>
                        <input type="password" name="itr_password" value="<?php echo $values['itr_password']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Bank Name</label>
                        <input type="text" name="bank_name" value="<?php echo $values['bank_name']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Bank Account Number</label>
                        <input type="text" name="bank_acc_no" value="<?php echo $values['bank_acc_no']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Bank IFSC Code</label>
                        <input type="text" name="bank_ifsc_code" value="<?php echo $values['bank_ifsc_code']; ?>"/>
                    </fieldset>-->
                    <footer>
                        <div class="submit_link">    
                            <input type="submit" name="create" value="Create"/>
<!--                            <input type="submit" name="create" value="Create" class="alt_btn"/>-->
                        </div>
                    </footer>                     
                
            </form>    
        </div>
    </article>
</section>             