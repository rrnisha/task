<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Add New Task Type</h3></header>
        <div id="content" >
            <div class="module_content">
                <!-- TODO : To Fix Error Link -->
                <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
                <form name="frmCreateTaskType" id="frmCreateTaskType" method="post" action="<?php echo base_url(); ?>index.php/task_type/create">    
                    <fieldset>
                        <label>Type Name</label>
                        <input type="text" name="type" value="<?php echo $values['type']; ?>"/>
                    </fieldset>
                    <fieldset>
                        <label>Type UI Description</label>
                        <input type="text" name="type_ui_desc" value="<?php echo $values['type_ui_desc']; ?>"/>
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