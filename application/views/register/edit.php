<script>

function markParticularsChanged(id){
	var docId = document.getElementById("particularsID"+id);
	if (docId !=null){
		document.getElementById("particularsChanged"+id).value = 'Y';
	}else {
		document.getElementById("particularsChanged"+id).value = 'NEW';
	}	
}
<?php $cnt = count($particulars);?>
function addParticularsRow(r){
	var rc = document.getElementById("rowCount").value;
	document.getElementById("rowCount").value = ++rc;
	i = rc;
	$(".particularsRow:last").after('<tr class="particularsRow">'
			+'<td><a onclick="removeParticulars('+i+',this)"><img src="<?php echo base_url(); ?>/assets/img/delete.png"/></a></td>'
			+'<td><fieldset><input type="text" name="particulars[]" value="" onchange="markParticularsChanged('+i+')"/></fieldset></td>'
//			+'<td><fieldset><input style="width:100px;" type="text" name="quantity[]" value="" onchange="markParticularsChanged('+i+')"/></fieldset></td>'
			+'<td>'
			+'<?php $select = form_dropdown('by_employee[]', $employees); $ar = explode("\n", $select); foreach ($ar as $s)	{ echo $s; } ?></td>'
			+'<td>'
			+'<?php $select = form_dropdown('mode_of_receipt[]', $mode_receipt); $ar = explode("\n", $select); foreach ($ar as $s)	{ echo $s; } ?></td>'
			+'<td><fieldset><input style="width:200px;" type="text" name="tag[]" value="" onchange="markParticularsChanged('+i+')"/></fieldset></td>'
			+'<td><a onclick="addParticularsRow(this)"><img src="<?php echo base_url(); ?>/assets/img/add.png"/></a></td></tr>');
	$(".docHiddenParticulars:last").after('<tr class="docHiddenParticulars">'
			+'<td></td>'
			+'<td><input type="hidden" name="particularsID[]"  value=""/>'
			+'<input type="hidden" name="particularsRowID[]" value="'+i+'"/>'
			+'<input type="hidden" name="particularsChanged[]" id="particularsChanged'+i+'" value="<?php echo "NEW"; ?>"/></td>'
			+'<td></td>'
			+'<td></td>'
			+'</tr>');
}

function removeParticulars(id,r){
	var docIdCreated = document.getElementById("particularsID"+id);
	var userConfirm = confirm('Sure wanna delete');
//	if (docIdCreated == null){
//		userConfirm = true;
//	}
//	else { 
//		userConfirm = confirm('Sure wanna delete');
//	}

	if (userConfirm==true)
	{
		var i=r.parentNode.parentNode.rowIndex;
		var docsCnt = $("#particularsTable").find("tbody").find("tr").length;
		if (docsCnt==1){
			alert("Delete complete registry instead of a single document");
		}else{
			
			if (docIdCreated == null) {
				document.getElementById('particularsTable').deleteRow(i);
				document.getElementById('particularsHiddenTable').deleteRow(i-1);
			} 
			else {
				var dv = document.getElementById('particularsDeleted').value;
				if (dv == '')
					dv = docIdCreated.value;
				else
					dv = dv + ":" + docIdCreated.value;	
				document.getElementById('particularsDeleted').value = dv;
				document.getElementById('particularsTable').deleteRow(i);
				document.getElementById('particularsHiddenTable').deleteRow(i-1);
			}
		}
	}else{
		//do nothing
	}
}

</script>
<section id="main" class="column">
    <article class="module width_full">
        <header><h3>Edit Document</h3></header>
        <div class="module_content" >
            <!-- TODO : To Fix Error Link -->
            <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
                <form name="frmEditDocument" id="frmEditDocument" method="post" action="<?php echo base_url(); ?>index.php/register/edit/">    
                    <input type="hidden" name="id" value="<?php echo $register->id; ?>"></input>
                    <input type="hidden" id="rowCount" name="rowCount" value="<?php echo count($particulars); ?>"></input>
                    <input type="hidden" id="particularsDeleted" name="particularsDeleted" value=""></input>
                    <input type="text" id="edit_start_date" name="edit_start_date" value="<?php echo $edit_start_date ?>"></input>
                    <fieldset>
                        <label>Client</label>
                        <?php echo form_dropdown('client_id', $clients, $register->client_id); ?>
                    </fieldset>                    
                    <fieldset>
                        <label>Status</label>
                        <input type="radio" name="status" value="inward" disabled <?php if ($register->status == 'inward') { ?>checked<?php } ?>/> Inward
                        <input type="radio" name="status" value="outward" disabled <?php if ($register->status == 'outward') { ?>checked<?php } ?>/> Outward
                        <input type="radio" name="status" value="in_out" disabled <?php if ($register->status == 'in_out') { ?>checked<?php } ?>/> InOut
                    </fieldset>                    
	                <fieldset>
	                    <label>Type</label>
	                    <input type="radio" name="type" value="tds" <?php if ($register->type == 'tds') { ?>checked<?php } ?>/> TDS
	                    <input type="radio" name="type" value="it" <?php if ($register->type == 'it') { ?>checked<?php } ?>/> IT
	                    <input type="radio" name="type" value="st" <?php if ($register->type == 'st') { ?>checked<?php } ?>/> Service Tax
	                    <input type="radio" name="type" value="books" <?php if ($register->type == 'books') { ?>checked<?php } ?>/> Account Books
	                	<input type="radio" name="type" value="intimation" <?php if ($register->type == 'intimation') { ?>checked<?php } ?>/> Intimation
	                	<input type="radio" name="type" value="vat" <?php if ($register->type == 'vat') { ?>checked<?php } ?>/> VAT
	                    <input type="radio" name="type" value="others" <?php if ($register->type == 'others') { ?>checked<?php } ?>/> Other
	                </fieldset>    
                    <input type="hidden" name="status_value" value="<?php if ($register->status == 'inward') { echo "inward"; } else if ($register->status == 'outward') { echo "outward"; } else if ($register->status == 'in_out') { echo "in_out"; } ?>" />
	                <table id="particularsTable" class="tablerow" cellspacing="0">
						<thead>
						<tr>
							<th></th>
							<th>Particulars</th>
<!--							<th>Quantity</th>-->
							<th>By Employee</th>
							<th>Mode of Receipt</th>
							<th>Tag</th>
							<th></th>
						</tr>
						</thead>
					
						<tbody id="docParticulars">
		                    <?php $i=1; foreach ($particulars as $particular) { ?>
							<tr class="particularsRow">
								<td>
									<a onclick="removeParticulars(<?php echo $i; ?>,this)">
										<img src="<?php echo base_url(); ?>/assets/img/delete.png"/>
									</a>
								</td>
								<td>
									<fieldset><input type="text" name="particulars[]" value="<?php echo $particular->particulars; ?>" onchange="markParticularsChanged(<?php echo $i; ?>)"/></fieldset>
								</td>
<!--								<td>-->
<!--									<fieldset><input style="width:100px;" type="text" name="quantity[]" value="<?php echo $particular->quantity; ?>" onchange="markParticularsChanged(<?php echo $i; ?>)"/></fieldset>-->
<!--								</td>-->
								<td>
									<?php $js = 'onchange="markParticularsChanged('.$i.')"'; echo form_dropdown("by_employee[]", $employees, $particular->by_employee, $js); ?>
								</td>
								<td>
									<?php $js = 'onchange="markParticularsChanged('.$i.')"'; echo form_dropdown('mode_of_receipt[]', $mode_receipt, $particular->mode_of_receipt, $js); ?>	
								</td>
								<td>
									<fieldset><input type="text" style="width:200px;" name="tag[]" value="<?php echo $particular->tag; ?>" onchange="markParticularsChanged(<?php echo $i; ?>)"/></fieldset>
								</td>
								<td>
									<a onclick="addParticularsRow(this)">
										<img src="<?php echo base_url(); ?>/assets/img/add.png"/>
									</a>
								</td>
							</tr>
							
							<?php $i++; } ?>							
						</tbody>
					</table>
					<table id="particularsHiddenTable" class="tablerow" cellspacing="0">						
						<tbody>
							<?php $i=1; foreach ($particulars as $particular) { ?>
							<tr class="docHiddenParticulars">
								<td>
								</td>
								<td>
								<input type="hidden" name="particularsID[]" id="particularsID<?php echo $i; ?>" value="<?php echo $particular->doc_id; ?>"/>
								<input type="hidden" name="particularsRowID[]" value="<?php echo $i; ?>"/>
		                        <input type="hidden" name="particularsChanged[]" id="particularsChanged<?php echo $i; ?>" value="<?php echo "N"; ?>"/>									
								</td>
								<td>
								</td>
								<td>
								</td>
							</tr>
							<?php $i++; } ?>							
						</tbody>
					</table>
                    <footer>
                        <div class="submit_link">    
                            <input type="submit" name="edit" value="Ok"/>
                            <a href="<?php echo base_url(); ?>index.php/register/lists"><input type="button" name="cancel" value="Back"/></a>
                        </div>
                    </footer>                     
                </form>    
            </div>
    </article>
    </section>   