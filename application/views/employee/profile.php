<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Employee Profile</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
            <div id="list">
                <?php if ($msg == 'empPasswordChangedSuccess') { ?> 
                    <h4 class="alert_success">Employee Password Changed Successful</h4> 
                <?php } ?>
                <br></br>
            </div>
            <form name="frmProfileEmployee" id="frmProfileEmployee" method="post" action="<?php echo base_url(); ?>index.php/employee/change_password/<?php echo $employee->id; ?>">    
                <input type="hidden" name="emp_id" value="<?php echo $employee->id; ?>"/>
                <fieldset>
                    <label  class="required">Title</label>
                    <label><?php echo $employee->title; ?></label>
                </fieldset>
                <fieldset>
                    <label  class="required">Name</label>
                    <label><?php echo $employee->full_name; ?></label>
                </fieldset>
                <fieldset>
                    <label  class="required">Login Name</label>
                    <label><?php echo $employee->login; ?></label>
                </fieldset>
                <fieldset>
                    <label  class="required">Login Password</label>
                    <input style="padding-left: 10px; width:300px" type="password" name="password" value="<?php echo $employee->password; ?>"/>
                    <input type="submit" name="edit" value="Change"/>
                </fieldset>
                <fieldset>
                    <label>Phone</label>
                    <label><?php echo $employee->phone; ?></label>
                </fieldset>
                <fieldset>
                    <label>Email Id</label>
                    <label><?php echo $employee->email; ?></label>
                </fieldset>
                <fieldset>
                    <label>Address</label>            
                    <label><?php echo $employee->address; ?></label>
                </fieldset>        
                <!--                    <footer>
                                        <div class="submit_link">    
                                            <input type="submit" name="edit" value="Change" class="alt_btn"/>
                                        </div>
                                    </footer>                    -->
            </form>    
        </div>
    </article>
</section>