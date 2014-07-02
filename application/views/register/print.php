<script type="text/javascript">
function printDiv( divId, filename ){
	persistInvoice();
	w=window.open();
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
			<?php $receipt_name = '' ?>
			<?php if ($flag == 'create' || $flag == 'printInwardInv' || $flag == 'inwardDoc' || $flag == 'inwardRegister'){ $receipt_name = 'INWARD RECEIPT';  ?>
			<?php } elseif ($flag == 'outwardDoc' || $flag == 'printOutwardInv' || $flag == 'outwardRegister'){ $receipt_name = 'OUTWARD RECEIPT' ?>
			<?php } elseif ($flag == 'edit'){ $receipt_name = 'ERRATA RECEIPT';  ?><?php } ?>					
			
			<p readonly style="height: 20px; width: 100%; margin: 20px 0; background: #F1F1F4; text-align: center; color: black; font: bold 15px Cambria,Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 10px; padding: 8px 8px; border: 0 none; overflow: hidden; resize: none;">
			<?php echo $receipt_name; ?>
			</p>
			</div>
			<div>
            <p readonly style="resize:none; width: 50%; height: 120px; float: left; font: 16px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden; white-space:pre-wrap;">
<strong style="font-size:20px"><?php echo strtoupper($register->company_name)?></strong><?php if ($register->company_name=='SRAM AND CO') { echo ', Chartered Accountants'. PHP_EOL;} else { echo PHP_EOL;}?>
#63, East Vanniar Street
West KK Nagar, Chennai 600078
Phone: +9144 23643710</p>
			</div>
			<div>
			<p readonly style="resize:none; width: 50%; height: 120px; float: right; font: 16px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden; white-space:pre-wrap;">
            <table style="border-collapse: collapse; margin-top: 1px; margin-right: 15px; width: 300px; float: right;">
                <tr>
                <?php if ($flag == 'create' || $flag == 'printInwardInv' || $flag == 'inwardDoc' || $flag == 'inwardRegister'){ ?>
                    <td style="text-align: left; background: #F1F1F4; border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif;">Inward #</td>
                <?php } else if ($flag == 'outwardDoc' || $flag == 'printOutwardInv' || $flag == 'outwardRegister'){ ?> 
                	<td style="text-align: left; background: #F1F1F4; border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif;">Outward #</td>
                <?php } elseif ($flag == 'edit'){ ?>   
                	<td style="text-align: left; background: #F1F1F4; border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif;">Edited Receipt</td>
                <?php } ?>
                    <td style="border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif; width:100px; text-align: right;" ><p style="border: 0 none; resize: none; width: 100%; font: 13px Cambria,Helvetica, Sans-Serif; height: 20px; text-align: right;" readonly><?php if (isset($invoice_id)) { echo $invoice_id; } else {echo '--NA--';} ?></p></td>
                </tr>
                <tr>
                    <td style="text-align: left; background: #F1F1F4; border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif;">Date</td>
                    <td style="border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif; width:100px; text-align: right;" ><p style="border: 0 none; resize: none; width: 100%; font: 13px Cambria,Helvetica, Sans-Serif; height: 20px; text-align: right;" readonly id="date"><?php if (isset($invoice_create_date)) { echo $invoice_create_date; } else { echo mdate('%d-%m-%Y', now()); } ?> </p></td>
                </tr>
                <tr>
                    <td style="text-align: left; background: #F1F1F4; border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif;">Mode</td>
                    <td style="border: 1px solid black; font: 14px Cambria,Helvetica, Sans-Serif; width:100px; text-align: right;" ><p style="border: 0 none; resize: none; width: 100%; font: 13px Cambria,Helvetica, Sans-Serif; height: 20px; text-align: right;" readonly id="date"><?php  echo $mode_of_receipt; ?> </p></td>
                </tr>
            </table>
            </p>
		
			</div>
			<div style="clear:both"></div>
			<div>
	            <p style="width: 100%; height: 50px; float: left; font: 20px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow: hidden; resize: none;" readonly>
<em><?php if ($flag == 'print' || $flag == 'create' || $flag == 'inwardDoc' || $flag == 'printInwardInv' || $flag == 'inwardRegister'){ echo 'Received the following with thanks from '?></em><strong><?php echo $register->client_name; "\n"; ?></strong><?php } ?>
<em><?php if ($flag == 'outwardDoc' || $flag == 'printOutwardInv' || $flag == 'outwardRegister'){ echo 'I/We   '; ?><strong><?php echo $register->client_name; ?></strong> <?php echo ' received the following with Thanks'; ?></em><?php } ?>				
				</p>
			</div>
			<div style="clear:both"></div>		
			<div id="tab1">
				<table style="border-collapse: collapse; width: 100%; margin: 0 0 0 0; font-size: 13px;" cellspacing="0">
					<thead>
						<tr style="border: 1px solid black; height: 34px; background: url(<?php echo base_url(); ?>assets/img/table_sorter_header.png) repeat-x; text-align: left; text-indent: 6px; cursor: pointer;">
							<th style="width:5%; border: 1px solid black; " rowspan="1">SNo</th>
							<th style="width:75%; border: 1px solid black; " rowspan="1">Particulars</th>
							<th style="width:20%; border: 1px solid black; " rowspan="1">Financial Year</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($particulars as $particular) {
							?>
							<tr>
								<td style="width:5%; border: 1px solid black; margin: 0; padding: 20px 5px 0px; "><?php echo $i; ?></td>
								<td style="width:75%; border: 1px solid black; margin: 0; padding: 20px 5px 0px; "><?php echo $particular->particulars; ?></td>
								<td style="width:20%; border: 1px solid black; margin: 0; padding: 20px 5px 0px; "><?php echo $particular->fin_year; ?></td>
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
				<?php if ($flag == 'create' || $flag == 'printInwardInv' || $flag == 'inwardDoc' || $flag == 'inwardRegister'){?>
	        	<p readonly style="resize:none; width: 100%; height: 80px; text-align: right; font: 14px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden;">
	        	       	For <?php echo strtoupper($register->company_name). PHP_EOL; ?></p>
	        	<p readonly style="resize:none; width: 100%; height: 20px; text-align: right; font: 14px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden;">
	        			<?php echo $invoice_created_by; ?></p>

	        	<?php } else if ($flag == 'outwardDoc' || $flag == 'printOutwardInv' || $flag == 'outwardRegister'){?>
	        	<p readonly style="resize:none; width: 100%; height: 60px; text-align: right; font: 14px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden;">
	        	</p>
	        	<p readonly style="resize:none; width: 100%; height: 20px; text-align: right; font: 14px Cambria,Helvetica, Sans-Serif; border: 0 none; overflow:hidden;">
	        			For <?php echo $register->client_name; "\n"; ?></p>
	        	<?php } ?>
	       	</div>
		</div>
		<footer>
			<div class="submit_link">
				<input type="submit" name="print" value="Print" onclick="printDiv('printRegister', 'Document Register Receipt <?php if (isset($invoice_id)) { echo $invoice_id; } else { echo "novalue"; } ?>')"></input>
				<a href="<?php echo base_url(); ?>index.php/register/tomedia/<?php echo $register->id; ?>/<?php if (isset($invoice_id)) { echo $invoice_id; } else { echo "novalue"; }?>/<?php echo $flag; ?>/<?php if (isset($edit_start_date) && $edit_start_date!='') { echo $edit_start_date; } else { echo 'emptyvalue'; } ?>/email"><input type="button" name="eMail" value="eMail"/></a>
				<a href="<?php echo base_url(); ?>index.php/register/lists"><input type="button" name="cancel" value="List"/></a>
			</div>
		</footer>
	</article>
</section>

