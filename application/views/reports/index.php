<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/select2.js"></script>

 <script>
 var preload_data = [
{ id: 'user0', text: 'ALL'}
, { id: 'user1', text: 'Jane Doe'}
, { id: 'user2', text: 'John Doe'}
, { id: 'user3', text: 'Robert Paulson'}
, { id: 'user5', text: 'Spongebob Squarepants'}
, { id: 'user6', text: 'PLANET BOB' }
, { id: 'user7', text: 'Inigo Montoya' }
];
	$(document).ready(function() { 
		$("#client_select").select2({});

		 $("#mul_client").select2();
// 		 {
// 			 multiple: true
// 			 query: function (query){
// 			 var data = {results: []};
			  
			// $.each(<?php echo $mul_clients ?>, function(){
// 			 if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
// 			 data.results.push({id: this.id, text: this.text });
// 			 }
// 			 });
			  
// 			 query.callback(data);
// 			 }
// 			 });
// 		$("#mul_client").select2();

		
		$( "#start_date" ).datepicker({
		 dateFormat: "dd-mm-yy",
		 minDate : 0,
		 defaultDate: "+1w",
		 changeMonth: true,
		 numberOfMonths: 3,
		 onClose: function( selectedDate ) {
		 $( "#end_date" ).datepicker( "option", "minDate", selectedDate );
		 }
		 });
		$( "#end_date" ).datepicker({
		 dateFormat: "dd-mm-yy",
		 minDate : 0,	
		 defaultDate: "+1w",
		 changeMonth: true,
		 numberOfMonths: 3,
		 onClose: function( selectedDate ) {
		 $( "#start_date" ).datepicker( "option", "maxDate", selectedDate );
		 }
		 });			
	});

	function enableFY()
	{
		if (document.getElementById("fys").disabled)
			document.getElementById("fys").disabled=false;
		else
			document.getElementById("fys").disabled=true;
	}
</script>
<section id="main" class="column">
    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Report Generator</h3>
        </header>
		<div id="filters">
		    <div class="module_content" >
				<form id="frmFilterClient" method="post" action="<?php echo base_url(); ?>index.php/report/task_report_results">
	                <fieldset>
	                    <label>Employee</label>
	                    <?php echo form_dropdown('emp_id', $employees, $values['emp_id']); ?>
	                </fieldset>				
	                <fieldset>
	                    <label>Client</label>
	                    <?php $js = 'id="client_select"'; echo form_dropdown('client_id', $clients, $values['client_id'], $js); ?>
	                </fieldset>
<!-- 	                <fieldset> -->
<!-- 	                    <label>Multiple Client</label> -->
<!--	                    <?php $js = 'multiple="multiple" style="width:400px" id="mul_client"'; echo form_dropdown('mul_client', $clients, $values['client_id'], $js); ?>-->
<!-- 	                </fieldset> -->
	                <fieldset>
	                    <label>Status</label>
	                    <input type="radio" name="status" value="all" <?php if ($values['status'] == 'all') { ?>checked<?php } ?>/> All 
	                    <input type="radio" name="status" value="all-open" <?php if ($values['status'] == 'all-open') { ?>checked<?php } ?>/> All Open
	                    <input type="radio" name="status" value="all-closed" <?php if ($values['status'] == 'all-closed') { ?>checked<?php } ?>/> All Closed
	                    <input type="radio" name="status" value="new" <?php if ($values['status'] == 'tds') { ?>checked<?php } ?>/> New
	                    <input type="radio" name="status" value="re-assigned" <?php if ($values['status'] == 'itr') { ?>checked<?php } ?>/> Re-Assigned
	                    <input type="radio" name="status" value="query" <?php if ($values['status'] == 'st') { ?>checked<?php } ?>/> Query
	                    <input type="radio" name="status" value="pending" <?php if ($values['status'] == 'accounting') { ?>checked<?php } ?>/> Pending
	                    <input type="radio" name="status" value="complete" <?php if ($values['status'] == 'audit') { ?>checked<?php } ?>/> Completed
	                    <input type="radio" name="status" value="finalized" <?php if ($values['status'] == 'other') { ?>checked<?php } ?>/> Finalized
	                </fieldset>
	                <fieldset>
	                    <label>Type</label>
	                    <input type="radio" name="type" value="all" <?php if ($values['type'] == 'all') { ?>checked<?php } ?>/> All
	                    <input type="radio" name="type" value="tds" <?php if ($values['type'] == 'tds') { ?>checked<?php } ?>/> TDS
	                    <input type="radio" name="type" value="itr" <?php if ($values['type'] == 'itr') { ?>checked<?php } ?>/> ITR
	                    <input type="radio" name="type" value="st" <?php if ($values['type'] == 'st') { ?>checked<?php } ?>/> Service Tax
	                    <input type="radio" name="type" value="accounting" <?php if ($values['type'] == 'accounting') { ?>checked<?php } ?>/> Accounting
	                    <input type="radio" name="type" value="audit" <?php if ($values['type'] == 'audit') { ?>checked<?php } ?>/> Audit
	                    <input type="radio" name="type" value="other" <?php if ($values['type'] == 'other') { ?>checked<?php } ?>/> Other
	                </fieldset>
	                <fieldset>
	                    <label>Priority</label>
	                    <input type="radio" name="priority" value="all" <?php if ($values['priority'] == 'all') { ?>checked<?php } ?>/> All
	                    <input type="radio" name="priority" value="high" <?php if ($values['priority'] == 'high') { ?>checked<?php } ?>/> High
	                    <input type="radio" name="priority" value="medium"  <?php if ($values['priority'] == 'medium') { ?>checked<?php } ?>/> Medium
	                    <input type="radio" name="priority" value="low"   <?php if ($values['priority'] == 'low') { ?>checked<?php } ?>/> Low
	                </fieldset>
	                <fieldset>
		                <label>Date Range</label>
	                </fieldset>			    	
	                <fieldset>
	                    <label>From</label>
	                    <input id="start_date" name="date_start" value="<?php echo $values['date_start']; ?>" autocomplete="off" style="width:17%;float:left;"/>
	                    <label>To</label>
	                    <input id="end_date" name="date_end" value="<?php echo $values['date_end']; ?>" autocomplete="off" style="width:17%;float:left;"/>
	                </fieldset>
	                <fieldset>
	                	<input type="checkbox" name="sel_fy" onclick="enableFY()" <?php if ($values['sel_fy'] == 'Y') { ?>checked<?php } ?>/>
						<label>Financial Year</label>
	                    <?php $js = 'id="fys" disabled="disabled"'; echo form_dropdown('fy', $fys, $values['fy'], $js); ?>
	                </fieldset>			    	
	                <fieldset>
						<input type="submit" name="filter_submit" id="filter_submit" value="Generate Report"/>
						<a href="<?php echo base_url(); ?>index.php/report/task"><input type="button" name="reset" value="Reset"/></a>
			    	</fieldset>
		        </form>
		    </div>
	    </div>
    </article>
</section>
