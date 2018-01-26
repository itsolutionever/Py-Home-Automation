<?php 
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='admin')
	{
?>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                        <h4><font color="orange">Py</font><font color="white">-Home-</font><font color="green">Automation</font></h4><hr/>
                </li>
                <li>
                    <a href="index.php?page=admin" style="color: skyblue;"><i class="fa fa-dashboard fa-lg"></i> | Dashboard</a>
                </li>
                <li>
                    <a href="index.php?page=logout" style="color: #E74C3C;"><i class="fa fa-sign-out fa-lg"></i> | Logout</a>
                </li>
                <li>
                    <a href="#" style="color: #58D68D;""><i class="fa fa-bar-chart fa-lg"></i> | Overview</a>
                </li>
                <li>
                    <a href="index.php?page=admin&subpage=admin_view_devices" style="color: #A569BD;"><i class="fa fa-eye fa-lg"></i> | View All Devices</a>
                </li>
                <li>
                    <a href="index.php?page=admin&subpage=admin_edit_profile" style="color: #E59866;"><i class="fa fa-user fa-lg"></i> | Edit Profile</a>
                </li>
                <li>
                    <a href="index.php?page=admin&subpage=admin_feedback" style="color: #82E0AA;"><i class="fa fa-pencil fa-lg"></i> | View All Feedback</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="row">
            <div class="col-sm-12 text-center" style="background-color: #593B98; color: white;"><!--#8b9dc3-->
                <?php echo "<h4><i class=\"material-icons\" style=\"font-size:36px\">face</i><sup><sup><i class=\"material-icons\">message</i></sup></sup> Hello, Welcome '". $_SESSION["email"]."' </h4>"?>
            </div>
        </div>
        <div id="page-content-wrapper">
        <a href="#menu-toggle" class="btn btn-danger" id="menu-toggle">#</a>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       

				<?php 
						if(isset($_GET['subpage']))
						{
							$subpage=$_GET['subpage'];
							$filename = 'pages/admin/'.$subpage.'.php';
							if (file_exists($filename)) {
						
								include($filename);
							
							}
							else {
							    
								include('pages/admin/admin_error.php');
							}
						}
						else
						{
							$subpage=null;
							include('pages/admin/admin_wlc.php');
						}
							
							
				?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#wrapper").toggleClass("toggled");
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<?php
	}
	else
	{
		header("location:index.php?page=login#loginuser");
	}
?>
				