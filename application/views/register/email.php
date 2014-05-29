<section id="main" class="column">
	<article class="module width_full">
		<div id="emailRegister" class="module_content">
			<input type="hidden" name="id" value="<?php echo $register->id; ?>"></input>
			<div>
				<p readonly style="height: 40px; width: 100%; margin: 20px 0; background: #F1F1F4; text-align: center; color: black; font: bold 15px Cambria,Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; border: 0 none; overflow: hidden; resize: none;">
<?php if ($flag == 'print' || $flag == 'edit' || $flag == 'create'){ echo 'INWARD INVOICE';  ?><?php } ?>
<?php if ($flag == 'inwardDoc' || $flag == 'inwardRegister'){ echo 'INWARD INVOICE' ?><?php } ?>
<?php if ($flag == 'outwardDoc' || $flag == 'outwardRegister'){ echo 'OUTWARD INVOICE' ?><?php } ?>				
				</p>
			</div>
			<div>
            <textarea readonly style="resize:none; width: 300px; height: 90px; float: left; font: 14px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden;">
<?php echo strtoupper($register->company_name). PHP_EOL; ?>            
#63, East Vanniar Street
West KK Nagar, Chennai 600078
Phone: 91-44-23643710</textarea>
            <div style="text-align: right; float: right; position: relative; margin-top: 0px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden;">
<!--               <img id="image" src="logo.png" alt="logo" /> -->
            	<p readonly style="height: 40px; width: 100%; margin: 20px 0; text-align: center; color: black; font: bold 25px Cambria,Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 18px 0px; border: 0 none; overflow: hidden; resize: none;">
            	<?php echo strtoupper($register->company_name). PHP_EOL; ?>
            	</p>
            </div>
			</div>
			<div style="clear:both"></div>
				
			<div>
	            <p style="width: 200px; height: 70px; float: left; font: 20px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow: hidden; resize: none;" readonly><?php echo $register->client_name; "\n" ?></p>  
<!--<?php $addLine = explode(',', $register->address); foreach ($addLine as $line) {
echo $line;
?> <?php } ?></textarea>-->
	
	            <table style="border-collapse: collapse; margin-top: 1px; margin-right: 15px; width: 200px; float: right;">
	                <tr>
	                    <td style="text-align: left; background: #F1F1F4; border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif;">Invoice #</td>
	                    <td style="border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif; width:100px; text-align: right;" ><?php echo $invoice_id; ?></td>
	                </tr>
	                <tr>
	
	                    <td style="text-align: left; background: #F1F1F4; border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif;">Date</td>
	                    <td style="border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif; width:100px; text-align: right;" ><?php echo $invoice_create_date; ?></td>
	                </tr>
	            </table>
			
			</div>		
			<div>
	            <textarea style="width: 100%; height: 50px; float: left; font: 20px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow: hidden; resize: none;" readonly>
<?php if ($flag == 'print' || $flag == 'edit' || $flag == 'create'){ echo 'Received with thanks the following documents' ?><?php } ?>
<?php if ($flag == 'inwardDoc' || $flag == 'inwardRegister'){ echo 'Received with thanks the following documents' ?><?php } ?>
<?php if ($flag == 'outwardDoc' || $flag == 'outwardRegister'){ echo 'Verified and returned with thanks' ?><?php } ?>				
				</textarea>
			</div>
			<div style="clear:both"></div>		
			<div id="tab1" class="tab_content">
				<table style="width: 100%; margin: 0 0 0 0; font-size: 13px;" cellspacing="0">
					<thead>
						<tr style="height: 34px; background: url(<?php echo base_url(); ?>assets/img/table_sorter_header.png) repeat-x; text-align: left; text-indent: 6px; cursor: pointer;">
							<th rowspan="1">SNo</th>
							<th rowspan="1">Date</th>
							<th rowspan="1">Particulars</th>
<!--							<th rowspan="1">Quantity</th>-->
							<th rowspan="1">Receipt Mode</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($particulars as $particular) {
							?>
							<tr>
								<td style="margin: 0; padding: 20px 5px 0px; border-bottom: 1px dotted #ccc;"><?php echo $i; ?></td>
								<td style="margin: 0; padding: 20px 5px 0px; border-bottom: 1px dotted #ccc;"><?php echo $particular->create_date; ?></td>
								<td style="margin: 0; padding: 20px 5px 0px; border-bottom: 1px dotted #ccc;"><?php echo $particular->particulars; ?></td>
								<!--<td style="margin: 0; padding: 20px 5px 0px; border-bottom: 1px dotted #ccc;"><?php echo $particular->quantity; ?></td>-->
								<td style="margin: 0; padding: 20px 5px 0px; border-bottom: 1px dotted #ccc;"><?php echo $particular->mode_of_receipt; ?></td>
								<!--
								<?php if ($particular->type == 'inward') { ?>
								<td style="margin: 0; padding: 20px 5px 0px; border-bottom: 1px dotted #ccc;"><?php echo $particular->received_by_name; ?></td>
								<?php } else { ?>
								<td style="margin: 0; padding: 20px 5px 0px; border-bottom: 1px dotted #ccc;"><?php echo $particular->surrender_by_name; ?></td>
								<?php } ?>
								-->
								
							</tr>
							<?php
							$i++;
						}
						?>
					</tbody>
				</table>
			</div>
			<div style="clear:both"></div>
			<div>
				<br>
				<br>
				<br>
				<br>
				<br>
	        	<p readonly style="resize:none; width: 100%; height: 20px; text-align: right; font: 14px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden;">
	        			<?php echo $_SESSION['emp_name']; ?></p>
	        	<p readonly style="resize:none; width: 100%; height: 20px; text-align: right; font: 14px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden;">
	        	       	For <?php echo strtoupper($register->company_name). PHP_EOL; ?></p>
			</div>
		</div>
	</article>
</section>

