<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Task/Document Management</title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/layout.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.css" />

        <script src="<?php echo base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/hideshow.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.tablesorter.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.equalHeight.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockui.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.ui.datepicker.js" type="text/javascript"></script>

        <script>
            $(function() {
                $("#client_search").autocomplete({
                    source: "<?php echo base_url(); ?>index.php/task/get_client",
                    minLength: 2,
                    select: function(event, ui) {
                        $('#client_id').val(ui.item.id)

                        //this.value = '';
                        //return false;
                    }
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function()
            {
                $(".tablesorter").tablesorter();
            }
            );
            $(document).ready(function() {

                //On Click Event


            });
        </script>
        <script type="text/javascript">
            $(function() {
                $('.column').equalHeight();
            });
        </script>
        <script>
            function search_client() {
                $.post("<?php echo base_url(); ?>index.php/client/search_index/", $("#frmSearchClient").serialize())
                        .done(function(data) {
                    var result = data.split('|||');
//                    TODO : window.location.href to current page with error message 
                    if (result[1] == 'success') {
                        window.location.href = "<?php echo base_url(); ?>index.php/client/index/"+result[2];
                    }else if(result[1] == 'failure'){
                        window.location.href = "<?php echo base_url(); ?>index.php/task/index/?msg=clientNotFound";
                    }
                });
            }
        </script>
        
    </head>


    <body>

        <header id="header">
            <hgroup>
                <h1 class="site_title">
                	<a href="<?php echo base_url(); ?>index.php/">S.RAM &amp; CO</a>
               	</h1>
                <?php
                if (isset($_SESSION['emp_id'])) {
                    ?>
                    <h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="<?php echo base_url(); ?>index.php/employee/logout">Logout</a></div>
                    <?php
                } else {
                    ?>
                    <h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="<?php echo base_url(); ?>index.php/employee/login">Login</a></div>
                    <?php
                }
                ?>
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <div class="user">
                <?php
                if (isset($_SESSION['emp_id'])) {
                    ?>
                    <p><?php echo $_SESSION['emp_name']; ?></p>
                    <?php
                }
                ?>
                <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
            </div>
        </section><!-- end of secondary bar -->

        <aside id="sidebar" class="column">
            <form class="quick_search" id="frmSearchClient" onsubmit="return false;" >
                <div class="ui-widget">
                    <input type="hidden" name="client_id" id="client_id" value=""/>
                    <input type="text" id="client_search" name="search"  value=""> 
                    <input type="submit" name="search_submit" id="search_submit" class="btn_search" onclick="search_client()"/>
                </div>                
            </form>
            <hr/>
            <h3>Task</h3>
            <ul class="toggle">
                <li class="icn_new_article"><a href="<?php echo base_url(); ?>index.php/task/create">New Task</a></li>
                <li class="icn_categories"><a href="<?php echo base_url(); ?>index.php/task/">List Tasks</a></li>
            </ul>
            <h3>Registry</h3>
            <ul class="toggle">
                <li class="icn_new_article"><a href="<?php echo base_url(); ?>index.php/register/create">New Register</a></li>
                <li class="icn_categories"><a href="<?php echo base_url(); ?>index.php/register/lists">List Registers</a></li>
            </ul>
            <h3>Client</h3>
            <ul class="toggle">
                <li class="icn_add_user"><a href="<?php echo base_url(); ?>index.php/client/create">New Client</a></li>
                <li class="icn_view_users"><a href="<?php echo base_url(); ?>index.php/client/lists">List Clients</a></li>
            </ul>
            <h3>Report</h3>
            <ul class="toggle">
                <li class="icn_categories"><a href="<?php echo base_url(); ?>index.php/itr/lists">ITR</a></li>
                <li class="icn_categories"><a href="<?php echo base_url(); ?>index.php/report/task">Tasks</a></li>
                <li class="icn_categories"><a href="<?php echo base_url(); ?>index.php/chart/index">Charts</a></li>
            </ul>
            <h3>Employee</h3>
            <ul class="toggle">
                <li class="icn_add_user"><a href="<?php echo base_url(); ?>index.php/employee/create">New Employee</a></li>
                <li class="icn_view_users"><a href="<?php echo base_url(); ?>index.php/employee/lists/">List Employees</a></li>
                <li class="icn_profile"><a href="<?php echo base_url(); ?>index.php/employee/profile/<?php if (isset($_SESSION['emp_id'])) { echo $_SESSION['emp_id']; } ?>">My Profile</a></li>
            </ul>
            <?php
            if (isset($_SESSION['emp_role_id']) && $_SESSION['emp_role_id']==0) {
			?>
				<h3>Misc</h3>
				<ul class="toggle">
				<li class="icn_new_article"><a href="<?php echo base_url(); ?>index.php/fy/create">New Fin Year</a></li>
				<li class="icn_categories"><a href="<?php echo base_url(); ?>index.php/fy/lists">List Fin Year</a></li>
				<li class="icn_new_article"><a href="<?php echo base_url(); ?>index.php/smtp/create">New SMTP</a></li>
				<li class="icn_new_article"><a href="<?php echo base_url(); ?>index.php/smtp/lists">List SMTP</a></li>
				</ul>
            <?php
            }
            ?>            
            <h3>User</h3>
            <ul class="toggle">
                <li class="icn_jump_back"><a href="<?php echo base_url(); ?>index.php/employee/logout">Logout</a></li>
            </ul>
            <footer>
                <hr />
                <p><strong>Copyright &copy; 2013</strong></p>
            </footer>
        </aside><!-- end of sidebar -->