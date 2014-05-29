<!-- TITLE : LIST EMPLOYEE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.deleteCompany').click(function() {
            var companyId = $(this).attr('href').substr(1);
            $('#del_company_id').val(companyId)
            $.blockUI({message: $('#delete_company')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.activateCompany').click(function() {
            var companyId = $(this).attr('href').substr(1);
            $('#act_company_id').val(companyId)
            $.blockUI({message: $('#activate_company')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
    });
    function closeBox() {
        $.unblockUI();
        return false;
    }
    function deleteCompany() {
        $.post("<?php echo base_url(); ?>index.php/company/delete/", $("#frmDeleteCompany").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/company/lists/?msg=delCompanySuccess";
            }
        });
    }
    function activateCompany() {
        $.post("<?php echo base_url(); ?>index.php/company/activate/", $("#frmActivateCompany").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/company/lists/?msg=activateCompanySuccess";
            }
        });
    }
</script>


<section id="main" class="column">

    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Companys</h3>
        </header>
        
        <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
        
        <div id="list">
            <?php if ($msg == 'delCompanySuccess') { ?> 
                <h4 class="alert_success">Company delete Successful</h4> 
            <?php } elseif ($msg == 'createCompanySuccess') { ?> 
                <h4 class="alert_success">Company created Successfully</h4> 
            <?php } elseif ($msg == 'activateCompanySuccess') { ?> 
                <h4 class="alert_success">Company activation Successful</h4> 
            <?php } elseif ($msg == 'editCompanySuccess') { ?> 
                <h4 class="alert_success">Company edit Successful</h4> 
            <?php } ?>

            <br></br>
            
            <div id="delete_company" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Delete Company</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmDeleteCompany" id="frmDeleteCompany" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr>
                                <td>
                                    <input type="hidden" name="company_id" id="del_company_id" value=""/>
                                    <input type="button" name="submit_deleteCompany" value="Yes" onclick="deleteCompany();"/>
                                    <input type="button" name="no_deleteCompany" value="No" onclick="return closeBox();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>     

            <div id="activate_company" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Activate Company</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmActivateCompany" id="frmActivateCompany" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr>
                                <td>
                                    <input type="hidden" name="company_id" id="act_company_id" value=""/>
                                    <input type="button" name="submit_activateCompany" value="Yes" onclick="activateCompany();"/>
                                    <input type="button" name="no_activateCompany" value="No" onclick="return closeBox();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>  


            <div class="tab_container">
                <div class="company_list">
                    <div id="tab1" class="tab_content">
                        <div>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>                           
                        <table class="tablesorter" cellspacing="0"> 
                            <thead>                     
                                <tr>
                                    <th rowspan="1">SNo</th>
                                    <th rowspan="1">Company ID</th>
                                    <th class="required" rowspan="1">Company Name</th> 
                                    <th class="required" rowspan="1">On Screen Name</th> 
                                    <th class="required" rowspan="1">TAN</th>
                                    <th class="required" rowspan="1">Phone</th>
                                    <th class="required" rowspan="1">eMail</th>
                                    <th rowspan="1">Address</th>
                                    <th class="required" rowspan="1">DOI</th>
                                    <th rowspan="1">Status</th>
                                    <th  rowspan="1" colspan="2">Action</th>
                                </tr>
                            </thead>                         
                            <tbody> 
                                <?php
                                $i = 1;
                                foreach ($companys as $company) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $company->id; ?></td>
                                        <td><?php echo $company->name; ?></td>
                                        <td><?php echo $company->disp_name; ?></td>
                                        <td><?php echo $company->tan; ?></td>
                                        <td><?php echo $company->phone; ?></td>
                                        <td><?php echo $company->email; ?></td>
                                        <td><?php echo $company->address; ?></td>
                                        <td><?php echo $company->doi; ?></td>
                                        <td><?php echo $company->status; ?></td>
                                        <td><a href="<?php echo base_url(); ?>index.php/company/get/<?php echo $company->id; ?>">Edit</a></td>
                                        <?php if ($company->status == 'active') { ?>
                                            <td><a href="#<?php echo $company->id; ?>" class="deleteCompany">Delete</a></td>
                                        <?php } else { ?>
                                            <td><a href="#<?php echo $company->id; ?>" class="activateCompany">Activate</a></td>
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

