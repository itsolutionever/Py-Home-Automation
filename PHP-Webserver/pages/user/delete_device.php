<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{
		include 'pages/connection.php';
		$device_id=$_GET['id'];
		if (isset($_SESSION['sid']))
		{
		
				
					
						// Create connection
							$conn = new mysqli($servername, $username, $password,$dbname);
						// Check connection
							if ($conn)
							{
								
								$sql="Delete from devices where device_unique_id='$device_id'";

									if(mysqli_query($conn,$sql))
									{
										
										echo "<script>confirm('Are You Sure?, You Want To Delete Account?');</script>";
										mysqli_close($con);
											
										header("location:index.php?page=user&subpage=user_view_devices");
									}
									else
									{
										die('Error: ' . mysqli_error($con));
										echo "<script>alert('Details Updation failed...');</script>";
										header("location:index.php?page=user&subpage=user_view_devices");
									}

								mysqli_close($conn);
							}
		}
	
}		
else
{
	header("location:index.php?page=login#loginuser");
}
?>


