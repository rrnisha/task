<p>
	Details for <strong><?php echo $details[0]->id; ?> - <?php echo $details[0]->title; ?></strong>
</p>
<table class="tablesorter" cellspacing="0">
	<thead>
		<tr>
			<th class="required" rowspan="1">Start Date</th>
			<th class="required" rowspan="1">Due Date</th>
			<th rowspan="1">End Date</th>                                    
		</tr>
	</thead>
	<tbody>
	 	<tr>
			<td>
	            <?php echo $details[0]->start_date?>
	        </td>
			<td>
	            <?php echo $details[0]->due_date?>
	        </td>
			<td>
	            <?php echo $details[0]->end_date ?>
	        </td>
		</tr>
	</tbody> 
</table>
