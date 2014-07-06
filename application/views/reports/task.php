<section id="main" class="column">
<article class="module width_full">
<div class="tab_container">
<div class="task_report_list">
<div id="tab1" class="tab_content">
<header>
<h3>
	Task Report - <?php if ($print_out_of_range == 'Y') { ?>
		Date - Out of Range - End Date prior to Start Date
		<?php } else { ?> 
		Date Range :- From - <?php echo $print_start_date;?> : To - <?php echo $print_end_date;?>
		<?php } ?> 
		<a style="float:right" href="<?php echo base_url(); ?>index.php/report/task">Back</a> 
</h3>
</header>
<table class="tablesorter" cellspacing="0">
	<thead>
		<tr>
			<th rowspan="1">SNo</th>
			<th rowspan="1">ID</th>
			<th rowspan="1">Company</th>
			<th rowspan="1">Onwer</th>
			<th rowspan="1">Task</th>
			<th rowspan="1">Client</th>
			<th rowspan="1">Status</th>
			<th rowspan="1">Priority</th>
			<th rowspan="1">Type</th>
			<th rowspan="1">Start Date</th>
			<th rowspan="1">Due Date</th>
			<th rowspan="1">End Date</th>
		</tr>
	</thead>
	<tbody>
	<?php $i = 1; foreach ($tasks as $task) { ?>
        <?php if ((strtotime(date('d-m-Y')) > strtotime($task->due_date) && $task->end_date == "00-00-0000" ) && !($status == 'completed' || $status == 'finalized' || $status == 'tofinalize')) { ?>
        <tr style="background-color: #FF3333;">
        <?php } else if (strtotime(date('d-m-Y')) == strtotime($task->due_date) && $task->end_date == "00-00-0000") { ?>
        <tr style="background-color: #FFFF85;">
        <?php } else { ?>
        <tr>
        <?php } ?>
			<td><?php echo $i; ?></td>
			<td><?php echo $task->id; ?></td>
			<td><?php echo $task->company_name; ?></td>
			<td><?php echo $task->emp_name; ?></td>
			<td><?php echo $task->title; ?></td>
			<td><?php echo $task->client_name; ?></td>
			
            <?php if ($task->status == 'completed' || $task->status == 'finalized') { ?>
            <td style="color:red"><?php  echo $task->status; ?></td> 
			<?php } else {?> 
			 <td><?php  echo $task->status; ?></td>
			<?php } ?>

			<?php if ($task->priority == 'medium') { ?>
			<td><label style="visibility: hidden">2</label><img
				alt="<?php echo $task->priority; ?>"
				src="<?php echo base_url(); ?>/assets/img/new/medium16.png" /></td>
				<?php } else if ($task->priority == 'high') { ?>
			<td><label style="visibility: hidden">1</label><img
				alt="<?php echo $task->priority; ?>"
				src="<?php echo base_url(); ?>/assets/img/new/high16.png" /></td>
				<?php } if ($task->priority == 'low') { ?>
			<td><label style="visibility: hidden">3</label><img
				alt="<?php echo $task->priority; ?>"
				src="<?php echo base_url(); ?>/assets/img/new/low16.png" /></td>
				<?php } ?>
			<td><?php if ($task->type == 'accounting') { echo strtoupper('acctng'); } else { echo strtoupper($task->type); } ?></td>
			<td><?php echo $task->start_date; ?></td>
			<td><?php echo $task->due_date; ?></td>
			<td><?php echo $task->end_date; ?></td>

		</tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>    
</div>    
</div>        
</article>
