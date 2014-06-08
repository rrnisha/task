<script type="text/javascript">
function printDiv( divId, filename ){
//    w=window.open('','print div','height=600,width=600');
	persistInvoice();
	w=window.open();
//    w.document.write('<html>\n'
//    	    +' <head>\n'
//    	    +' <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/print.css" type="text/css" media="screen"/>\n '
//    	    +' </head>\n'
//    	    +' <body> <div class="module_content">\n');
    w.document.write($('#'+divId).html());
    w.document.write('\n</div>\n</body>\n</html>');
    w.document.title = filename;
    w.print();
    w.close();
}

function persistInvoice() {
	
}
</script>
<section id="main" class="column">
	<article class="module width_full">
		<header>
			<h3>Email/Print Document</h3>
		</header>
		<div id="printRegister" class="module_content">
			<input type="hidden" name="id" value="<?php echo $register->id; ?>"></input>
			<input type="hidden" name="email" value="<?php echo $register->email; ?>"></input>
			<div>
				<textarea readonly style="height: 40px; width: 100%; margin: 20px 0; background: #F1F1F4; text-align: center; color: black; font: bold 15px Cambria,Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; border: 0 none; overflow: hidden; resize: none;">
<?php if ($flag == 'edit'){ echo 'ERRATA INVOICE';  ?><?php } ?>				
<?php if ($flag == 'create' || $flag == 'printInwardInv' || $flag == 'inwardDoc' || $flag == 'inwardRegister'){ echo 'INWARD INVOICE';  ?><?php } ?>
<?php if ($flag == 'outwardDoc' || $flag == 'printOutwardInv' || $flag == 'outwardRegister'){ echo 'OUTWARD INVOICE' ?><?php } ?>				
				</textarea>
			</div>
			<div>
            <textarea readonly style="resize:none; width: 300px; height: 90px; float: left; font: 16px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden; white-space:pre-wrap;">
<?php echo strtoupper($register->company_name). PHP_EOL; ?>
#63, East Vanniar Street
West KK Nagar, Chennai 600078
Phone: 91-44-23643710</textarea>
            <div style="text-align: right; float: right; position: relative; margin-top: 0px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden;">
            	<img id="image" src="<?php echo base_url(); ?>assets/img/logo.png" />
            </div>
			</div>
			<div style="clear:both"></div>
				
			<div>
	            <textarea style="width: 200px; height: 70px; float: left; font: 20px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow: hidden; resize: none;" readonly><?php echo $register->client_name; "\n"; ?></textarea>  
<!--<?php $addLine = explode(',', $register->address); foreach ($addLine as $line) {
echo $line;
?> <?php } ?></textarea>-->
	
	            <table style="border-collapse: collapse; margin-top: 1px; margin-right: 15px; width: 200px; float: right;">
	                <tr>
	                    <td style="text-align: left; background: #F1F1F4; border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif;">Invoice #</td>
	                    <td style="border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif; width:100px; text-align: right;" ><textarea style="border: 0 none; resize: none; width: 100%; font: 13px Cambria,Helvetica, Sans-Serif; height: 20px; text-align: right;" readonly><?php if (isset($invoice_id)) { echo $invoice_id; } else {echo '';} ?></textarea></td>
	                </tr>
	                <tr>
	
	                    <td style="text-align: left; background: #F1F1F4; border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif;">Date</td>
	                    <td style="border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif; width:100px; text-align: right;" ><textarea style="border: 0 none; resize: none; width: 100%; font: 13px Cambria,Helvetica, Sans-Serif; height: 20px; text-align: right;" readonly id="date"><?php if (isset($invoice_create_date)) { echo $invoice_create_date; } else { echo mdate('%d-%m-%Y', now()); } ?> </textarea></td>
	                </tr>
	            </table>
			
			</div>		
			<div>
	            <textarea style="width: 100%; height: 50px; float: left; font: 20px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow: hidden; resize: none;" readonly>
<?php if ($flag == 'print' || $flag == 'create' || $flag == 'inwardDoc' || $flag == 'printInwardInv' || $flag == 'inwardRegister'){ echo 'Received with thanks the following documents' ?><?php } ?>
<?php if ($flag == 'outwardDoc' || $flag == 'printOutwardInv' || $flag == 'outwardRegister'){ echo 'Verified and returned with thanks' ?><?php } ?>				
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
				<?php if ($flag == 'create' || $flag == 'printInwardInv' || $flag == 'inwardDoc' || $flag == 'inwardRegister'){?>
	        	<textarea readonly style="resize:none; width: 100%; height: 20px; text-align: right; font: 14px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden;">
	        			<?php echo $_SESSION['emp_name']; ?></textarea>
	        	<textarea readonly style="resize:none; width: 100%; height: 20px; text-align: right; font: 14px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden;">
	        	       	For <?php echo strtoupper($register->company_name). PHP_EOL; ?></textarea>
	        	<?php } else if ($flag == 'outwardDoc' || $flag == 'printOutwardInv' || $flag == 'outwardRegister'){?>
	        	<textarea readonly style="resize:none; width: 100%; height: 20px; text-align: right; font: 14px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden;">
	        			<?php echo $register->client_name; "\n"; ?></textarea>
	        	<?php } ?>
	        	</div>
		</div>
		<footer>
			<div class="submit_link">
				<input type="submit" name="print" value="Print" onclick="printDiv('printRegister', 'Document Register Receipt <?php echo $register->id; ?>')"></input>
				<a href="<?php echo base_url(); ?>index.php/register/tomedia/<?php echo $register->id; ?>/<?php if (isset($invoice_id)) { echo $invoice_id; } else { echo "novalue"; }?>/<?php echo $flag; ?>/<?php if (isset($edit_start_date) && $edit_start_date!='') { echo $edit_start_date; } else { echo 'emptyvalue'; } ?>/email"><input type="button" name="eMail" value="eMail"/></a>
				<a href="<?php echo base_url(); ?>index.php/register/lists"><input type="button" name="cancel" value="List"/></a>
			</div>
		</footer>
	</article>
</section>

