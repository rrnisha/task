<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Create New Employee</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <?php if (validation_errors()) { ?>
            <h4 class="alert_error"><?php echo validation_errors(); ?></h4>
            <?php } ?>
			<?php if ($msg == 'createEmpSameLoginError') { ?> 
                <h4 class="alert_error">Error during Employee Creation - Login Already Available </h4> 
            <?php } ?>

            <br></br>            
            <form name="frmCreateEmployee" id="frmCreateEmployee" method="post" action="<?php echo base_url(); ?>index.php/employee/create">    
                <table>
                    <fieldset>
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $values['title']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>First Name</label>
                        <input type="text" name="firstname" value="<?php echo $values['firstname']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Last Name</label>
                        <input type="text" name="lastname" value="<?php echo $values['lastname']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Login Name</label>
                        <input type="text" name="login" value="<?php echo $values['login']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Login Password</label>
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
                        <label>Roles</label>
                        <?php echo form_dropdown('role_id', $roles, $values['role_id']); ?>
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