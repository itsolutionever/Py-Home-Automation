<?php
		include 'connection.php';
		if (isset($_SESSION['sid']))
		{
			if($_SESSION['sid']==session_id())
			{
				header("Location:index.php"); 
			}
		
				$email_session=$_SESSION['email'];
				$fname_web = strval($_POST['fname']);
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
								if($_POST['password'] == null)
								{
									$sql = "UPDATE users SET fname='$fname_web',lname='$lname_web',mobile_no='$m_number_web',dob='$dob_web',city='$cityname_web',country='$countryname_web',gender='$gender_web',address='$address_web',updated_at=NOW() WHERE email='$email_session'";
								} else {
									$sql = "UPDATE users SET fname='$fname_web',lname='$lname_web',encrypted_password='$new_encrypted_password',salt='$salt',mobile_no='$m_number_web',dob='$dob_web',city='$cityname_web',country='$countryname_web',gender='$gender_web',address='$address_web',updated_at=NOW() WHERE email='$email_session'";
								}

								

								
 

									
									if(mysqli_query($conn,$sql))
									{
										echo "<script>alert('Details Updation Successfully...');</script>";
										
										if($_SESSION['login_type']=="user")
										{
											header('Location: index.php?page=user&subpage=user_edit_profile#actions');
										}else{
											header('Location: index.php?page=admin&subpage=admin_edit_profile#actions');
										}
									}
									else
									{
										echo "<script>alert('Details Updation failed...');</script>";
										if($_SESSION['login_type']=="user")
										{
											header('Location: index.php?page=user&subpage=user_edit_profile#actions');						}else{
											header('Location: index.php?page=admin&subpage=admin_edit_profile#actions');
										}
									}

								mysqli_close($conn);
							}
		}
	
?>
