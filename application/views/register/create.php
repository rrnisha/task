<script type="text/javascript" src="<?php echo base_url() ?>assets/js/select2.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.css" />
<script>
$(document).ready(function() { 
	$("#client_select").select2({ 
	}); 
});
function addParticularsRow(){
	$(".particularsRow:last").after('<tr class="particularsRow"><td><a onclick="removeParticularsRow(this)"><img src="<?php echo base_url(); ?>/assets/img/delete.png"/></a></td>'
			+'<td><fieldset><input style="width:300px;" type="text" name="particulars[]" value="<?php echo set_value('particulars[]'); ?>" /></fieldset></td>'
			+'<td>'
			+'<?php $select = form_dropdown('by_employee[]', $employees, $values['by_employee']); $ar = explode("\n", $select); foreach ($ar as $s)	{ echo $s; } ?></td>'
			+'<td>'
			+'<?php $select = form_dropdown('mode_of_receipt[]', $mode_receipt, $values['mode_of_receipt']); $ar = explode("\n", $select); foreach ($ar as $s)	{ echo $s; } ?></td>'
			+'<td><fieldset><input style="width:100px;" type="text" name="tag[]" value="<?php echo set_value('tag[]'); ?>" "/></fieldset></td>'
			+'<td><a onclick="addParticularsRow()"><img src="<?php echo base_url(); ?>/assets/img/add.png"/></a></td></tr>');
}

function removeParticularsRow(r){
	var docsCnt = $("#particularsTable").find("tbody").find("tr").length;	
	if (docsCnt!=1){
		var userConfirm = confirm('Sure wanna delete');
		if (userConfirm == true)
		{	
			var i=r.parentNode.parentNode.rowIndex;
			document.getElementById('particularsTable').deleteRow(i);
		} else {
			// do nothing
		}
	}
}

</script>
<section id="main" class="column">
    <article class="module width_full">
        <header>
        	<h3>Create New Register</h3>
        </header>
        <div class="module_content">
           <form name="frmCreateDocument" id="frmCreateDocument" method="post" action="<?php echo base_url(); ?>index.php/register/create">
                    <fieldset>
                        <label class="required" <?php if (form_error('client_id') !='') echo 'style="color:red;font-style:normal"'; ?> >Client</label>
                        <?php $js = 'id="client_select"'; echo form_dropdown('client_id', $clients, $values['client_id'], $js); ?>
                    </fieldset>
                	<fieldset>		
                    	<label class="required" <?php if (form_error('type') !='') echo 'style="color:red;font-style:normal"'; ?> >Type</label>
                    	<?php foreach ($types as $type) { ?>
                    		<?php 
                    			echo form_radio($type); 
                    			echo ' '.$type['ui_desc'].' ';
                    		?>
                    	<?php } ?>
                	</fieldset>	                                         
                    <fieldset>
                        <label>Status</label>
                        <input type="radio" name="status" value="inward" <?php if ($values['status'] == 'inward') { ?>checked<?php } ?>/> Inward
<!--                        <input type="radio" name="status" value="outward" <?php if ($values['status'] == 'outward') { ?>checked<?php } ?>/> Outward-->
                    </fieldset>
					<table id="particularsTable" class="tablerow" cellspacing="0">
						<thead>
						<tr>
							<th></th>
							<th class="required" <?php if (form_error('particulars[]') !='') echo 'style="color:red;font-style:normal"'; ?> >Particulars</th>
<!--							<th class="required">Quantity</th>-->
							<th class="required" <?php if (form_error('by_employee[]') !='') echo 'style="color:red;font-style:normal"'; ?> >By Employee</th>
							<th class="required" <?php if (form_error('mode_of_receipt[]') !='') echo 'style="color:red;font-style:normal"'; ?> >Mode of Receipt</th>
							<th class="required" <?php if (form_error('tag[]') !='') echo 'style="color:red;font-style:normal"'; ?> >Tag</th>							
							<th></th>
						</tr>
						</thead>
					
						<tbody id="docParticulars">
							<tr class="particularsRow">
								<td>
									<a onclick="removeParticularsRow(this)">
										<img src="<?php echo base_url(); ?>/assets/img/delete.png"/>
									</a>
								</td>
								<td>
									<fieldset><input type="text" style="width:300px;" name="particulars[]" value="<?php echo set_value('particulars[]'); ?>" /></fieldset>
								</td>
								<td>
									<?php echo form_dropdown('by_employee[]', $employees, $values['by_employee']); ?>
								</td>
								<td>
									<?php echo form_dropdown('mode_of_receipt[]', $mode_receipt, $values['mode_of_receipt']); ?>
								</td>
								<td>
									<fieldset><input type="text" style="width:100px;" name="tag[]" value="<?php echo set_value('tag[]'); ?>" /></fieldset>
								</td>
								<td>
									<a onclick="addParticularsRow()">
										<img src="<?php echo base_url(); ?>/assets/img/add.png"/>
									</a>
								</td>
							</tr>
						</tbody>
					</table>	
					<footer>
                        <div class="submit_link">    
                            <input type="submit" name="create" value="Create" />
                            <a href="<?php echo base_url(); ?>index.php/register/lists"><input type="button" name="cancel" value="Cancel"/></a>
                        </div>
                    </footer>                     
            </form>    
        </div>
    </article>
</section>   