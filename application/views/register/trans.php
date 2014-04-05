<script type="text/javascript">
	$(document).ready(function() { $(".tablesorter").tablesorter(); } );
</script>

<table class="tablesorter" cellspacing="0"> 
	<thead> 
    	<tr>
<!--        <th rowspan="1">No</th> -->
			<th rowspan="1">Doc#</th>
            <th rowspan="1">Emp</th>
<!--        <th rowspan="1">Reg Status</th>  -->
            <th rowspan="1">Date</th>
            <th rowspan="1">Type</th> 
		</tr>
	</thead>
    <tbody>                            
    	<?php $i =1; foreach ($trans as $tr) { ?>
        	<tr>
            	<!-- <td><?php echo $i; ?></td> -->
                <td><?php echo $tr->doc_id; ?></td>
                <td><?php echo $tr->emp; ?></td>
                <!--  <td><?php echo $tr->reg_status; ?></td> -->
                <td><?php echo $tr->trans_date; ?></td>
                <td><?php echo $tr->trans_type; ?></td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>



