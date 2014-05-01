<script type="text/javascript">
function captureOutwardInvId(invId) {
	document.getElementById("selected_outward_inv_id").value = invId;
	showOutwardInvoices();
}

function showOutwardInvoices() {
	var invId = document.getElementById("selected_outward_inv_id").value;
	$.get("<?php echo base_url(); ?>index.php/register/list_outward_invoices/" + invId).done(function(data) {
		$('#show_outward_inv_details').html(data);
	});
}
</script>
						<table class="tablesorter" cellspacing="0">
							<thead>
								<tr>
									<th rowspan="1">ID</th>
									<th rowspan="1">Date</th>
									<th rowspan="1">Particulars</th>
									
									<th rowspan="1">Mode of Receipt</th>
								</tr>
							</thead>
							<tbody>                            
							<?php foreach ($outward_invoices as $inv) { ?>
								<tr>
									<td><?php echo $inv->inv_id; ?></td>
									<td><?php echo $inv->date; ?></td>
									<td><?php echo $inv->particulars; ?></td>
									<td><?php echo $inv->mode_of_receipt; ?></td>
                                </tr>
							<?php } ?>
                            </tbody>
						</table>
