<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='admin')
{


		include 'pages/connection.php';
		$no=$_GET['id'];
		
						// Create connection
							$conn = new mysqli($servername, $username, $password,$dbname);
						// Check connection
							if ($conn)
							{
								
								$sql="Delete from feedback where no='$no'";

									if(mysqli_query($conn,$sql))
									{
										
										echo "<script>confirm('Are You Sure?, You Want To Delete Account?');</script>";
										mysqli_close($con);	
										header("location:index.php?page=admin&subpage=admin_feedback");
									}
									else
									{
										die('Error: ' . mysqli_error($con));
										echo "<script>alert('Feedback Deletion failed...');</script>";
										header("location:index.php?page=admin&subpage=admin_feedback");
									}

								mysqli_close($conn);
							}
}		
else
{
	header("location:index.php?page=login#loginuser");
}
?>



