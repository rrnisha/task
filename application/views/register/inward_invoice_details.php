<script type="text/javascript">
function captureInwardInvId(invId) {
	document.getElementById("selected_inward_inv_id").value = invId;
	showInwardInvoices();
}

function showInwardInvoices() {
	var invId = document.getElementById("selected_inward_inv_id").value;
	$.get("<?php echo base_url(); ?>index.php/register/list_inward_invoices/" + invId).done(function(data) {
		$('#show_inward_inv_details').html(data);
	});
}

</script>

						<table class="tablesorter" cellspacing="0">
							<thead>
								<tr>
									<th rowspan="1">ID</th>
									<th rowspan="1">Date</th>
									<th rowspan="1">Particulars</th>
									<th rowspan="1">Financial Year</th>
								</tr>
							</thead>
							<tbody>                            
							<?php foreach ($inward_invoices as $inv) { ?>
								<tr>
									<td><?php echo $inv->inv_id; ?></td>
									<td><?php echo $inv->date; ?></td>
									<td><?php echo $inv->particulars; ?></td>
									<td><?php echo $inv->fin_year; ?></td>
                                </tr>
							<?php } ?>
                            </tbody>
						</table>
