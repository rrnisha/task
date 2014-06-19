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
<section id="main" class="column">
	<article class="module width_half">
		<header>
			<h3 class="tabs_involved">Inward Invoices</h3>
		</header>
		<div class="tab_container">
			<div class="document_list">
				<div id="tab1" class="tab_content">
                	<?php 
                		$reg_cnt = count($registers);
                		$inw_inv_cnt = count($inward_invoices_no);
                		$reg = $registers[0];
                	?>
                    <input type="hidden" name="selected_inward_inv_id" id="selected_inward_inv_id" value="<?php
                        if ($inw_inv_cnt < 1) {
                            echo '';
                        } else {
                            echo $inward_invoices_no[0]->inv_id;
                        }
					?>"/>
					<input type="hidden" name="reg_id" id="selected_reg_id"
						value="<?php
                    	if ($reg_cnt < 1) {
                            echo '';
                        } else {
                            echo $registers[0]->id;
                        }
					?>" />
					<table class="tablesorter" cellspacing="0">
					<thead>
						<th></th>
						<th>Id</th>
						<th>Invoice No</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							$k=1;
							foreach ($inward_invoices_no as $inv) {
						?>
                        <tr>
                        	<td>
                            	<input type="radio" name="select_inw" value="selected" <?php if ($k==1) { ?>checked="true"<?php } ?> onclick="captureInwardInvId(<?php echo '\''.$inv->inv_id.'\''; ?>)"/>
							</td>
							<td>
                        		<?php echo $inv->id; ?>
                        	</td>
							<td>
                        		<?php echo $inv->inv_id; ?>
                        	</td>
                        	<td><a href="<?php echo base_url(); ?>index.php/register/tomedia/<?php echo $reg->id; ?>/<?php echo $inv->inv_id; ?>/printInwardInv/emptyvalue/print"><img src="<?php echo base_url(); ?>/assets/img/printer_green 32_32.png"/></a></td>
						</tr>
						<?php $k++; } ?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</article>
	<article class="module width_half">
		<header>
			<h3 class="tabs_involved">Outward Invoices</h3>
		</header>
		<div class="tab_container">
			<div class="document_list">
				<div id="tab1" class="tab_content">
                	<?php 
                		$reg_cnt = count($registers); 
                		$outw_inv_cnt = count($outward_invoices_no);
                		$reg = $registers[0];
                	?>
                    <input type="hidden" name="selected_outward_inv_id" id="selected_outward_inv_id" value="<?php
                        if ($outw_inv_cnt < 1) {
                            echo '';
                        } else {
                            echo $outward_invoices_no[0]->inv_id;
                        }
					?>"/>                	
					<input type="hidden" name="reg_id" id="selected_reg_id"
						value="<?php
                    	if ($reg_cnt < 1) {
                            echo '';
                        } else {
                            echo $registers[0]->id;
                        }
					?>" />
					<table class="tablesorter" cellspacing="0">
					<thead>
						<th></th>
						<th>Id</th>
						<th>Invoice No</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							$j=1;	
							foreach ($outward_invoices_no as $inv) {
						?>
                        <tr>
                        	<td>
                            	<input type="radio" name="select_outw" value="selected" <?php if ($j==1) { ?>checked="true"<?php } ?> onclick="captureOutwardInvId(<?php echo '\''.$inv->inv_id.'\''; ?>)"/>
							</td>
							<td>
                        		<?php echo $inv->id; ?>
                        	</td>
							<td>
                        		<?php echo $inv->inv_id; ?>
                        	</td>
                        	<td><a href="<?php echo base_url(); ?>index.php/register/tomedia/<?php echo $reg->id; ?>/<?php echo $inv->inv_id; ?>/printOutwardInv/emptyvalue/print"><img src="<?php echo base_url(); ?>/assets/img/printer_green 32_32.png"/></a></td>
						</tr>
						<?php $j++; } ?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</article>
	<div class="clear"></div>
	<article class="module width_half">
		<header>
			<h3 class="tabs_involved">Inward Invoice Details</h3>
		</header>
		<div class="tab_container">
			<div class="document_list">
				<div id="show_inward_inv_details">
					<div id="tab1" class="tab_content">
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
					</div>
				</div>
			</div>
		</div>
	</article>
	<article class="module width_half">
		<header>
			<h3 class="tabs_involved">Outward Invoice Details</h3>
		</header>
		<div class="tab_container">
			<div class="document_list">
				<div id="show_outward_inv_details">
					<div id="tab1" class="tab_content">
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
							<?php foreach ($outward_invoices as $inv) { ?>
								<tr>
									<td><?php echo $inv->inv_id; ?></td>
									<td><?php echo $inv->date; ?></td>
									<td><?php echo $inv->particulars; ?></td>
									<td><?php echo $inv->fin_year; ?></td>
                                </tr>
							<?php } ?>
                            </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>