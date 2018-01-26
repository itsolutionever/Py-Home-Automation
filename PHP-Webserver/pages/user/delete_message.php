<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{
		include 'pages/connection.php';
		$id=$_GET['id'];
		if (isset($_SESSION['sid']))
		{
		
				
					
						// Create connection
							$conn = new mysqli($servername, $username, $password,$dbname);
						// Check connection
							if ($conn)
							{
								
								$sql="Delete from history where id='$id'";

									if(mysqli_query($conn,$sql))
									{
										
										echo "<script>confirm('Are You Sure?, You Want To Delete Message?');</script>";
										mysqli_close($con);
											
										header("location:index.php?page=user&subpage=user_view_history");
									}
									else
									{
										die('Error: ' . mysqli_error($con));
										echo "<script>alert('Message Deletation Failed...');</script>";
										header("location:index.php?page=user&subpage=user_view_history");
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


