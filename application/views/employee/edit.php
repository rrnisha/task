<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Edit Employee</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
            <form name="frmEditEmployee" id="frmEditEmployee" method="post" action="<?php echo base_url(); ?>index.php/employee/edit">    
                    <input type="hidden" name="id" value="<?php echo $employee->id; ?>"/>
                    <fieldset>
                        <label class="required" <?php if (form_error('title') !='') echo 'style="color:red;font-style:normal"'; ?> >Title</label>
	                    <input type="radio" name="title" value="Mr" <?php if ($employee->title == 'Mr') { ?>checked<?php } ?>/> Mr
	                    <input type="radio" name="title" value="Ms" <?php if ($employee->title == 'Ms') { ?>checked<?php } ?>/> Ms
	                    <input type="radio" name="title" value="Mrs" <?php if ($employee->title == 'Mrs') { ?>checked<?php } ?>/> Mrs
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('title') !='') echo 'style="color:red;font-style:normal"'; ?> >Name</label>
                        <input type="text" name="full_name" value="<?php echo $employee->full_name; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('title') !='') echo 'style="color:red;font-style:normal"'; ?> >Login Name</label>
                        <input type="text" name="login" value="<?php echo $employee->login; ?>"/>
                    </fieldset>
<!--                    <fieldset>-->
<!--                        <label>Login Password</label>-->
<!--                        <input type="text" name="password" value="<?php echo $employee->password; ?>"/>-->
<!--                    </fieldset>-->
                    <fieldset>
                        <label>Phone</label>
                        <input type="text" name="phone" value="<?php echo $employee->phone; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Email Id</label>
                        <input type="text" name="email" value="<?php echo $employee->email; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Address</label>            
                        <textarea name="address" cols="40"><?php echo $employee->address; ?></textarea>
                    </fieldset>        
                    <fieldset>
                        <label class="required" <?php if (form_error('title') !='') echo 'style="color:red;font-style:normal"'; ?> >Roles</label>
                        <?php echo form_dropdown('role_id', $roles, $employee->role_id); ?>
                    </fieldset>
                    <footer>
                        <div class="submit_link">
                            <input type="submit" name="edit" value="Ok"/>
                        	<a href="<?php echo base_url(); ?>index.php/employee/lists"><input type="button" name="No" value="Back"/></a>
                        </div>
                    </footer>                    
            </form>    
        </div>
    </article>
</section>