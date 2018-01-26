<?php
		include 'connection.php';
		if (isset($_SESSION['sid']))
		{
			if($_SESSION['sid']==session_id())
			{
				header("Location:index.php"); 
			}
		
				$email_session=$_SESSION['email'];
				$fname_web = strval($_POST['']);
				$lname_web = strval($_POST['lname']);
				$dob_web = strval($_POST['dob']);
				$user_type_web = strval($_POST['user_type']);
				$gender_web = strval($_POST['gender']);
				$m_number_web = strval($_POST['mobile_number']);
				$address_web = strval($_POST['address']);
				$cityname_web = strval($_POST['city']);
				$countryname_web = strval($_POST['country']);
				echo$new_password;
				$new_password = strval($_POST['password']);
				
				if($_POST['password'] == null)
				{
				
				} else {
////////////////////////////////////////////////////////////////////////////////////////////////////////
				function hashSSHA($passwords) {

					$salt = sha1(rand());
					$salt = substr($salt, 0, 10);
					$encrypted = base64_encode(sha1($passwords . $salt, true) . $salt);
					$hash = array("salt" => $salt, "encrypted" => $encrypted);
					return $hash;
				}
				
				$hash = hashSSHA($_POST['password']);
				$new_encrypted_password = $hash["encrypted"]; // encrypted password
				$salt = $hash["salt"]; // salt
				}
				//////////////////////////////////////
				
				
					
						// Create connection
							$conn = new mysqli($servername, $username, $password,$dbname);
						// Check connection
							if ($conn)
							{
								
							$sql = "UPDATE commands SET oncommand='$fname_web',offcommmand='$lname_web' WHERE owner='$email_session' and number_of_device=1";
								
								

								
 

									
									if(mysqli_query($conn,$sql))
									{
										echo "<script>alert('Details Updation Successfully...');</script>";
										
										if($_SESSION['login_type']=="user")
										{
											header('Location: index.php?page=user&subpage=user_user_set__commands');
										}else{
											header('Location: index.php?page=admin&subpage=admin_set__commands');
										}
									}
									else
									{
										echo "<script>alert('Details Updation failed...');</script>";
										if($_SESSION['login_type']=="user")
										{
											header('Location: index.php?page=user&subpage=user_set__commands');						}else{
											header('Location: index.php?page=admin&subpage=admin_set__commands');
										}
									}

								mysqli_close($conn);
							}
		}
	
?>
