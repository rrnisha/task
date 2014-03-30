<!-- TITLE : LIST EMPLOYEE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.deleteEmployee').click(function() {
            var empId = $(this).attr('href').substr(1);
            $('#del_emp_id').val(empId)
            $.blockUI({message: $('#delete_employee')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.activateEmployee').click(function() {
            var empId = $(this).attr('href').substr(1);
            $('#act_emp_id').val(empId)
            $.blockUI({message: $('#activate_employee')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
    });
    function closeBox() {
        $.unblockUI();
        return false;
    }
    function deleteEmployee() {
        $.post("<?php echo base_url(); ?>index.php/employee/delete/", $("#frmDeleteEmployee").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/employee/lists/?msg=delEmpSuccess";
            }
        });
    }
    function activateEmployee() {
        $.post("<?php echo base_url(); ?>index.php/employee/activate/", $("#frmActivateEmployee").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/employee/lists/?msg=activateEmpSuccess";
            }
        });
    }
</script>


<section id="main" class="column">

    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Employees</h3>
        </header>
        
        <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
        
        <div id="list">
            <?php if ($msg == 'delEmpSuccess') { ?> 
                <h4 class="alert_success">Employee delete Successful</h4> 
            <?php } elseif ($msg == 'createEmpSuccess') { ?> 
                <h4 class="alert_success">Employee created Successfully</h4> 
            <?php } elseif ($msg == 'activateEmpSuccess') { ?> 
                <h4 class="alert_success">Employee activation Successful</h4> 
            <?php } elseif ($msg == 'editEmpSuccess') { ?> 
                <h4 class="alert_success">Employee edit Successful</h4> 
            <?php } ?>

            <br></br>
            
            <div id="delete_employee" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Delete Employee</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmDeleteEmployee" id="frmDeleteEmployee" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr>
                                <td>
                                    <input type="hidden" name="emp_id" id="del_emp_id" value=""/>
                                    <input type="button" name="submit_deleteEmp" value="Yes" onclick="deleteEmployee();"/>
                                    <input type="button" name="no_deleteEmp" value="No" onclick="return closeBox();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>     

            <div id="activate_employee" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Activate Employee</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmActivateEmployee" id="frmActivateEmployee" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr>
                                <td>
                                    <input type="hidden" name="emp_id" id="act_emp_id" value=""/>
                                    <input type="button" name="submit_activateEmp" value="Yes" onclick="activateEmployee();"/>
                                    <input type="button" name="no_activateEmp" value="No" onclick="return closeBox();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>  


            <div class="tab_container">
                <div class="employee_list">
                    <div id="tab1" class="tab_content">
                        <div>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>                           
                        <table class="tablesorter" cellspacing="0"> 
                            <thead>                     
                                <tr>
                                    <th rowspan="1">SNo</th>
                                    <th rowspan="1">Emp ID</th>
                                    <th class="required" rowspan="1">Title</th>
                                    <th class="required" rowspan="1">Name</th> 
                                    <th class="required" rowspan="1">Login Name</th>
                                    <th rowspan="1">Phone</th>
                                    <th rowspan="1">eMail</th>
                                    <th rowspan="1">Address</th>
                                    <th class="required" rowspan="1">Role</th>
                                    <th rowspan="1">Status</th>
                                    <th  rowspan="1" colspan="2">Action</th>
                                </tr>
                            </thead>                         
                            <tbody> 
                                <?php
                                $i = 1;
                                foreach ($employees as $employee) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $employee->id; ?></td>
                                        <td><?php echo $employee->title; ?></td> 
                                        <td><?php echo $employee->full_name; ?></td>
                                        <td><?php echo $employee->login; ?></td>
                                        <td><?php echo $employee->phone; ?></td>
                                        <td><?php echo $employee->email; ?></td>
                                        <td><?php echo $employee->address; ?></td>
                                        <td><?php echo $employee->role; ?></td>
                                        <td><?php echo $employee->status; ?></td>
                                        <td><a href="<?php echo base_url(); ?>index.php/employee/get/<?php echo $employee->id; ?>">Edit</a></td>
                                        <?php if ($employee->status == 'active') { ?>
                                            <td><a href="#<?php echo $employee->id; ?>" class="deleteEmployee">Delete</a></td>
                                        <?php } else { ?>
                                            <td><a href="#<?php echo $employee->id; ?>" class="activateEmployee">Activate</a></td>
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
</section>

