<?php

if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='admin')
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

								$sql1="SELECT status FROM devices WHERE device_unique_id='$device_id'";
								
								$result = $conn->query($sql1);
								$row = $result->fetch_assoc();
								
									    
								if($row["status"] == 0)
									{
										
										$sql="UPDATE devices SET status = '1' WHERE device_unique_id='$device_id'";

										if(mysqli_query($conn,$sql))
										{
											
											echo "<script>confirm('Are You Sure?, You Want To Change Status?');</script>";
											mysqli_close($con);
												
											header("location:index.php?page=admin&subpage=admin_view_devices");
										}
										else
										{
											die('Error: ' . mysqli_error($con));
											echo "<script>alert('Status Updation failed...');</script>";
											header("location:index.php?page=admin&subpage=admin_view_devices");
										}
									}
									else
									{
										$sql="UPDATE devices SET status = '0' WHERE device_unique_id='$device_id'";

										if(mysqli_query($conn,$sql))
										{
											
											echo "<script>confirm('Are You Sure?, You Want To Change Status?');</script>";
											mysqli_close($con);
												
											header("location:index.php?page=admin&subpage=admin_view_devices");
										}
										else
										{
											die('Error: ' . mysqli_error($con));
											echo "<script>alert('Status Updation failed...');</script>";
											header("location:index.php?page=admin&subpage=admin_view_devices");
										}
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


