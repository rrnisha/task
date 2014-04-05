<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.deleteClient').click(function() {
            var clientId = $(this).attr('href').substr(1);
            $('#del_emp_id').val(clientId)
            $.blockUI({message: $('#delete_client')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.activateClient').click(function() {
            var clientId = $(this).attr('href').substr(1);
            $('#act_emp_id').val(clientId)
            $.blockUI({message: $('#activate_client')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.editClient').click(function() {
            var clientId = $(this).attr('href').substr(1);
            $.get("<?php echo base_url(); ?>index.php/client/get/" + clientId).done(function(data) {
                $('#client_details').html(data);
                $.blockUI({message: $('#edit_client')});
            });
        });
    });

    $(function() {
        $("#filter_client_search").autocomplete({
            source: "<?php echo base_url(); ?>index.php/task/get_client",
            minLength: 1,
            select: function(event, ui) {
                $('#filter_client_id').val(ui.item.id)
            }
        });
    });
        
    function closeBox() {
        $.unblockUI();
        return false;
    }
    function deleteClient() {
        $.post("<?php echo base_url(); ?>index.php/client/delete/", $("#frmDeleteClient").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/client/lists/?msg=delClientSuccess";
            }
        });
    }
    function activateClient() {
        $.post("<?php echo base_url(); ?>index.php/client/activate/", $("#frmActivateClient").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/client/lists/?msg=activateClientSuccess";
            }
        });
    }

    function filter_by_client() {
        $.get("<?php echo base_url(); ?>index.php/client/lists", $("#frmFilterClient").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                window.location.href = "<?php echo base_url(); ?>index.php/client/lists/";
            }else if(result[1] == 'failure'){
                window.location.href = "<?php echo base_url(); ?>index.php/client/lists/?msg=clientNotFound";
            }
        });
    }      
</script>

<section id="main" class="column">
    <article class="module width_full">
	    <div id="filterlink">
			<header>
		    	<h3 class="tabs_involved">Filters</h3>
		    </header>
	    </div>
		<div id="filters">
		    <div class="module_content" >
				<form id="frmFilterClient" method="post" action="<?php echo base_url(); ?>index.php/client/lists/filter">
			    	<fieldset>
			    		<label>By Client</label>
			    		<input type="text" id="filter_client_search" name="filter_client_search"  value="<?php echo $filter_client_search; ?>">
						<input type="hidden" name="filter_client_id" id="filter_client_id" value="<?php echo $filter_client_id; ?>"/>
						<input type="submit" name="filter_submit" id="filter_submit" value="Filter"/>
						<a href="<?php echo base_url(); ?>index.php/client/lists">Reset Filter</a>
			    	</fieldset>
		        </form>
		    </div>
	    </div>
	</article>
    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Clients</h3>
        </header>
        <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
        <div style="clear:both;" id="list">

            <?php if ($msg == 'clientCreateSuccess') { ?> 
                <h4 class="alert_success">Client created Successfully</h4> 
            <?php } elseif ($msg == 'clientEditSuccess') { ?> 
                <h4 class="alert_success">Client edited Successfully</h4> 
            <?php } elseif ($msg == 'delClientSuccess') { ?> 
                <h4 class="alert_success">Client delete Successful</h4> 
            <?php } elseif ($msg == 'activateClientSuccess') { ?> 
                <h4 class="alert_success">Client activation Successful</h4> 
            <?php } ?>

            <br></br>
            
            <div id="delete_client" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Delete Client</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmDeleteClient" id="frmDeleteClient" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr>
                                <td>
                                    <input type="hidden" name="emp_id" id="del_emp_id" value=""/>
                                    <input type="button" name="submit_deleteEmp" value="Yes" onclick="deleteClient();"/>
                                    <input type="button" name="no_deleteEmp" value="No" onclick="return closeBox();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>     

            <div id="activate_client" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Activate Client</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmActivateClient" id="frmActivateClient" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr>
                                <td>
                                    <input type="hidden" name="emp_id" id="act_emp_id" value=""/>
                                    <input type="button" name="submit_activateEmp" value="Yes" onclick="activateClient();"/>
                                    <input type="button" name="no_activateEmp" value="No" onclick="return closeBox();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>  

            <div id="edit_client" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Edit Client</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div id="client_details" style="clear:both;" style="">

                </div>     
            </div>    

            <div class="tab_container">
                <div class="client_list">
                    <div id="tab1" class="tab_content">
                        <div>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>                        
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
                                <tr>
                                    <th class="required_table" rowspan="1">File</th>                                    
                                    <th class="required_table" rowspan="1">Title</th>
                                    <th class="required_table" rowspan="1">Name</th>
                                    <th class="required_table" rowspan="1">DOB</th> 
<!--                                     <th class="required_table" rowspan="1">Type</th> -->
                                    <th class="required_table" rowspan="1" colspan="2" style="border-left:1px dotted #CCCCCC; border-right:1px dotted #CCCCCC; text-align:center;">Mobile</th>
                                    <th rowspan="1" colspan="2" style="border-left:1px dotted #CCCCCC; border-right:1px dotted #CCCCCC; text-align:center;">Office</th>
                                    <th rowspan="1">eMail</th>
                                    <th class="required_table" rowspan="1">PAN/TAN</th>
                                    <th rowspan="1">Address</th>
                                    <th class="required_table" rowspan="1">Genius#</th>
                                    <th  rowspan="1" colspan="2" style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($clients as $client) {
                                    ?>
                                    <tr <?php if($client->client_type=="company") { echo 'style="color:teal;"'; } ?>>
                                        <td><?php echo $client->file_id; ?></td>                                        
                                        <td><?php echo $client->title; ?></td> 
                                        <td><?php echo $client->full_name; ?></td>
                                        <td><?php echo $client->dob; ?></td>
                                        <!-- <td>< ?php echo $client->client_type; ?></td>  -->
                                        <td style="border-left:1px dotted #CCCCCC; border-right:1px dotted #CCCCCC"><?php echo $client->phone_mobile; ?></td>
                                        <td><?php if ($client->phone_mobile2!='') { echo $client->phone_mobile2; } else { echo '--NA--'; } ?></td>
                                        <td style="border-left:1px dotted #CCCCCC; border-right:1px dotted #CCCCCC"><?php if ($client->phone_office!='') { echo $client->phone_office; } else { echo '--NA--'; } ?></td>
                                        <td style="border-right:1px dotted #CCCCCC"><?php if ($client->phone_office2!='') { echo $client->phone_office2; } else { echo '--NA--'; } ?></td>
                                        <td><?php if ($client->email!='') { echo $client->email; } else { echo '--NA--'; } ?></td>
                                        <td><?php echo $client->pan_tan; ?></td>
                                        
                                        <td><?php if ($client->address!='') { echo $client->address; } else { echo '--NA--'; } ?></td>
                                        <td><?php echo $client->genius_id; ?></td>

                                        <!--<td><?php echo $client->status; ?></td>-->
                                        <td><a href="<?php echo base_url(); ?>index.php/client/get/<?php echo $client->id; ?>">Edit</a></td>
                                        <?php if ($client->status == 'active') { ?>
                                            <td><a href="#<?php echo $client->id; ?>" class="deleteClient">Delete</a></td>
                                        <?php } else { ?>
                                            <td><a href="#<?php echo $client->id; ?>" class="activateClient">Activate</a></td>
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