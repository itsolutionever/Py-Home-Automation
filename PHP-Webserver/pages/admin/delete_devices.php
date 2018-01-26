<?php

if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='admin')
{


		include 'pages/connection.php';
		$device_id=$_GET['id'];
		
		
				
					
						// Create connection
							$conn = new mysqli($servername, $username, $password,$dbname);
						// Check connection
							if ($conn)
							{
								
								$sql="DELETE from devices WHERE device_unique_id='$device_id'";

									if(mysqli_query($conn,$sql))
									{
										
										echo "<script>confirm('Are You Sure?, You Want To Delete Device?');</script>";
										mysqli_close($con);
											
										header("location:index.php?page=admin&subpage=admin_view_devices");
									}
									else
									{
										die('Error: ' . mysqli_error($con));
										echo "<script>alert('Deletion failed...');</script>";
										header("location:index.php?page=admin&subpage=admin_view_devices");
									}

								mysqli_close($conn);
							}
}		
else
{
	header("location:index.php?page=login#loginuser");
}
?>


