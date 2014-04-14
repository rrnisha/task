<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Create New Employee</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <!-- <?php if (validation_errors()) { ?>
            <h4 class="alert_error"><?php echo validation_errors(); ?></h4>
            <?php } ?>
			<?php if ($msg == 'createEmpSameLoginError') { ?> 
                <h4 class="alert_error">Error during Employee Creation - Login Already Available </h4> 
            <?php } ?> -->

            <br></br>            
            <form name="frmCreateEmployee" id="frmCreateEmployee" method="post" action="<?php echo base_url(); ?>index.php/employee/create">    
                <table>
                    <fieldset>
                        <label class="required" <?php if (form_error('title') !='') echo 'style="color:red;font-style:normal"'; ?> >Title</label>
                        <input type="radio" name="title" value="Mr" <?php if ($values['title'] == 'Mr') { ?>checked<?php } ?>/> Mr
                        <input type="radio" name="title" value="Ms" <?php if ($values['title'] == 'Mrs') { ?>checked<?php } ?>/> Ms
                        <input type="radio" name="title" value="Mrs" <?php if ($values['title'] == 'Mfrs') { ?>checked<?php } ?>/> Mrs
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('fullname') !='') echo 'style="color:red;font-style:normal"'; ?> >Name</label>
                        <input type="text" name="fullname" value="<?php echo $values['fullname']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('login') !='') echo 'style="color:red;font-style:normal"'; ?> >Login Name</label>
                        <input type="text" name="login" value="<?php echo $values['login']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('password') !='') echo 'style="color:red;font-style:normal"'; ?> >Login Password</label>
                        <input type="password" name="password" value="<?php echo $values['password']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Phone</label>
                        <input type="text" name="phone" value="<?php echo $values['phone']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Email Id</label>
                        <input type="text" name="email" value="<?php echo $values['email']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Address</label>            
                        <textarea name="address" cols="40"><?php echo $values['address']; ?></textarea>
                    </fieldset>        
                    <fieldset>
                        <label class="required" <?php if (form_error('role_id') !='') echo 'style="color:red;font-style:normal"'; ?> >Roles</label>
                        <?php echo form_dropdown('role_id', $roles, $values['role_id']); ?>
                    </fieldset>
                	<fieldset>
                    	<label class="required" <?php if (form_error('type') !='') echo 'style="color:red;font-style:normal"'; ?> >Onwership</label>
                    	<?php foreach ($types as $type) { ?>
                    		<?php 
                    			echo form_checkbox($type); 
                    			echo '<span>'.' '.$type['ui_desc'].' '.'</span>';
                    		?>
                    	<?php } ?>
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