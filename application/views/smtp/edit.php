<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Edit Task</h3></header>
        <div class="module_content">
            <!-- TODO : To Fix Error Link -->
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
            <form name="frmEditTask" id="frmEditTask" method="post" action="<?php echo base_url(); ?>index.php/smtp/edit">    
                <input type="hidden" name="id" value="<?php echo $smtp->id; ?>"></input>
                <fieldset>
                    <label>SMTP Server</label>
                    <input type="text" name="title" value="<?php echo $smtp->server; ?>"/>
                </fieldset>
                <fieldset>
                    <label>SMTP Server Port</label>
                    <input type="text" name="title" value="<?php echo $smtp->port; ?>"/>
                </fieldset>
                <fieldset>
                    <label>SMTP User Name</label>
                    <input type="text" name="title" value="<?php echo $smtp->username; ?>"/>
                </fieldset>
                <fieldset>
                    <label>SMTP Password</label>
                    <input type="password" name="title" value="<?php echo $smtp->password; ?>"/>
                </fieldset>
                <div class="clear"></div>
                <footer>
                    <div class="submit_link">    
                        <input type="submit" name="edit" value="Edit"/>
                    </div>
                </footer>
            </form>    
        </div>
    </article>
</section>