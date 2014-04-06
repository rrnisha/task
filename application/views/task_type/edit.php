<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Edit Task Type</h3></header>
        <div class="module_content">
            <form name="frmEditType" id="frmEditType" method="post" action="<?php echo base_url(); ?>index.php/task_type/edit">    
                    <input type="hidden" name="id" value="<?php echo $task_type->id; ?>"/>
                    <fieldset>
                        <label class="required" <?php if (form_error('type') !='') echo 'style="color:red;font-style:normal"'; ?> >Type</label>
                        <input type="text" name="type" value="<?php echo $task_type->type; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label class="required" <?php if (form_error('type_ui_desc') !='') echo 'style="color:red;font-style:normal"'; ?> >Type UI Desc</label>
                        <input type="text" name="type_ui_desc" value="<?php echo $task_type->type_ui_desc; ?>"/>
                    </fieldset>
                    <footer>
                        <div class="submit_link">
                            <input type="submit" name="edit" value="Ok"/>
                        	<a href="<?php echo base_url(); ?>index.php/task_type/lists"><input type="button" name="No" value="Back"/></a>
                        </div>
                    </footer>                    
            </form>    
        </div>
    </article>
</section>