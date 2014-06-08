<script src="<?php echo base_url(); ?>assets/js/Chart.js" type="text/javascript"></script>
<body>
<section id="main" class="column">
<article class="module width_full">
<header>
<h3 class="tabs_involved">Task</h3>
</header>
<canvas id="myChart00" width="330" height="40"  style="border:1px solid #c3c3c3;">
<script>
var ctx = document.getElementById("myChart00").getContext("2d");
ctx.font="bold 13px Cambria";
ctx.fillText("By Status",0,10);

ctx.font="13px Cambria";

ctx.fillStyle="#F38630";
ctx.fillRect(0,20,15,15);
ctx.fillText("Open <?php if (isset($status['open'])) echo $status['open']; else echo 0; ?>",20,30);

ctx.fillStyle="#E0E4CC";
ctx.fillRect(80,20,15,15);
ctx.fillText("Completed <?php if (isset($status['completed'])) echo $status['completed']; else echo 0; ?>",100,30);

ctx.fillStyle="#69D2E7";
ctx.fillRect(180,20,15,15);
ctx.fillText("Finalized <?php if (isset($status['finalized'])) echo $status['finalized']; else echo 0; ?>",200,30);
</script>
</canvas>
<canvas id="myChart01" width="330" height="40"  style="border:1px solid #c3c3c3;">
<script>
var ctx = document.getElementById("myChart01").getContext("2d");
ctx.font="bold 13px Cambria";
ctx.fillText("By Type",0,10);

ctx.font="13px Cambria";

ctx.fillStyle="#F7464A";
ctx.fillRect(0,20,15,15);
ctx.fillText("ST <?php if (isset($type['st'])) echo $type['st']; else echo 0; ?>",20,30);

ctx.fillStyle="#E2EAE9";
ctx.fillRect(55,20,15,15);
ctx.fillText("ITR <?php if (isset($type['itr'])) echo $type['itr']; else echo 0; ?>",75,30);

ctx.fillStyle="#D4CCC5";
ctx.fillRect(115,20,15,15);
ctx.fillText("TDS <?php if (isset($type['itr'])) echo $type['itr']; else echo 0; ?>",135,30);

ctx.fillStyle="#949FB1";
ctx.fillRect(180,20,15,15);
ctx.fillText("AUDIT <?php if (isset($type['audit'])) echo $type['audit']; else echo 0; ?>",200,30);

ctx.fillStyle="#4D5360";
ctx.fillRect(255,20,15,15);
ctx.fillText("ACCNT <?php if (isset($type['accounting'])) echo $type['accounting']; else echo 0; ?>",275,30);

ctx.fillStyle="#69D2E7";
ctx.fillRect(330,20,15,15);
ctx.fillText("Others <?php if (isset($type['other'])) echo $type['other']; else echo 0; ?>",350,30);

</script>
</canvas>
<canvas id="myChart02" width="330" height="40"  style="border:1px solid #c3c3c3;">
<script>
var ctx = document.getElementById("myChart02").getContext("2d");
ctx.font="bold 13px Cambria";
ctx.fillText("Open Task Status",0,10);

ctx.font="13px Cambria";

ctx.fillStyle="#A5DBFC";
ctx.fillRect(0,20,15,15);
ctx.fillText("New <?php if (isset($status['new'])) echo $status['new']; else echo 0;?>",20,30);

ctx.fillStyle="#CDE8FA";
ctx.fillRect(65,20,15,15);
ctx.fillText("ReAssigned <?php if (isset($status['re-assigned'])) echo $status['re-assigned']; else echo 0;?>",85,30);

ctx.fillStyle="#D9F0FA";
ctx.fillRect(160,20,15,15);
ctx.fillText("Query <?php if (isset($status['query'])) echo $status['query']; else echo 0;?>",180,30);

ctx.fillStyle="#0099F9";
ctx.fillRect(235,20,15,15);
ctx.fillText("Pending <?php if (isset($status['pending'])) echo $status['pending']; else echo 0;?>",255,30);
</script>
</canvas>
<canvas id="myChart11" width="330" height="280" style="border:1px solid #c3c3c3;">
<script>
var ctx = document.getElementById("myChart11").getContext("2d");

var data = [
        	{
        		value: <?php if (isset($status['open'])) echo $status['open']; else echo 0; ?>,
        		color:"#F38630"
        	},
        	{
        		value : <?php if (isset($status['completed'])) echo $status['completed']; else echo 0; ?>,
        		color : "#E0E4CC"
        	},
        	{
        		value : <?php if (isset($status['finalized'])) echo $status['finalized']; else echo 0; ?>,
        		color : "#69D2E7"
        	}			
        ]

var myNewChart0 = new Chart(ctx).Pie(data);

</script>
</canvas>
<canvas id="myChart12" width="330" height="280" style="border:1px solid #c3c3c3;">
<script>
var ctx = document.getElementById("myChart12").getContext("2d");

var data = [
        	{
        		value: <?php if (isset($type['st'])) echo $type['st']; else echo 0; ?>,
        		color:"#F7464A"
        	},
        	{
        		value : <?php if (isset($type['itr'])) echo $type['itr']; else echo 0; ?>,
        		color : "#E2EAE9"
        	},
        	{
        		value : <?php if (isset($type['tds'])) echo $type['tds']; else echo 0; ?>,
        		color : "#D4CCC5"
        	},
        	{
        		value : <?php if (isset($type['audit'])) echo $type['audit']; else echo 0; ?>,
        		color : "#949FB1"
        	},
        	{
        		value : <?php if (isset($type['accounting'])) echo $type['accounting']; else echo 0; ?>,
        		color : "#4D5360"
        	},
        	{
        		value : <?php if (isset($type['other'])) echo $type['other']; else echo 0; ?>,
        		color : "#69D2E7"
        	}
        ]

var myNewChart0 = new Chart(ctx).Doughnut(data);
</script>
</canvas>
<canvas id="myChart13" width="330" height="280" style="border:1px solid #c3c3c3;">
<script>
var ctx = document.getElementById("myChart13").getContext("2d");

//'#FACC00', '#FB9900', '#FB6600', '#FB4800', '#CB0A0A', '#F8F933'
//'#A5DBFC', '#CDE8FA', '#D9F0FA', '#0099F9', '#1BA4F9', '#41B2FA', '#63C1FA', '#83CDFA'
var data = [
        	{
        		value: <?php if (isset($status['new'])) echo $status['new']; else echo 0;?>,
        		color:"#A5DBFC"
        	},
        	{
        		value : <?php if (isset($status['re-assigned'])) echo $status['re-assigned']; else echo 0;?>,
        		color : "#CDE8FA"
        	},
        	{
        		value : <?php if (isset($status['query'])) echo $status['query']; else echo 0;?>,
        		color : "#83CDFA"
        	},			
        	{
        		value : <?php if (isset($status['pending'])) echo $status['pending']; else echo 0;?>,
        		color : "#0099F9"
        	}			
        ]

var myNewChart0 = new Chart(ctx).Pie(data);
</script>
</canvas>
<canvas id="myChart20" width="1000" height="40"  style="border:1px solid #c3c3c3;">
<script>
var ctx = document.getElementById("myChart20").getContext("2d");
ctx.font="bold 13px Cambria";
ctx.fillText("No of Tasks By Status - Per Month for Current FY",0,10);

ctx.font="13px Cambria";

ctx.fillStyle="rgba(255,0,0,1)";
ctx.fillRect(0,20,15,15);
ctx.fillText("Open",20,30);

ctx.fillStyle="rgba(0,255,0,1)";
ctx.fillRect(75,20,15,15);
ctx.fillText("Completed",95,30);

ctx.fillStyle="rgba(0,0,255,1)";
ctx.fillRect(170,20,15,15);
ctx.fillText("Finalized",190,30);
</script>
</canvas>
<canvas id="myChart30" width="1000" height="380" style="border:1px solid #c3c3c3;">
<script>
var ctx1 = document.getElementById("myChart30").getContext("2d");

var data = {
		labels : ["Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","Jan","Feb","Mar"],
		datasets : [
			{
				fillColor : "rgba(255,0,0,0.5)",
				strokeColor : "rgba(255,0,0,1)",
				data : <?php echo $month['open']; ?>
			},
			{
				fillColor : "rgba(0,255,0,0.5)",
				strokeColor : "rgba(0,255,0,1)",
				data : <?php echo $month['completed']; ?>
			},
			{
				fillColor : "rgba(0,0,255,0.5)",
				strokeColor : "rgba(0,0,255,,1)",
				data : <?php echo $month['finalized']; ?>
			}
		]
	}

// {scaleOverride : true, scaleSteps : 10, scaleStepWidth : 5, scaleStartValue : 0}
var myNewChart1 = new Chart(ctx1).Bar(data);
</script>
</canvas>
</article>
</section>
</body>
