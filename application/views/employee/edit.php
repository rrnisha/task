<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Edit Employee</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
            <form name="frmEditEmployee" id="frmEditEmployee" method="post" action="<?php echo base_url(); ?>index.php/employee/edit">    
                    <input type="hidden" name="id" value="<?php echo $employee->id; ?>"/>
                    <fieldset>
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $employee->title; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>First Name</label>
                        <input type="text" name="first_name" value="<?php echo $employee->first_name; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="<?php echo $employee->last_name; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Login Name</label>
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
                        <label>Roles</label>
                        <?php echo form_dropdown('role_id', $roles, $employee->role_id); ?>
                    </fieldset>
                    <footer>
                        <div class="submit_link">    
                            <input type="submit" name="edit" value="Edit"/>
                        </div>
                    </footer>                    
            </form>    
        </div>
    </article>
</section>