<script type="text/javascript">
    $(document).ready(function() {
        $('.addRemark').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#task_id').val(taskId)
            $.blockUI({message: $('#add_remark')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.listRemarks').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $.get("<?php echo base_url(); ?>index.php/task/list_remarks/" + taskId).done(function(data) {
                $('#remarks_listing').html(data);
                $.blockUI({message: $('#list_remarks')});
            });
        });

        $('.addQuery').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#query_task_id').val(taskId)
            $.blockUI({message: $('#add_query')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.reAssign').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#reassign_task_id').val(taskId)
            $.blockUI({message: $('#re_assign')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.closeTask').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#close_task_id').val(taskId)
            $.blockUI({message: $('#close_task')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.finalizeTask').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#finalize_task_id').val(taskId)
            $.blockUI({message: $('#finalize_task')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.pending').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#pending_task_id').val(taskId)
            $.blockUI({message: $('#pending_task')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
    });
    function closeBox() {
        $.unblockUI();
        return false;
    }
    function addRemark() {
        $.post("<?php echo base_url(); ?>index.php/task/add_remark/", $("#frmAddRemark").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                $('#addRemarkStatus').show();
            }
        });
    }
    function submitRemark() {
        var taskId = document.getElementById("selected_task_id").value;
        document.getElementById("sr_task_id").value = taskId;
        $.post("<?php echo base_url(); ?>index.php/task/add_remark/", $("#frmSubmitRemark").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $('#addRemarkStatus').show();
                showRemark();
            }
        });
    }
    function showRemark() {
        var taskId = document.getElementById("selected_task_id").value;
        document.getElementById("sr_task_id").value = taskId;
        $.get("<?php echo base_url(); ?>index.php/task/list_remarks/" + taskId).done(function(data) {
            $('#show_remarks').html(data);
        });
    }
    function captureTaskId(taskId) {
        document.getElementById("selected_task_id").value = taskId;
        showRemark();
    }
    function addQuery() {
        $.post("<?php echo base_url(); ?>index.php/task/add_query/", $("#frmAddQuery").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/?msg=addQuerySuccess";

            }
        });
    }
    function reAssign() {
        $.post("<?php echo base_url(); ?>index.php/task/re_assign/", $("#frmReAssign").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/?msg=reAssignedSuccess";

            }
        });
    }

    function closeTask() {
        $.post("<?php echo base_url(); ?>index.php/task/close_task/", $("#frmCloseTask").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/?msg=closeTaskSuccess";

            }
        });
    }

    function finalizeTask() {
        $.post("<?php echo base_url(); ?>index.php/task/finalize_task/", $("#frmFinalizeTask").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/closed/?msg=finalizeTaskSuccess";
            }
        });
    }

    function pending() {
        $.post("<?php echo base_url(); ?>index.php/task/pending/", $("#frmPendingTask").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/" + result[2] + "/?msg=pendingTaskSuccess";
            }
        });
    }
</script>
<section id="main" class="column">

    <!-- <h4 class="alert_info">Tasks</h4> -->
    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Client</h3>
        </header>

        <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->

        <div style="clear:both;" id="list">

            <div class="tab_container">
                <div class="client_details_list">
                    <div id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
							<thead>
								<th rowspan="1">File Id</th> 
	                            <th rowspan="1">Name</th>
	                            <th rowspan="1">Contact</th> 
	                            <th rowspan="1">eMail</th> 
	                            <th rowspan="1">PAN/TAN</th> 
	                            <th rowspan="1">Type</th>
	                            <th rowspan="1">Genius Id</th>
                            </thead>
                            <tbody>                            
                                <?php
                                $i = 1;
                                foreach ($clients as $client) {
                                    ?>
                                    <tr>
                                        <td><?php echo $client->file_id; ?></td>
                                        <td><?php echo $client->full_name; ?></td>
                                        <td><?php echo $client->phone_mobile; ?></td> 
                                        <td><?php echo $client->email; ?></td>
                                        <td><?php echo $client->pan; ?></td>
                                        <td><?php echo $client->client_type; ?></td>
                                        <td><?php echo $client->genius_id; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
    </article>

    <div class="clear"></div>

    <article class="module width_3_quarter">
        <header>
            <h3 class="tasks_tabs_involved">Tasks</h3>
            <ul class="tabs">                        
                <li <?php if ($status == 'all') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/client/index/<?php echo $client_id; ?>/all/">All</a></li>
                <li <?php if ($status == 'new') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/client/index/<?php echo $client_id; ?>/new/">New</a></li>
                <li <?php if ($status == 're-assigned') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/client/index/<?php echo $client_id; ?>/re-assigned/">ReAssigned</a></li>
                <li <?php if ($status == 'query') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/client/index/<?php echo $client_id; ?>/query/">Query</a></li>
                <li <?php if ($status == 'pending') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/client/index/<?php echo $client_id; ?>/pending/">Pending</a></li>
                <li <?php if ($status == 'completed') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/client/index/<?php echo $client_id; ?>/completed/">Completed</a></li>
                <li <?php if ($status == 'finalized') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/client/index/<?php echo $client_id; ?>/finalized/">Finalized</a></li> 
            </ul>
        </header>


        <div id="content" >
            <div id="success">
                <?php if ($msg == 'success') { ?> 
                    <h4 class="alert_success">Task created Successfully</h4> 
                <?php } elseif ($msg == 'addQuerySuccess') { ?> 
                    <h4 class="alert_success">Query and task assigned Successfully</h4>
                <?php } elseif ($msg == 'reAssignedSuccess') { ?> 
                    <h4 class="alert_success">Task re-assigned Successfully</h4> 
                <?php } elseif ($msg == 'closeTaskSuccess') { ?> 
                    <h4 class="alert_success">Task Successfully Closed</h4> 
                <?php } elseif ($msg == 'pendingTaskSuccess') { ?> 
                    <h4 class="alert_success">Task Successfully to Pending Status</h4> 
                <?php } elseif ($msg == 'finalizeTaskSuccess') { ?> 
                    <h4 class="alert_success">Task Finalized Successfully</h4> 
                <?php } elseif ($msg == 'clientNotFound') { ?> 
                    <h4 class="alert_warning">Client Not Available</h4> 
                <?php } ?>
                <h4 id="addRemarkStatus" class="alert_success" style="display:none">Remark added Successfully</h4>
            </div>
            <br>
            <div id="add_remark" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Remarks</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmAddRemark" id="frmAddRemark" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="remark" cols="40"></textarea></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="task_id" value=""/>
                                    <input type="button" name="add_remark" value="Remark" onclick="addRemark();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>

            <div id="list_remarks" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Remarks</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div id="remarks_listing" style="clear:both;" style="">

                </div>     
            </div>

            <div id="add_query" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Query</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmAddQuery" id="frmAddQuery" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="query" cols="40"></textarea></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo form_dropdown('emp_id', $employees); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="query_task_id" value=""/>
                                    <input type="button" name="add_query" value="Query" onclick="addQuery();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>

            <div id="re_assign" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">ReAssign Task To</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmReAssign" id="frmReAssign" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="reAssignComment" cols="40">Reassign to</textarea></td>
                            </tr>                            
                            <tr>
                                <td>
                                    <?php echo form_dropdown('emp_id', $employees); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="reassign_task_id" value=""/>
                                    <input type="button" name="submit_reassign" value="ReAssign" onclick="reAssign();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>

            <div id="close_task" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Close Task</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmCloseTask" id="frmCloseTask" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="closeTaskComment" cols="40">Completed</textarea></td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="close_task_id" value=""/>
                                    <input type="button" name="submit_closeTask" value="Close Task" onclick="closeTask();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>            

            <div id="finalize_task" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Finalize Task</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmFinalizeTask" id="frmFinalizeTask" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="finalizeTaskComment" cols="40">Finalized</textarea></td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="finalize_task_id" value=""/>
                                    <input type="button" name="submit_finalizeTask" value="Finalize Task" onclick="finalizeTask();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>

            <div id="pending_task" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Move Task to Pending</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmPendingTask" id="frmPendingTask" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="pendingTaskComment" cols="40">Pending due to</textarea></td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="pending_task_id" value=""/>
                                    <input type="text" name="status_page" id="status_page" value="<?php echo $status ?>"/>
                                    <input type="button" name="submit_pendingTask" value="Pending Task" onclick="pending();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>

            <div class="tab_container">
                <div class="task_list">
                    <div id="tab1" class="tab_content">
                        <div>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                        <!--                        <div class="ui-widget">
                                                    <label for="search">Client: (for testing)</label>
                                                    <input id="client_search" type="text" name="search" value=""/>
                                                    <input type="text" name="client_id" id="client_id" value=""/>
                                                </div>-->
                        <input type="hidden" name="task_id" id="selected_task_id" value="<?php
                        if (count($tasks) < 1) {
                            echo '';
                        } else {
                            echo $tasks[0]->id;
                        }
                        ?>"/>
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
                                <tr>
                                    <th rowspan="1"></th>
                                    <th rowspan="1">ID</th>                                    
                                    <th rowspan="1">Emp</th> 
                                    <th rowspan="1">Task</th>
<!--                                    <th rowspan="1">Client</th>-->
                                    <th rowspan="1">Due Date</th>                                    
                                    <th rowspan="1">Status</th>
                                    <th rowspan="1">Priority</th>
                                    <th rowspan="1">Type</th>                                    
                                    <?php if ($status == 'completed' || $status == 'finalized') { ?> <th  rowspan="1">End Date</th> <?php } ?>
                                    <?php if ($status <> 'finalized') { ?> <th  rowspan="1" colspan="7" align="center">Action</th> <?php } ?>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                $i = 1;
                                foreach ($tasks as $task) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="radio" name="select" value="selected" <?php if ($i == 1) { ?>checked<?php } ?> onclick="captureTaskId(<?php echo $task->id; ?>)"/>
                                        </td>
                                        <td><?php echo $task->id; ?></td>
                                        <td><?php echo $task->emp_name; ?></td>
                                        <td><?php echo $task->title; ?></td>
                                        <!--<td><?php echo $task->client_name; ?></td>-->
                                        <td><?php echo $task->due_date; ?></td>                                        
                                        <td><?php echo $task->status; ?></td>
                                        <td><?php echo $task->priority; ?></td>
                                        <td><?php echo $task->type; ?></td>
                                        <?php if ($_SESSION['emp_id'] == $task->emp_id) { ?>
                                        <?php if ($status == 'completed' || $status == 'finalized') { ?> <td><?php echo $task->end_date; ?></td> <?php } ?>
        <!--                                        <td><a href="#<?php echo $task->id; ?>" class="listRemarks">Remarks</a></td>-->
                                        <?php if ($status <> 'finalized') { ?> 
                                            <td><a href="#<?php echo $task->id; ?>" class="addQuery">Q</a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/task/get/<?php echo $task->id; ?>">E</a></td>
                                            <td><a href="#<?php echo $task->id; ?>" class="reAssign">R</a></td>
                                            <td><a href="#<?php echo $task->id; ?>" class="pending">P</a></td>
                                            
                                            <?php if ($task->type == 'itr') {
                                                if ($task->status == 'new') { ?>
                                                    <td><a href="#<?php echo $task->id; ?>#<?php echo $task->client_id; ?>#<?php echo $task->client_name; ?>" class="uploadITR">U</a></td>
                                                <?php } 
                                                elseif ($task->itr_id <> '' & $task->status <> 'completed') { ?>
                                                    <td><a href="#<?php echo $task->id; ?>#<?php echo $task->client_id; ?>#<?php echo $task->client_name; ?>#<?php echo $task->itr_id; ?>" class="mailITR">M</a></td>
                                                <?php }
                                            }
                                            elseif ($status <> 'completed') { ?>
                                                <td>/</td>
                                            <?php } ?>
                                            
                                            <?php if ($status <> 'completed') { ?>                                                 
                                            <td><a href="#<?php echo $task->id; ?>" class="closeTask">C</a></td>
                                            <?php } ?>
                                            
                                            <!-- TODO : For Manager - Finalize -->
                                            <?php if ($status == 'completed') { ?> 
                                                <?php if ($task->type == 'itr' && $task->itr_id <> '' ) { ?>
                                                <td><a href="#<?php echo $task->id; ?>#<?php echo $task->client_id; ?>#<?php echo $task->client_name; ?>#<?php echo $task->itr_id; ?>" class="finalizeITRTask">F</a></td>
                                                <?php } else { ?>
                                                <td><a href="#<?php echo $task->id; ?>" class="finalizeTask">F</a></td>
                                                <?php } ?>
                                            <?php } elseif ($status == 'finalized') { ?>
                                                <td></td>
                                            <?php } ?>
                                        <?php } ?>    
                                        <?php } ?>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>     
                        </table>
                    </div>    
                </div>    
            </div>        
    </article>

    <article class="module width_quarter">
        <header>
            <h3 class="tabs_involved">Remarks</h3>
        </header>
        <div class="tab_container">
            <div class="client_message_list">
                <div class="module_content">
                    <div class="message" id="show_remarks">
<!--                        <p>Post remarks for selected task</p>
                        <p><strong>Current User</strong></p>-->
                        <?php
                        if (count($tasks) < 1) {
                            ?>    
                            <div class="message">
                                <p>No Remarks added</p>
                            </div>
                            <?php
                        } else {
                            if ($tasks[0]->comments == '') {
                                ?>    
                                <div class="message">
                                    <p>No Remarks added</p>
                                </div>
                                <?php
                            }
                            $remarkslist = explode('<br>', $tasks[0]->comments);
                            foreach ($remarkslist as $remark) {
                                ?>
                                <div class="message"><p><?php echo $remark; ?></p></div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <footer>
                <form class="post_message" name="frmSubmitRemark" id="frmSubmitRemark" onsubmit="return false;">
                    <input type="hidden" name="sr_task_id" id="sr_task_id" value="<?php
                    if (count($tasks) < 1) {
                        echo '';
                    } else {
                        echo $tasks[0]->id;
                    }
                    ?>"/>
                    <input type="text" name="remarks" value="Remarks" onfocus="if (!this._haschanged) {
            this.value = ''
        }
        ;
        this._haschanged = true;">
                    <input type="submit" class="btn_post_message" value="" onclick="submitRemark();"></input>
                </form>
            </footer>            
        </div>        
    </article>

    <div class="clear"></div>

    <article class="module width_half">
        <header>
            <h3 class="tabs_involved">Inward Documents</h3>
        </header>
            <div class="tab_container">
                <div class="client_document_list">
                    <div id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
                            <tr>
	                            <th>SNo</th>
	                            <th>Date</th>
	                            <th>Particulars</th>
	                            <th>Tag</th> 
	                            <th>By</th> 
	                            <th>Mode</th>
							</tr>
                            </thead>
                            <tbody>                            
                                <?php
                                $i = 1;
                                foreach ($documents_inward as $document) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $document->create_date; ?></td>
                                        <td><?php echo $document->particulars; ?></td>
                                        <td><?php echo $document->tag; ?></td>                                        
                                        <td><?php echo $document->received_by_name; ?></td>
                                        <td><?php echo $document->mode_of_receipt; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
    </article>
    <article class="module width_half">
        <header>
            <h3 class="tabs_involved">Outward Documents</h3>
        </header>
            <div class="tab_container">
                <div class="client_document_list">
                    <div id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
                            <tr>
	                            <th>SNo</th>
								<th>Date</th>
	                            <th>Particulars</th>
								<th>Tag</th>
	                            <th>By</th>                            
	                            <th>Mode</th>
                            </tr>
                            </thead>
                            <tbody>                            
                                <?php
                                $i = 1;
                                foreach ($documents_outward as $document) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $document->create_date; ?></td>
                                        <td><?php echo $document->particulars; ?></td>
                                        <td><?php echo $document->tag; ?></td> 
                                        <td><?php echo $document->surrender_by_name; ?></td>                                        
                                        <td><?php echo $document->mode_of_receipt; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
    </article>
    <div style="clear:both;">
    <br></br>
    </div>