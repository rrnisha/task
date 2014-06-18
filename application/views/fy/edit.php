<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Edit Financial Year</h3></header>
        <label style="color:red;font-style:normal"><?php echo validation_errors(); ?></label>
        <div class="module_content">
            <form name="frmEditYear" id="frmEditYear" method="post" action="<?php echo base_url(); ?>index.php/fy/edit">    
                    <input type="hidden" name="id" value="<?php echo $fy->id; ?>"/>
                    <fieldset>
                        <label class="required" <?php if (form_error('from_year') !='') echo 'style="color:red;font-style:normal"'; ?> >From Year</label>
                        <input type="text" name="from_year" value="<?php echo $fy->from_year; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('to_year') !='') echo 'style="color:red;font-style:normal"'; ?> >To Year</label>
                        <input type="text" name="to_year" value="<?php echo $fy->to_year; ?>"/>
                    </fieldset>
                    <footer>
                        <div class="submit_link">
                            <input type="submit" name="edit" value="Ok"/>
                        	<a href="<?php echo base_url(); ?>index.php/fy/lists"><input type="button" name="No" value="Back"/></a>
                        </div>
                    </footer>                    
            </form>    
        </div>
    </article>
</section>