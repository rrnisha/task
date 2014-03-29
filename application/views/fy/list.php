<section id="main" class="column">

    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Financial Year/Assessment Year</h3>
        </header>

        <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
        <div id="success">
            <?php if ($msg == 'finyearaddedsuccess') { ?> 
                <h4 class="alert_success">Fin Year created Successfully</h4> 
            <?php } ?>                
        </div>
        <br>  
        <div style="clear:both;" id="list">
            <div class="tab_container">
                <div class="itr_list">
                    <div id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
<!--                            <th>Id</th>-->
							<tr>
								<th>Current FY</th>
	                            <th>Financial Year</th>
	                            <th>From Year</th> 
	                            <th>To Year</th> 
	                            <th>From Date</th>
	                            <th>To Date</th>
	                            <th>Assessment Year</th>
	                        </tr> 
                            </thead>
                            <tbody>                            
                                <?php
                                foreach ($years as $year) {
                                    ?>
                                    <tr>
                                    	<!--<td><?php echo $year->id; ?></td>-->
                                    	<td><input type="checkbox" disabled name="curr_fy" <?php if ($year->is_curr_year == 'Y') { ?>checked<?php } ?>/></td>
                                    	<td><?php echo $year->fin_year; ?></td>
                                        <td><?php echo $year->from_year; ?></td>
                                        <td><?php echo $year->to_year; ?></td> 
                                        <td><?php echo $year->from_date; ?></td>
                                        <td><?php echo $year->to_date; ?></td>
                                        <td><?php echo $year->assessment_year; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
    </article>
</section>