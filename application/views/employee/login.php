<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Login</h3></header>
        <div><!--
            <?php
            if ($msg == 'login_continue') {
                ?>
                <h4 class="alert_error">Please login to continue.</h4>
                <?php
            } else ?>
            --><?php if ($msg == 'loggedOut') {
                ?>
                <h4 class="alert_sucess">You are successfully logged out.</h4>
                <?php
            }
            ?>
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
            <?php echo form_open('employee/login'); ?>
            <!--<fieldset style="width:48%; float:left; margin-right: 1%;">-->
            <fieldset>
                <label>Username</label>
                <input type="text" name="username" value=""/>
            </fieldset>
            <!--<fieldset style="width:48%; float:left; margin-right: 1%;">-->
            <fieldset>
                <label>Password</label>
                <input type="password" name="password" value=""/>
            </fieldset>
            <div class="clear"></div>
            <footer>
                <div class="submit_link">    
                    <input type="submit" name="login" value="Login"/>
                </div>
            </footer>    
            <?php echo form_close(); ?>
        </div>
    </article>
</section>