<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Register SMTP Server</h3></header>
        <div id="content" >
            <div class="module_content">
                <!-- TODO : To Fix Error Link -->
                <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
                <form name="frmCreateSmtp" id="frmCreateSmtp" method="post" action="<?php echo base_url(); ?>index.php/smtp/create">    
                    <fieldset>
                        <label>Server Server</label>
                        <input type="text" name="server" value="<?php echo $values['server']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Server Port</label>
                        <input type="text" name="port" value="<?php echo $values['port']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Email User Name</label>
                        <input type="text" name="username" value="<?php echo $values['username']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Email Password</label>
                        <input type="text" name="password" value="<?php echo $values['password']; ?>"/>
                    </fieldset>
                    <footer>
                        <div class="submit_link">    
                            <input type="submit" name="create" value="Create"/>
                        </div>
                    </footer>                     

                </form>    
            </div>
    </article>
</section>             