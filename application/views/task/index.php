<script type="text/javascript">
    $(document).ready(function() {
        $('.addRemark').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#task_id').val(taskId);
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
            $('#query_task_id').val(taskId);
            $.blockUI({message: $('#add_query')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.answerQuery').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#query_answer_task_id').val(taskId);
            $.blockUI({message: $('#answer_query')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.closeQuery').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#query_close_task_id').val(taskId);
            $.blockUI({message: $('#close_query')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
        
        $('.reAssign').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#reassign_task_id').val(taskId);
            $.blockUI({message: $('#re_assign')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.closeTask').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#close_task_id').val(taskId);
            $.blockUI({message: $('#close_task')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.uploadITR').click(function() {
            var itrfields = $(this).attr('href').split("#");
//            var taskId = $(this).attr('href').substr(1);
            var taskId = itrfields[1];
            $('#upload_itr_task_id').val(taskId);
            var clientId = itrfields[2];
            $('#upload_itr_client_id').val(clientId);
            var clientName = itrfields[3];
            $('#upload_itr_client_name').val(clientName);
            
            $.blockUI({message: $('#upload_itr_task')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
        $('.mailITR').click(function() {
            var itrfields = $(this).attr('href').split("#");
//            var taskId = $(this).attr('href').substr(1);
            var taskId = itrfields[1];
            $('#mail_itr_task_id').val(taskId);
            var clientId = itrfields[2];
            $('#mail_itr_client_id').val(clientId);
            var clientName = itrfields[3];
            $('#mail_itr_client_name').val(clientName);
            var itrId = itrfields[4];
            $('#mail_itr_id').val(itrId);
            var assessment_year = itrfields[5];
            $('#mail_itr_assessment_year').val(assessment_year);

            $.blockUI({message: $('#mail_itr_task')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.finalizeTask').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#finalize_task_id').val(taskId);
            $.blockUI({message: $('#finalize_task')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
        $('.finalizeITRTask').click(function() {
            var itrfields = $(this).attr('href').split("#");
//            var taskId = $(this).attr('href').substr(1);
            var taskId = itrfields[1];
            $('#finalize_itr_task_id').val(taskId);
            var clientId = itrfields[2];
            $('#finalize_itr_client_id').val(clientId);
            var clientName = itrfields[3];
            $('#finalize_itr_client_name').val(clientName);
            var itrId = itrfields[4];
            $('#finalize_itr_id').val(itrId);
            var assessment_year = itrfields[5];
            $('#finalize_itr_assessment_year').val(assessment_year);
            
            $.blockUI({message: $('#finalize_itr_task')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.pending').click(function() {
            var taskId = $(this).attr('href').substr(1);
            $('#pending_task_id').val(taskId);
            $.blockUI({message: $('#pending_task')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
    });

    $(function() {
        $("#filter_client_search").autocomplete({
            source: "<?php echo base_url(); ?>index.php/task/get_client",
            minLength: 2,
            select: function(event, ui) {
                $('#filter_client_id').val(ui.item.id);
            }
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
//                $('#addRemarkStatus').show();
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
//                $('#addRemarkStatus').show();
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
    function showDetails() {
        var taskId = document.getElementById("selected_task_id").value;
//        document.getElementById("details_task_id").value = taskId;
        $.get("<?php echo base_url(); ?>index.php/task/list_details/" + taskId).done(function(data) {
            $('#show_details').html(data);
        });
    }
    function captureTaskId(taskId) {
        document.getElementById("selected_task_id").value = taskId;
        showRemark();
        showDetails();
    }
    function addQuery() {
        $.post("<?php echo base_url(); ?>index.php/task/add_query/", $("#frmAddQuery").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/query/?msg=addQuerySuccess";

            }
        });
    }
    function answerQuery() {
        $.post("<?php echo base_url(); ?>index.php/task/answer_query/", $("#frmAnswerQuery").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/?msg=answerQuerySuccess";

            }
        });
    }
    function closeQuery() {
        $.post("<?php echo base_url(); ?>index.php/task/close_query/", $("#frmCloseQuery").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/?msg=closeQuerySuccess";

            }
        });
    }
    function reAssign() {
        $.post("<?php echo base_url(); ?>index.php/task/re_assign/", $("#frmReAssign").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/re-assigned/?msg=reAssignedSuccess";

            }
        });
    }

    function closeTask() {
        $.post("<?php echo base_url(); ?>index.php/task/close_task/", $("#frmCloseTask").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
//                window.location.href = "<?php echo base_url(); ?>index.php/task/index/" + result[2] + "?msg=closeTaskSuccess";
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/completed/?msg=closeTaskSuccess";
            }
        });
    }

    function uploadITR() {
        $.post("<?php echo base_url(); ?>index.php/task/upload_itr_task/", $("#frmUploadITRTask").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/pending/?msg=uploadITRSuccess";

            }
        });
    }

    function mailITR() {
        $.post("<?php echo base_url(); ?>index.php/task/mail_itr_task/", $("#frmMailITRTask").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/completed/?msg=mailITRSuccess";

            }
        });
    }

    function finalizeTask() {
        $.post("<?php echo base_url(); ?>index.php/task/finalize_task/", $("#frmFinalizeTask").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/finalized/?msg=finalizeTaskSuccess";
            }
        });
    }
    function finalizeITRTask() {
        $.post("<?php echo base_url(); ?>index.php/task/finalize_itr_task/", $("#frmFinalizeITRTask").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/finalized/?msg=finalizeITRTaskSuccess";
            }
        });
    }

    function pending() {
        $.post("<?php echo base_url(); ?>index.php/task/pending/", $("#frmPendingTask").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/pending/?msg=pendingTaskSuccess";
            }
        });
    }

    function filter_client() {
        $.post("<?php echo base_url(); ?>index.php/task/index/all", $("#frmFilterClient").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                window.location.href = "<?php echo base_url(); ?>index.php/client/index/"+result[2];
            }else if(result[1] == 'failure'){
                window.location.href = "<?php echo base_url(); ?>index.php/task/index/?msg=clientNotFound";
            }
        });
    }
</script>
<section id="main" class="column">
    <article class="module width_full">
        <header>
            <h3 class="tasks_tabs_involved">Tasks</h3>
            <ul class="tabs">                        
                <li <?php if ($status == 'all') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/task/index/all/">My Tasks</a></li>
                <?php if ($_SESSION['emp_role_id']==1 || $_SESSION['emp_role_id']==2) { ?>
                	<li <?php if ($status == 'tofinalize') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/task/index/tofinalize/">To Finalize</a></li> 
                <?php } ?>
                <li <?php if ($status == 'new') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/task/index/new/">New</a></li>
                <li <?php if ($status == 're-assigned') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/task/index/re-assigned/">ReAssigned</a></li>
                <li <?php if ($status == 'query') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/task/index/query/">Query</a></li>
                <li <?php if ($status == 'pending') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/task/index/pending/">Pending</a></li>
                <li <?php if ($status == 'completed') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/task/index/completed/">Completed</a></li>
                <li <?php if ($status == 'finalized') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/task/index/finalized/">Finalized</a></li>
                <li <?php if ($status == 'created') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/task/index/created/">Created</a></li> 
            </ul>
        </header>

        <div id="content" >
            <div id="success">
                <?php if ($msg == 'success') { ?> 
                    <h4 class="alert_success">Task created Successfully</h4> 
                <?php } elseif ($msg == 'addQuerySuccess') { ?> 
                    <h4 class="alert_success">Query raised Successfully</h4>
                <?php } elseif ($msg == 'answeredQuerySuccess') { ?> 
                    <h4 class="alert_success">Query answered Successfully</h4>
                <?php } elseif ($msg == 'closeQuerySuccess') { ?> 
                    <h4 class="alert_success">Query closed Successfully</h4>
                <?php } elseif ($msg == 'reAssignedSuccess') { ?> 
                    <h4 class="alert_success">Task re-assigned Successfully</h4> 
                <?php } elseif ($msg == 'closeTaskSuccess' ) { ?> 
                    <h4 class="alert_success">Task Successfully Closed</h4> 
                <?php } elseif ($msg == 'uploadITRSuccess' ) { ?> 
                    <h4 class="alert_success">ITR Uploaded Successfully</h4> 
                <?php } elseif ($msg == 'mailITRSuccess' ) { ?> 
                    <h4 class="alert_success">ITR Mailed Successfully</h4> 
                <?php } elseif ($msg == 'pendingTaskSuccess') { ?> 
                    <h4 class="alert_success">Task Successfully moved to Pending Status</h4> 
                <?php } elseif ($msg == 'finalizeTaskSuccess' | $msg == 'finalizeITRTaskSuccess') { ?> 
                    <h4 class="alert_success">Task Finalized Successfully</h4> 
                <?php } elseif ($msg == 'taskEditSuccess') { ?> 
                    <h4 class="alert_success">Task Edited Successfully</h4> 
                <?php } elseif ($msg == 'clientNotFound') { ?> 
                    <h4 class="alert_warning">Client Not Available</h4> 
                <?php } ?>                
<!--                <h4 id="addRemarkStatus" class="alert_success" style="display:none">Remark added Successfully</h4>-->
            </div>
            <div id="add_remark" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Remarks</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
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
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
                <div id="remarks_listing" style="clear:both;" style="">

                </div>     
            </div>

            <div id="add_query" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Raise Query</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
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
                                    <input type="button" name="add_query" value="Raise" onclick="addQuery();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>

            <div id="answer_query" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Answer Query</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
                <div style="clear:both;" style="">
                    <form name="frmAnswerQuery" id="frmAnswerQuery" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="query" cols="40"></textarea></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="query_answer_task_id" value=""/>
                                    <input type="button" name="answer_query" value="Answer" onclick="answerQuery();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>

            <div id="close_query" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Close Query</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
                <div style="clear:both;" style="">
                    <form name="frmCloseQuery" id="frmCloseQuery" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="query" cols="40"></textarea></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="query_close_task_id" value=""/>
                                    <input type="button" name="close_query" value="Close" onclick="closeQuery();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>
                        
            <div id="re_assign" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">ReAssign Task To</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
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
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
                <div style="clear:both;" style="">
                    <form name="frmCloseTask" id="frmCloseTask" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="closeTaskComment" cols="40">Completed</textarea></td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="close_task_id" value=""/>
                                    <input type="hidden" name="status_page" id="status_page" value="<?php echo $status ?>"/>
                                    <input type="button" name="submit_closeTask" value="Close Task" onclick="closeTask();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>            

            <div id="upload_itr_task" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Upload ITR</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
                <div style="clear:both;" style="">
                    <form name="frmUploadITRTask" id="frmUploadITRTask" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td>
                                    <label>Client</label>
                                </td>
                                <td>
                                    <input type="type" name="client_name" id="upload_itr_client_name" value="" readonly/>
                                    <input type="hidden" name="client_id" id="upload_itr_client_id" value=""/>                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Assessment Year</label>
                                </td>
                                <td>
                                    <?php echo form_dropdown('assessment_year', $assessment_year); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Date of uploading</label>
                                </td>
                                <td>
                                    <p class="datepair" data-language="javascript" style="">
                                        <input type="text" class="date end" name="date_of_uploading" id="upload_itr_date_of_uploading" value="<?php echo date('d-m-Y'); ?>" style="width:40%;float:left;"/>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Filed By</label>
                                </td>                                
                                <td>
                                    <input type="hidden" name="filed_by" id="upload_itr_emp_id" value="<?php echo $_SESSION['emp_id'];?>" readonly/>
                                    <input type="type" name="filed_by_login" id="upload_itr_emp_login" value="<?php echo $_SESSION['emp_login'];?>" readonly/>
                                </td>
                            </tr>                            
<!--                            <tr>
                                <td>
                                    <label>Reassign to</label>
                                </td>                                
                                <td>
                                    <?php echo form_dropdown('emp_id', $all_employees); ?>
                                </td>
                            </tr>                            -->
                            <tr>
                                <td>
                                    <label>Remarks</label>
                                </td>
                                <td><textarea name="uploadITRComment" cols="40">ITR Uploaded</textarea></td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="upload_itr_task_id" value=""/>
                                    <input type="hidden" name="status_page" id="status_page" value="<?php echo $status ?>"/>
                                    <input type="button" name="submit_uploadITR" value="Upload ITR" onclick="uploadITR();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>            

            <div id="mail_itr_task" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Mail ITR</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
                <div style="clear:both;" style="">
                    <form name="frmMailITRTask" id="frmMailITRTask" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td>
                                    <label>Client</label>
                                </td>
                                <td>
                                    <input type="type" name="client_name" id="mail_itr_client_name" value="" readonly/>
                                    <input type="hidden" name="client_id" id="mail_itr_client_id" value=""/>                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Assessment Year</label>
                                </td>
                                <td>
                                    <input type="type" name="assessment_year" id="mail_itr_assessment_year" value="" readonly/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Date of mailing</label>
                                </td>
                                <td>
                                    <p class="datepair" data-language="javascript" style="">
                                        <input type="text" class="date end" name="date_of_mailing" id="mail_itr_date_of_mailing" value="<?php echo date('d-m-Y'); ?>" style="width:40%;float:left;"/>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Remarks</label>
                                </td>
                                <td><textarea name="mailITRComment" cols="40">ITR Mailed</textarea></td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="hidden" name="itr_id" id="mail_itr_id" value=""/>
                                    <input type="hidden" name="task_id" id="mail_itr_task_id" value=""/>
                                    <input type="hidden" name="status_page" id="status_page" value="<?php echo $status ?>"/>
                                    <input type="button" name="submit_mailITR" value="Mail ITR" onclick="mailITR();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>            

            <div id="finalize_task" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Finalize Task</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
                <div style="clear:both;" style="">
                    <form name="frmFinalizeTask" id="frmFinalizeTask" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="finalizeTaskComment" cols="30">Finalized</textarea></td>
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

            <div id="finalize_itr_task" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Finalize Task</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
                <div style="clear:both;" style="">
                    <form name="frmFinalizeITRTask" id="frmFinalizeITRTask" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td>
                                    <label>Client</label>
                                </td>
                                <td>
                                    <input type="type" name="client_name" id="finalize_itr_client_name" value="" readonly/>
                                    <input type="hidden" name="client_id" id="finalize_itr_client_id" value=""/>                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Assessment Year</label>
                                </td>
                                <td>
                                    <input type="type" name="assessment_year" id="finalize_itr_assessment_year" value="" readonly/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Date of Billing</label>
                                </td>
                                <td>
                                    <p class="datepair" data-language="javascript" style="">
                                        <input type="text" class="date end" name="date_of_billing" id="finalize_itr_date_of_billing" value="<?php echo date('d-m-Y'); ?>" style="width:40%;float:left;"/>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Billing Amount</label>
                                </td>
                                <td>
                                    <input type="type" name="bill_amount" id="finalize_itr_bill_amount" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Remarks</label>
                                </td>
                                <td><textarea name="finalizeITRTaskComment" cols="40">ITR Finalized</textarea></td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="hidden" name="itr_id" id="finalize_itr_id" value=""/>
                                    <input type="hidden" name="task_id" id="finalize_itr_task_id" value=""/>
                                    <input type="button" name="submit_finalizeITRTask" value="Finalize ITR Task" onclick="finalizeITRTask();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>

            <div id="pending_task" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Move Task to Pending</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();"><img src="<?php echo base_url(); ?>/assets/img/icn_logout.png"/></a></p>
                <div style="clear:both;" style="">
                    <form name="frmPendingTask" id="frmPendingTask" onsubmit="return false;">
                        <table cellpadding="4">
                            <tr>
                                <td><textarea name="pendingTaskComment" cols="40">Pending due to</textarea></td>
                            </tr>                            
                            <tr>
                                <td>
                                    <input type="hidden" name="task_id" id="pending_task_id" value=""/>
                                    <input type="hidden" name="status_page" id="status_page" value="<?php echo $status ?>"/>
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
                        <input type="hidden" name="task_id" id="selected_task_id" value="<?php if (count($tasks) < 1){ echo ''; } else { echo $tasks[0]->id; } ?>"/>
                        <input type="hidden" name="role_id" id="emp_role_id" value="<?php echo $_SESSION['emp_role_id']; ?>"/>
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
                                <tr>
                                    <th rowspan="1"></th>
                                    <th rowspan="1">ID</th>                                    
                                    <?php if ($status == 'tofinalize' || $status == 'finalized' || $status == 'created') { ?> <th class="required" rowspan="1">Owner</th>  <!-- TODO : Only for Super Admin --> <?php } ?>
                                    <th class="required" rowspan="1">Task</th>
                                    <th class="required" rowspan="1">Client</th>
                                    <th rowspan="1">Status</th>
                                    <th class="required" rowspan="1">Priority</th>
                                    <th class="required" rowspan="1">Type</th>
                                    <th class="required" rowspan="1">Due Date</th>                                    
                                    <?php if ($status == 'completed' || $status == 'finalized' || $status == 'created') { ?> <th  rowspan="1">End Date</th> <?php } ?>
                                    <?php if (!($status == 'completed' || $status == 'finalized')) { ?> <th  rowspan="1" colspan="7" align="center">Action</th> <?php } ?>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                $i = 1;
                                $query_status = '';
                                foreach ($tasks as $task) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="radio" name="select" value="selected" <?php if ($i == 1) { ?>checked<?php } ?> onclick="captureTaskId(<?php echo $task->id; ?>)"/>
                                        </td>
                                        <td><?php echo $task->id; ?></td>
                                        <?php if ($status == 'tofinalize' || $status == 'finalized' || $status == 'created') { ?> <td> <?php echo $task->emp_name; ?> </td>  <!-- TODO : Only for Super Admin --> <?php } ?>
                                        <td><?php echo $task->title; ?></td>
                                        <td><?php echo $task->client_name; ?></td>
                                        <?php if ($task->status == 'query') { 
                                        	if ($task->emp_id == $_SESSION['emp_id']) { 
                                        	?> 
                                        	<td style="color:red"><?php $query_status = 'Query To Answer';  echo $query_status; ?></td>
                                         	<?php 
                                        	} else { 
                                        		?> <td><?php $query_status = 'Query Requested'; echo $query_status;?></td> 
                                        	<?php 
                                        	}
                                        } else {
                                        	?>
                                        	<td> <?php  echo $task->status; ?> </td>
                                        <?php }?>
                                        	
                                        <?php if ($task->priority == 'medium') { ?>
                                        	<td><label style="visibility:hidden">2</label><img alt="<?php echo $task->priority; ?>" src="<?php echo base_url(); ?>/assets/img/new/medium16.png"/></td>
                                        <?php } else if ($task->priority == 'high') { ?>
                                        	<td><label style="visibility:hidden">1</label><img alt="<?php echo $task->priority; ?>" src="<?php echo base_url(); ?>/assets/img/new/high16.png"/></td>
                                        <?php } if ($task->priority == 'low') { ?>
                                        	<td><label style="visibility:hidden">3</label><img alt="<?php echo $task->priority; ?>" src="<?php echo base_url(); ?>/assets/img/new/low16.png"/></td>
                                        <?php } ?>
                                        
                                        <td><?php if ($task->type == 'accounting') { echo strtoupper('acctng'); } else { echo strtoupper($task->type); } ?></td>

										<td><?php echo $task->due_date; ?></td>                                        
                                        <?php if ($status == 'completed' || $status == 'finalized' || $status == 'created') { ?> <td><?php echo $task->end_date; ?></td> <?php } ?>
                                        
                                        <?php if (!($status == 'completed' || $status == 'finalized')) { ?>
                                        	
                                        	<?php if (!($status == 'created')) { ?>
	                                        	<?php if ($query_status != 'Query Requested') { ?> 
	                                            	<td><a href="#<?php echo $task->id; ?>" class="addQuery">Q<img src="<?php echo base_url(); ?>/assets/img/icons/Query.gif"/></a></td>
	                                            <?php } else { ?>
	                                            	<td>/</td>
	                                            <?php } ?>
	                                        <?php } ?>
                                            
                                            <?php if (!($task->status == 'completed' || $task->status == 'finalized')) { ?>
                                            	<td><a href="<?php echo base_url(); ?>index.php/task/get/<?php echo $task->id; ?>">E<img src="<?php echo base_url(); ?>/assets/img/new/Write.png"/></a></td>
                                            <?php } else { ?>
                                            	<td>/</td>
                                            <?php } ?>	
                                            
                                        	<?php if (!($status == 'created')) { ?>                                            
	                                            <?php if ($task->status != 'query') { ?>
	                                            <td><a href="#<?php echo $task->id; ?>" class="reAssign">R<img src="<?php echo base_url(); ?>/assets/img/icons/reassign.gif"/></a></td>
	                                            <td><a href="#<?php echo $task->id; ?>" class="pending">P<img src="<?php echo base_url(); ?>/assets/img/icons/process_pending.jpg"/></a></td>
	                                            <?php } else { if ($query_status == 'Query To Answer') { ?>
	                                            	<td><a href="#<?php echo $task->id; ?>" class="answerQuery">AQ<img src="<?php echo base_url(); ?>/assets/img/icons/Query1.gif"/></a></td>
	                                            	<td>/</td>
	                                            <?php } else { ?>
	                                            <td><a href="#<?php echo $task->id; ?>" class="closeQuery">CQ<img src="<?php echo base_url(); ?>/assets/img/icons/Query2.gif"/></a></td>
	                                            <td>/</td>
	                                            <?php }
	                                            } ?>
	                                            
	                                            <?php if ($task->type == 'itr') {
	                                                if ($task->itr_id == '') { ?>
	                                                    <td><a href="#<?php echo $task->id; ?>#<?php echo $task->client_id; ?>#<?php echo $task->client_name; ?>" class="uploadITR">U<img src="<?php echo base_url(); ?>/assets/img/upload_doc.png"/></a></td>
	                                                <?php } 
	                                                elseif ($task->itr_id <> '' & $task->status <> 'completed') { ?>
	                                                    <td><a href="#<?php echo $task->id; ?>#<?php echo $task->client_id; ?>#<?php echo $task->client_name; ?>#<?php echo $task->itr_id; ?>#<?php echo $task->assessment_year; ?>" class="mailITR">P<img src="<?php echo base_url(); ?>/assets/img/new/Email App.png"/></a></td>
	                                                <?php }
	                                            }
	                                            elseif ($task->status <> 'completed') { ?>
	                                                <td>/</td>
	                                            <?php } ?>
	                                            
	                                            <?php if ($task->status <> 'completed') { 
	                                                if ($task->type == 'itr') { ?>
	                                                    <td>/</td>
	                                                <?php } 
	                                                else { ?>                                                
	                                                    <td><a href="#<?php echo $task->id; ?>" class="closeTask">C<img src="<?php echo base_url(); ?>/assets/img/icons/completed.jpg"/></a></td>
	                                            <?php } } ?>
	                                            
	                                            <!-- TODO : For Manager - Finalize -->
	                                            <?php if ($_SESSION['emp_role_id']==1 || $_SESSION['emp_role_id']==2) { ?>                
	                                            	<?php if ($status == 'tofinalize') { ?> 
	                                                	<?php if ($task->type == 'itr' && $task->itr_id <> '' ) { ?>
	                                                	<td><a href="#<?php echo $task->id; ?>#<?php echo $task->client_id; ?>#<?php echo $task->client_name; ?>#<?php echo $task->itr_id; ?>#<?php echo $task->assessment_year; ?>" class="finalizeITRTask">FI<img src="<?php echo base_url(); ?>/assets/img/icons/Approval.jpg"/></a></td>
	                                                	<?php } else { ?>
	                                                	<td><a href="#<?php echo $task->id; ?>" class="finalizeTask">F<img src="<?php echo base_url(); ?>/assets/img/icons/Approval.jpg"/></a></td>
	                                            		<?php } ?>
	                                            	<?php } ?>
	                                            <?php } ?>
	                                            <?php if ($status == 'finalized') { ?>
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


    <div class="clear"></div>
    
    <article class="module width_3_quarter_task">
        <header>
            <h3 class="tabs_involved">Task Remarks</h3>
        </header>
        <div class="tab_container">
            <div class="message_list">
                <div class="module_content">
                    <div class="message" id="show_remarks">
                        <?php
                        if (count($tasks) < 1 || count($tasks[0])<1) {
                            ?>    
                            <div class="message">
                                <p>No Remarks added</p>
                            </div>
                            <?php
                        }
                        else{ 
                            if ($tasks[0]->comments == '') {
                                ?>    
                                <div class="message">
                                    <p>No Remarks added</p>
                                </div>
                                <?php
                            }

                            $remarkslist = explode('<br>', $tasks[0]->comments);
                            $cnt = count($remarkslist);
                            for ($index = $cnt-1; $index >= 0; $index--)  {
                                ?>
                                <div class="message"><p><?php echo $remarkslist[$index]; ?></p></div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <footer>
                <form class="post_message" name="frmSubmitRemark" id="frmSubmitRemark" onsubmit="return false;">
                    <input type="hidden" name="sr_task_id" id="sr_task_id" value="<?php if (count($tasks) < 1){ echo ''; } else { echo $tasks[0]->id; } ?>"/>
					<!-- onfocus="this.value = '';" -->
                    <input type="text" name="remarks" value="">
                    <input type="submit" class="btn_post_message" value="" onclick="submitRemark();"></input>
                </form>
            </footer>            
        </div>        
    </article>
    
    <article class="module width_quarter_task">
        <header>
            <h3 class="tabs_involved">Task Details</h3>
        </header>
        <div class="tab_container">
            <div class="task_details">
                <div class="module_content">
                    <div class="message" id="show_details">
                        <?php
                        if (count($tasks)<1) {
                            ?>    
                            <div class="message">
                                <p>No Tasks</p>
                            </div>
                            <?php
                        }
                        else{ 
                        ?>
                        <p>Details for Task #<strong><?php echo $tasks[0]->id; ?> - <?php echo $tasks[0]->title; ?></strong></p>
                        <table class="tablesorter" cellspacing="0">
							<thead>
								<tr>
									<th class="required" rowspan="1">Start Date</th>
									<th class="required" rowspan="1">Due Date</th>
									<th rowspan="1">End Date</th>                                    
								</tr>
							</thead>
							<tbody>
							 	<tr>
									<td>
							            <?php echo $tasks[0]->start_date?>
							        </td>
									<td>
							            <?php echo $tasks[0]->due_date?>
							        </td>
									<td>
							            <?php echo $tasks[0]->end_date ?>
							        </td>
								</tr>
							</tbody>                            
                        <?php 
                        } 
                        ?>
                        </table>

                    </div>
                </div>
            </div>        
    </article>       