<section id="main" class="column">

    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">SMTP Details</h3>
        </header>

        <!-- <h4 class="alert_error"><?php echo validation_errors(); ?></h4> -->
        <div id="success">
            <?php if ($msg == 'smtpaddedsuccess') { ?> 
                <h4 class="alert_success">SMTP Created Successfully</h4> 
            <?php } ?>                
        </div>
        <br>  
        <div style="clear:both;" id="list">
            <div class="tab_container">
                <div class="itr_list">
                    <div id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
                            <thead> 
							<tr>
								<th>Id</th>
								<th>Server</th>
	                            <th>Port</th>
	                            <th>User Name</th> 
	                            <th>Password</th> 
	                        </tr> 
                            </thead>
                            <tbody>                            
                                <?php
                                foreach ($smtps as $smtp) {
                                    ?>
                                    <tr>
                                    	<td><?php echo $smtp->id; ?></td>
                                    	<td><?php echo $smtp->server; ?></td>
                                        <td><?php echo $smtp->port; ?></td>
                                        <td><?php echo $smtp->username; ?></td> 
                                        <td><?php echo $smtp->password; ?></td>
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