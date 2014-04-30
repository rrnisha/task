<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.listInvoices').click(function() {
            var hrefFields = $(this).attr('href').split("#");
          	var registerId = hrefFields[1];
          	var documentId = hrefFields[2];
			$('#invoices_doc_register_id').val(registerId);
            $('#invoices_doc_id').val(documentId);
            var edit_start_date = hrefFields[3];
            $('#invoices_edit_start_date').val(edit_start_date);
            $.blockUI({message: $('#invoices_document')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
        $('.outwardDocument').click(function() {
            var hrefFields = $(this).attr('href').split("#");
          	var registerId = hrefFields[1];
          	var documentId = hrefFields[2];
			$('#outward_doc_register_id').val(registerId);
            $('#outward_doc_id').val(documentId);
            var edit_start_date = hrefFields[3];
            $('#outward_edit_start_date').val(edit_start_date);
            $.blockUI({message: $('#outward_document')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
        $('.inwardDocument').click(function() {
            var hrefFields = $(this).attr('href').split("#");
          	var registerId = hrefFields[1];
          	var documentId = hrefFields[2];
			$('#inward_doc_register_id').val(registerId);
            $('#inward_doc_id').val(documentId);
            var edit_start_date = hrefFields[3];
            $('#inward_edit_start_date').val(edit_start_date);
            $.blockUI({message: $('#inward_document')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });

        $('.outwardRegister').click(function() {
            var registerId = $(this).attr('href').substr(1);
            $('#outward_register_id').val(registerId);
            $.blockUI({message: $('#outward_register')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
        $('.inwardRegister').click(function() {
            var registerId = $(this).attr('href').substr(1);
            $('#inward_register_id').val(registerId);
            $.blockUI({message: $('#inward_register')});
            return false;
            //setTimeout($.unblockUI, 2000); 
        });
    });
//    $('.filterlink').click(function() {
//		$('.filters').show();
//        //setTimeout($.unblockUI, 2000); 
//    });
    
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

    function captureDocId(docId) {
        document.getElementById("selected_doc_id").value = docId;
        showDocs();
        showDocTrans();
    }

    function showDocTrans() {
        var docId = document.getElementById("selected_doc_id").value;
        $.get("<?php echo base_url(); ?>index.php/register/list_doc_trans/" + docId).done(function(data) {
            $('#show_doc_trans').html(data);
        });
    }

    function showDocs() {
        var docId = document.getElementById("selected_doc_id").value;
        $.get("<?php echo base_url(); ?>index.php/register/list_docs/" + docId).done(function(data) {
            $('#show_docs').html(data);
        });
    }

    function listInvoices() {
        $.post("<?php echo base_url(); ?>index.php/register/listInvoices/", $("#frmlistInvoices").serialize()).done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/register/tomedia/"+result[2]+"/print/"+result[3];
            }
        });
    }
    
//  window.location.href = "index.php/register/lists/?msg=inwardDocumentSuccess";
    function outwardDocument() {
        $.post("<?php echo base_url(); ?>index.php/register/outwardDoc/", $("#frmOutwardDocument").serialize()).done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/register/tomedia/"+result[2]+"/outwardDoc/"+result[3];
            }
        });
    }

    function inwardDocument() {
        $.post("<?php echo base_url(); ?>index.php/register/inwardDoc/", $("#frmInwardDocument").serialize()).done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/register/tomedia/"+result[2]+"/inwardDoc/"+result[3];
            }
        });
    }

    function outwardRegister() {
        $.post("<?php echo base_url(); ?>index.php/register/outwardRegister/", $("#frmOutwardRegister").serialize()).done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/register/tomedia/"+result[2]+"/outwardRegister";
            }
        });
    }

    function inwardRegister() {
        $.post("<?php echo base_url(); ?>index.php/register/inwardRegister/", $("#frmInwardRegister").serialize()).done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/register/tomedia/"+result[2]+"/inwardRegister";
            }
        });
    }

    function filter_register_by_client() {
        $.get("<?php echo base_url(); ?>index.php/register/lists", $("#frmFilterClient").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                window.location.href = "<?php echo base_url(); ?>index.php/register/lists/";
            }else if(result[1] == 'failure'){
                window.location.href = "<?php echo base_url(); ?>index.php/register/lists/?msg=clientNotFound";
            }
        });
    }    

    function filterByType(type){
    	document.getElementById("filter_type_id").value = type;
    }

    function getRegId(){
        return document.getElementById("invoices_doc_register_id");
    }
    
</script>
<section id="main" class="column">
    <article class="module filter_width_full">
	    <div id="filterlink">
			<header>
		    	<h3 class="tabs_involved">Filters</h3>
		    </header>
	    </div>
		<div id="filters">
		    <div class="module_content" >
				<form id="frmFilterClient" method="post" action="<?php echo base_url(); ?>index.php/register/filter">
			    	<fieldset>
			    		<label>By Client</label>
			    		<input type="text" id="filter_client_search" name="filter_client_search"  value="<?php echo $filter_client_search; ?>">
						<input type="hidden" name="filter_client_id" id="filter_client_id" value="<?php echo $filter_client_id; ?>"/>
			    	</fieldset>
	                <fieldset>
	                    <label>Type</label>
                    	<?php foreach ($types as $type) { ?>
                    		<?php 
                    			$js = 'onclick="filterByType(\''.$type['value'].'\')"';
                    			echo form_radio($type['name'], $type['value'], $type['checked'], $js); 
                    			echo ' '.$type['ui_desc'].' ';
                    		?>
                    	<?php } ?>
		                <input type="hidden" name="filter_type_id" id="filter_type_id" value="<?php echo $filter_type_id; ?>"/>
						<input type="submit" name="filter_submit" id="filter_submit" value="Filter"/>
						<a href="<?php echo base_url(); ?>index.php/register/lists"><input type="button" name="reset" value="Reset"/></a>
	                </fieldset> 
	                
		        </form>
		    </div>
	    </div>
	</article>
    <div class="clear"></div>
    <article class="module width_3_quarter">
        <header>
            <h3 class="tabs_involved">Registers</h3>
        </header>

        <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->

        <div style="clear:both;" id="list"></div>

            <?php if ($msg == 'documentCreateSuccess') { ?> 
                <h4 class="alert_success">Document created Successfully</h4> 
            <?php } elseif ($msg == 'documentEditSuccess') { ?> 
                <h4 class="alert_success">Document edited Successfully</h4> 
            <?php } elseif ($msg == 'outwardDocumentSuccess') { ?> 
                <h4 class="alert_success">Outward Document Marked Successfully</h4> 
            <?php } elseif ($msg == 'inwardDocumentSuccess') { ?> 
                <h4 class="alert_success">Inward Document Marked Successfully</h4> 
            <?php } ?>

            <div id="invoices_document" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Register Invoices</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="height:10%">
                    <form name="frmlistInvoices" id="frmlistInvoices" onsubmit="return false;">
                        <table cellpadding="1">
                        
                        	<?php 
                        		$url = base_url().'index.php/task/list.php';
                        	 
	                        	$dom = new DOMDocument();
	                        	$dom->load(file_get_contents($url));
// 	                        	$dom->validate();
	                        	$div = $dom->getElementById('invoices_doc_register_id');
	                        	?>
	                        	<p>--<?php count($_SESSION); foreach ($_SESSION as $key => $value) echo "$key=$value"; ?>--</p>
	                        	<?php 
// 	                        	$attr = $div->getAttribute('value');
//                         		$rid = document.getElementById("invoices_doc_register_id");
                        		$rid = 2;
								$reg = $registers_id[$rid];
							?>
							<p>document.getElementById('invoices_doc_register_id').value</p>
                        	<thead>
	                            <tr style="cellspacing:10">
	                                <th>Inward Invoices <?php echo count($reg->inward_invoices)?></th>
                                	<th>Outward Invoices <?php echo count($reg->outward_invoices)?></th>
								</tr>
                        	</thead>
                        	<tbody>
								<?php
								
								$inward_count = count($reg->inward_invoices);
								$outward_count = count($reg->outward_invoices);
								
								$count = ($inward_count>$outward_count) ? $inward_count : $outward_count; 
								 
                        		for ($cnt=0, $in_cnt=0, $out_cnt=0; $cnt<=$count; $cnt++, $in_cnt++, $out_cnt++){
								?>
                        		<tr>
								<td>
								<?php 
									if ($in_cnt < $inward_count) {
								?>
	                        		<a href="<?php echo base_url(); ?>index.php/register/tomedia/<?php echo $reg->id; ?>/<?php echo $reg->inward_invoices[$in_cnt]->inv_id; ?>/printInwardInv/dummyvalue/"><?php echo $reg->inward_invoices[$in_cnt]->inv_id; ?></a>
	                        	<?php 
	                        		} else {
										echo '';
									}
	                        	?>
	                        	</td>
								<td>
								<?php
									if ($out_cnt < $outward_count) {
								?>
	                        		<a href="<?php echo base_url(); ?>index.php/register/tomedia/<?php echo $reg->id; ?>/<?php echo $reg->outward_invoices[$out_cnt]->inv_id; ?>/printOutwardInv/dummyvalue/"><?php echo $reg->outward_invoices[$out_cnt]->inv_id; ?></a>
	                        	<?php 
	                        		} else {
										echo '';
									}
	                        	}
	                        	?>
	                        	</td>
	                        	</tr>
                        	</tbody>
							<tr>                               
                                <td>
                                    <input type="hidden" name="doc_id" id="invoices_doc_id" value=""/>
                                    <input type="hidden" name="register_id" id="invoices_doc_register_id" value=""/>
                                    <input type="hidden" name="edit_start_date" id="invoices_edit_start_date" value=""/>
                                    <input type="button" name="submit_invoicesDoc" value="Register Invoices" onclick="listInvoices();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>
                        
            <div id="outward_document" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Mark Outward Document</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmOutwardDocument" id="frmOutwardDocument" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr style="cellspacing:10">
                                <td>Surrender By</td>
                                <td>
                                    <?php echo form_dropdown('by_employee', $employees); ?>
                                </td>
                                <td>Mode of Receipt</td>
                                <td> 
                                    <?php echo form_dropdown('mode_of_receipt', $mode_receipt); ?>
                                </td>
							</tr>
							<tr>                               
                                <td>
                                    <input type="hidden" name="doc_id" id="outward_doc_id" value=""/>
                                    <input type="hidden" name="register_id" id="outward_doc_register_id" value=""/>
                                    <input type="hidden" name="edit_start_date" id="outward_edit_start_date" value=""/>
                                    <input type="button" name="submit_outwardDoc" value="Mark Outward" onclick="outwardDocument();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>     

            <div id="inward_document" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Mark Inward Document</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmInwardDocument" id="frmInwardDocument" onsubmit="return false;">
                        <table cellpadding="1">
                            <tr style="cellspacing:10">
                                <td>Received By</td>
                                <td>
                                    <?php echo form_dropdown('by_employee', $employees); ?>
                                </td>
                                <td>Mode of Receipt</td>
                                <td>
                                    <?php echo form_dropdown('mode_of_receipt', $mode_receipt); ?>
                                </td>
							</tr>
							<tr>                               
                                <td>
                                    <input type="hidden" name="doc_id" id="inward_doc_id" value=""/>
                                    <input type="hidden" name="register_id" id="inward_doc_register_id" value=""/>
                                    <input type="hidden" name="edit_start_date" id="inward_edit_start_date" value=""/>
                                    <input type="button" name="submit_inwardDoc" value="Mark Inward" onclick="inwardDocument();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>

            <div id="outward_register" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Mark Outward Register</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmOutwardRegister" id="frmOutwardRegister" onsubmit="return false;">
                        <table cellpadding="1">
<!--                            <tr>-->
<!--                                <td>-->
<!--                                    Remarks-->
<!--                                </td>            -->
<!--                                <td>-->
<!--                                    <textarea name="remarks" cols="40" value=""></textarea>-->
<!--                                </td>-->
<!--                            </tr>        -->
                            <tr style="cellspacing:10">
                                <td>Surrender By</td>
                                <td>
                                    <?php echo form_dropdown('by_employee', $employees); ?>
                                </td>
                                <td>Mode of Receipt</td>
                                <td>
                                    <?php echo form_dropdown('mode_of_receipt', $mode_receipt); ?>
                                </td>
                            </tr>                    
                            <tr>
                                <td>
                                    <input type="hidden" name="register_id" id="outward_register_id" value=""/>
                                    <input type="button" name="submit_outwardRegister" value="Mark Outward" onclick="outwardRegister();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>     

            <div id="inward_register" style="display:none">
                <h3 id="sub_heading" style="float:left;margin-left: 5px;">Mark Inward Register</h3>
                <p style="float:right;margin-right: 5px;"><a href="#" onclick="return closeBox();">Close</a></p>
                <div style="clear:both;" style="">
                    <form name="frmInwardRegister" id="frmInwardRegister" onsubmit="return false;">
                        <table cellpadding="1">
<!--                            <tr>-->
<!--                                <td>-->
<!--                                    Remarks-->
<!--                                </td>            -->
<!--                                <td>-->
<!--                                    <textarea name="remarks" cols="40" value=""></textarea>-->
<!--                                </td>-->
<!--                            </tr>        -->
                            <tr style="cellspacing:10">
                                <td>Received By</td>
                                <td>
                                    <?php echo form_dropdown('by_employee', $employees); ?>
                                </td>
                                <td>Mode of Receipt</td>
                                <td>
                                    <?php echo form_dropdown('mode_of_receipt', $mode_receipt); ?>
                                </td>
                            </tr>                    
                            <tr>
                                <td>
                                    <input type="hidden" name="register_id" id="inward_register_id" value=""/>
                                    <input type="button" name="submit_inwardRegister" value="Mark Inward" onclick="inwardRegister();"/>
                                </td>
                            </tr>
                        </table>
                    </form>    
                </div>     
            </div>

            <div class="tab_container">
                <div class="document_list">
                    <div id="tab1" class="tab_content">
                        <div>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>                  
                        <?php $cnt = count($registers); ?>
                        <input type="hidden" name="doc_id" id="selected_doc_id" value="<?php
                        if ($cnt < 1) {
                            echo '';
                        } else {
                            echo $registers[0]->id;
                        }
                        ?>"/>
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
                                <tr>
                                    <th rowspan="1"></th>                                    
                                    <th rowspan="1">ID</th>
                                    <th rowspan="1" align="center">Status</th>
                                    <th rowspan="1">Date</th>
                                    <th rowspan="1">Client</th>
                                    <th rowspan="1">Type</th>
                                    <th rowspan="1" colspan="3" align="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>                            
								<?php
                                $i = 1;
                                foreach ($registers as $register) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="radio" name="select" value="selected" <?php if ($i == 1) { ?>checked<?php } ?> onclick="captureDocId(<?php echo $register->id; ?>)"/>
                                        </td>                                        
                                        <td><?php echo $register->id; ?></td>
                                        <?php if ($register->status == 'inward') { ?>
                                            <td align="center"><label style="visibility:hidden">1</label><img src="<?php echo base_url(); ?>/assets/img/new/Inward.png"/></td>
                                        <?php } else if ($register->status == 'outward') { ?>
                                            <td align="center"><label style="visibility:hidden">2</label><img src="<?php echo base_url(); ?>/assets/img/new/Outward.png"/></td>
                                        <?php } else if ($register->status == 'in_out') { ?>                                        
                                        	<td align="center"><label style="visibility:hidden">1</label><img src="<?php echo base_url(); ?>/assets/img/new/IO2.png"/></td>
                                        <?php } ?>
                                        <td><?php echo $register->create_date; ?></td> 
                                        <td><?php echo $register->client_name; ?></td>
                                        <td><?php echo strtoupper($register->type); ?></td>

                                        <td><a href="<?php echo base_url(); ?>index.php/register/tomedia/<?php echo $register->id; ?>/print/novalue/"><img src="<?php echo base_url(); ?>/assets/img/printer_green 32_32.png"/></a></td>
                                        <td><a href="#<?php echo $registers[0]->id; ?>#<?php echo mdate('%Y-%m-%d %H:%i:%s', gmt_to_local(now(),'UP45',TRUE)) ?>" class="listInvoices"><img src="<?php echo base_url(); ?>/assets/img/printer_green 32_32.png"/></a></td>
                                        <td><a href="<?php echo base_url(); ?>index.php/register/get/<?php echo $register->id; ?>"><img src="<?php echo base_url(); ?>/assets/img/pencil.png"/></a></td>
                                        <?php if ($register->status == 'inward') { ?>
                                            <td><a href="#<?php echo $register->id; ?>" class="outwardRegister">O</a></td>
                                        <?php } else if ($register->status == 'outward') { ?>
                                            <td><a href="#<?php echo $register->id; ?>" class="inwardRegister">I</a></td>
                                        <?php } else { ?>
                                            <td>/</td>
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
            <h3 class="tabs_involved">Transactions</h3>
        </header>
        <div class="tab_container">
            <div class="document_list">
                <div id="show_doc_trans">
                    <table class="tablesorter" cellspacing="0"> 
                        <thead> 
                            <tr>
<!--                                 <th rowspan="1">No</th> -->
                                <th rowspan="1">Doc#</th>
                                <th rowspan="1">Emp</th>
<!--                                 <th rowspan="1">Reg Status</th>  -->
                                <th rowspan="1">Date</th>
                                <th rowspan="1">Type</th>
                            </tr>
                        </thead>
                        <tbody>                            
		                	<?php if (count($registers) >= 1){ ?>
			                    <?php $transaction = $registers[0]->trans; ?>
	                            <?php $i = 1; foreach ($transaction as $tr) { ?>
	                                <tr>
	                                    <!-- <td><?php echo $i; ?></td> -->
	                                    <td><?php echo $tr->doc_id; ?></td>
	                                    <td><?php echo $tr->emp; ?></td>
	                                    <!-- <td><?php echo $tr->reg_status; ?></td> -->
	                                    <td><?php echo $tr->trans_date; ?></td>
	                                    <td><?php echo $tr->trans_type; ?></td>
	                                </tr>
	                            <?php $i++; } } ?>
                        </tbody>
                    </table>                        
                </div>
            </div>
        </div>        
    </article>    
    <div class="clear"></div>
    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Documents</h3>
        </header>
        <div class="tab_container">
            <div class="document_list">
            	<div id="show_docs">
                    <div id="tab1" class="tab_content">
                    	<?php 
                    	if (count($registers) >= 1){
                    		$cnt = count($registers[0]->particulars); 
                    	}?>
                        <input type="hidden" name="doc_id" id="selected_doc_id" value="<?php
                        if (count($registers) < 1) {
                            echo '';
                        } else {
                            echo $registers[0]->id;
                        }
                        ?>"/>
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
                                <tr>
                                    <th rowspan="1">ID</th>
                                    <th rowspan="1">Particulars</th>
                                    <th rowspan="1">Tag</th>
                                    <th rowspan="1">Status</th>
                                    <th rowspan="1">By Employee</th>
                                    <th rowspan="1">Mode of Receipt</th>
                                   	<th rowspan="1">Action</th>
                                </tr>
                            </thead>
                            <tbody>                            
							<?php
							if (count($registers) >= 1){
                                $i = 1;
                                $particulars = $registers[0]->particulars;
                                foreach ($particulars as $particular) {
                                    ?>
                                    <tr>
                                        <td><?php echo $particular->doc_id; ?></td>
                                        <td style="width: 300px"><?php echo $particular->particulars; ?></td> 
                                        <td><?php echo $particular->tag; ?></td>
                                        <?php if ($particular->status == 'inward') { ?>
                                            <td><label style="visibility:hidden">1</label><img src="<?php echo base_url(); ?>/assets/img/new/Inward.png"/></td>
                                        <?php } else { ?>
                                            <td><label style="visibility:hidden">2</label><img src="<?php echo base_url(); ?>/assets/img/new/Outward.png"/></td>
                                        <?php } ?>                                        
                                        <td><?php echo $particular->by_employee_name; ?></td>
                                        <td><?php echo $particular->mode_of_receipt; ?></td>
                                        <?php if ($particular->status == 'inward') { ?>
                                            <td><a href="#<?php echo $registers[0]->id; ?>#<?php echo $particular->doc_id; ?>#<?php echo mdate('%Y-%m-%d %H:%i:%s', gmt_to_local(now(),'UP45',TRUE)) ?>" class="outwardDocument">O</a></td>
                                        <?php } else { ?>
                                            <td><a href="#<?php echo $registers[0]->id; ?>#<?php echo $particular->doc_id; ?>#<?php echo mdate('%Y-%m-%d %H:%i:%s', gmt_to_local(now(),'UP45',TRUE)) ?>" class="inwardDocument">I</a></td>
                                        <?php } ?>
                                    </tr>
                                    
                                    <?php
                                    $i++;
                                }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
				</div>	
            </div>
        </div>        
    </article>
    
</section>