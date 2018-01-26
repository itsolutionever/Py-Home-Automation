<?php
		include 'connection.php';
		if (isset($_SESSION['sid']))
		{
		
				
					
						// Create connection
							$conn = new mysqli($servername, $username, $password,$dbname);
						// Check connection
							if ($conn)
							{
								
								$del=$_SESSION['email'];
								$sql="Delete from users where email='$del'";

									if(mysqli_query($conn,$sql))
									{
										
										echo "<script>confirm('Are You Sure?, You Want To Delete Account?');</script>";
										mysqli_close($con);
											
										header("location:index.php?page=logout");
									}
									else
									{
										die('Error: ' . mysqli_error($con));
										echo "<script>alert('Details Updation failed...');</script>";
										header('Location: index.php?page=user&subpage=user_error');
									}

								mysqli_close($conn);
							}
		}
	
?>

