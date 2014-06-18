<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Add New Financial/Assessment Year</h3></header>
        <label style="color:red;font-style:normal"><?php echo validation_errors(); ?></label>
        <div id="content" >
            <div class="module_content">
                <!-- TODO : To Fix Error Link -->
                <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
                <form name="frmCreateFY" id="frmCreateFY" method="post" action="<?php echo base_url(); ?>index.php/fy/create">    
                    <fieldset>
                        <label  class="required" <?php if (form_error('from_year') !='') echo 'style="color:red;font-style:normal"'; ?>>From Year</label>
                        <input type="text" name="from_year" value="<?php echo $values['from_year']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label  class="required" <?php if (form_error('to_year') !='') echo 'style="color:red;font-style:normal"'; ?>>To Year</label>
                        <input type="text" name="to_year" value="<?php echo $values['to_year']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Current Financial Year</label>
                        <input type="checkbox" name="curr_fy" <?php if ($values['curr_fy'] == 'Y') { ?>checked<?php } ?>/>
                    </fieldset>
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