<section id="main" class="column">
<article class="module width_full">
<form name="frmClientUpload" id="frmClientUpload" method="post" action="<?php echo base_url(); ?>index.php/client/upload">
<header><h3>BULK UPLOAD CLIENTS</h3>
	<div class="submit_link">
    	<input type="submit" name="Upload" value="Ok"/>
		<a href="<?php echo base_url(); ?>index.php/client/lists"><input type="button" name="No" value="Back"/></a>
	</div>
</header>
<div class="clear"></div>
<div class="module_content">
	<table class="tablesorter" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo 'SNo' ?></th>
				<th><?php echo 'Genius Id' ?></th>
				<th><?php echo 'Name' ?></th>
				<th><?php echo 'PAN' ?></th>
				<th><?php echo 'TAN' ?></th>
				<th><?php echo 'DOI' ?></th>
				<th><?php echo 'Reg.No' ?></th>
				<th><?php echo 'DOB' ?></th>
				<th><?php echo 'Address' ?></th>
			</tr>
		</thead>
		<tbody>
				<?php for ($r=2; $r<=$numrows; $r++) { 
					if (isset($cells[$r]) && ($r%7==5 || $r%7==6 || $r%7==0 || $r%7==1)) { 
						continue; 
					} else { 
						if (isset($cells[$r]) && ($r%7!=4)) { ?>
						<tr> 
						<td><input type="text" name="sno[]" value="<?php echo $cells[$r][1]; ?>"></input> </td>
						<?php for ($c=1; $c<=$numcols+1; $c++) {

							if ($r%7 == 3 && $c == 1) { ?>
								<td><input type="text" name="genid[]" value="<?php echo $cells[$r][$c+1]; ?>"></input></td>
								<?php  } 
								elseif ($r%7 == 3 && $c == 2) { ?> 
									<td><input type="text" name="name[]" value="<?php echo $cells[$r+1][$c]; ?>"></input></td>
								<?php  } 
								elseif ($r%7 == 4 && $c == 2) { ?> 
									<td><?php echo '-'; ?></td>
								<?php  } 
								else { 
									if ($c==3) { ?>
									<td><input type="text" name="pan[]" value="<?php if(isset($cells[$r][$c])) echo htmlspecialchars($cells[$r][$c]); else echo '-'; ?>"></input></td>
									<?php } elseif ($c==4) { ?>
									<td><input type="text" name="tan[]" value="<?php if(isset($cells[$r][$c])) echo htmlspecialchars($cells[$r][$c]); else echo '-'; ?>"></input></td>
									<?php } elseif ($c==5) { ?>
									<td><input type="text" name="doi[]" value="<?php if(isset($cells[$r][$c])) echo htmlspecialchars($cells[$r][$c]); else echo '-'; ?>"></input></td>
									<?php } elseif ($c==6) { ?>
									<td><input type="text" name="regno[]" value="<?php if(isset($cells[$r][$c])) echo htmlspecialchars($cells[$r][$c]); else echo '-'; ?>"></input></td>
									<?php } elseif ($c==7) { ?>
									<td><input type="text" name="dob[]" value="<?php if(isset($cells[$r][$c])) echo htmlspecialchars($cells[$r][$c]); else echo '-'; ?>"></input></td>
									<?php } ?>
									
								<?php  } 

								if ($c == $numcols+1 ){ ?>
								<td><textarea name="address[]" style="width:400px;height: 100px"><?php 
									if (!isset($cells[$r+2])) {
										echo '-';
									} 
									else {
										$address='';
										if (isset($cells[$r+2][2])) $address.=htmlspecialchars($cells[$r+2][2])."\n";
										if (isset($cells[$r+3][2])) $address.=htmlspecialchars($cells[$r+3][2])."\n";
										if (isset($cells[$r+4][2])) $address.=htmlspecialchars($cells[$r+4][2])."\n";
										if (isset($cells[$r+5][2])) $address.=htmlspecialchars($cells[$r+5][2])."\n";
									}
									?><?php echo $address; ?></textarea></td>
								<?php } 

							} ?>
						</tr>  
						<?php 
						}
					} 
				} ?>
		</tbody>                            
	</table>
</div>
</form>
</article>
</section>