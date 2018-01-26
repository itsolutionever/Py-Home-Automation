<?php
include 'connection.php';
if($_GET['s']==1)	//login
{
		
					
				if(isset($_POST['login_button']))
				{
				
					$uname_web = $_POST['reg_email'];
					$passwd_web1 = $_POST['reg_password'];
					$passwd_web = md5($passwd_web1);
				
				// Create connection
					$conn = new mysqli($servername, $username, $password,$dbname);
					
				// Check connection
					if ($conn)
					{
						
						$result_web = mysqli_query($conn,"SELECT * FROM users WHERE email='$uname_web'");

						if($row = mysqli_fetch_array($result_web))
							{
							$salt = $row['salt'];
						        $encrypted_password = $row['encrypted_password'];
						        $hash = base64_encode(sha1($passwd_web1 . $salt, true) . $salt);

						        // check for password equality
						        if ($encrypted_password == $hash) {
						            // user authentication details are correct
						            if("admin" == $row['user_type'])
									{	
										ob_start();
										session_start();
										$_SESSION['sid']=session_id();
										$_SESSION["login_type"] = "admin";
										$_SESSION["email"] = $uname_web;
										header("Location: index.php?page=admin#actions");
										ob_end_flush();  
										exit;
									}
									elseif("user" == $row['user_type'])
									{	
										ob_start();
										session_start();
										$_SESSION['sid']=session_id();
										$_SESSION["login_type"] = "user";
										$_SESSION["email"] = $uname_web;
										header("Location: index.php?page=user#actions");
										ob_end_flush();  
										exit;
									}
									else
									{
								
										echo "<script>alert('Sorry incorrect 'User' type... contect Admin');</script>";
										//ERROR-> if password is worng user can't see that msg 
										header("Location: index.php?page=login");
										ob_end_flush(); 
									}
						        }
						        } else {
						            echo "<script>alert('Sorry incorrect username or password... try again');</script>";
									//ERROR-> if password is worng user can't see that msg 
									header("Location: index.php?page=login");
									ob_end_flush(); 
						        }
							} else {
								echo "<script>alert('Sorry, you are not Registerd with us...! SignUp Now...);</script>";
								//ERROR-> if password is worng user can't see that msg 
								header("Location: index.php?page=signup");
								ob_end_flush(); 
							}

						
						mysqli_close($conn);
					
				}
			
			
		

}
else if($_GET['s']==2)	//signup
{

	if (isset($_SESSION['sid']))
	{
		if($_SESSION['sid']==session_id())
		{
			header("Location:index.php"); 
		}
	}
	else
	{
		if(isset($_POST['signup_button']))
		{
			
			$fname_web = strval($_POST['fname']);
			$lname_web = strval($_POST['lname']);
			$email_web = strval($_POST['email']);
			$password_web = strval($_POST['password']);
			$conformpassword_web = strval($_POST['conformpassword']);
			$dob_web = strval($_POST['dob']);
			$user_type_web = 'user';
			$gender_web = strval($_POST['gender']);
			$m_number_web = strval($_POST['mobile_number']);
			$address_web = strval($_POST['address']);
			$cityname_web = strval($_POST['city']);
			$countryname_web = strval($_POST['country']);
			// MD5 password
			function hashSSHA($password) {

				$salt = sha1(rand());
				$salt = substr($salt, 0, 10);
				$encrypted = base64_encode(sha1($password . $salt, true) . $salt);
				$hash = array("salt" => $salt, "encrypted" => $encrypted);
				return $hash;
			    }
			$img_path=null;
			//////////////////////////////////////
			$uuid = uniqid('', true);
			$hash = hashSSHA($_POST['password']);
			$encrypted_password = $hash["encrypted"]; // encrypted password
			$salt = $hash["salt"]; // salt
			//NOW()
			

			//IMAGE UPLOAD CODE
				if(isset($_FILES['image']))
				{
				    $errors= array();
				    $file_name = $_FILES['image']['name'];
				    $file_size = $_FILES['image']['size'];
				    $file_tmp = $_FILES['image']['tmp_name'];
				    $file_type = $_FILES['image']['type'];
					$tmp = explode('.',$_FILES['image']['name']);
					$file_extension = end($tmp);
				    $file_ext=strtolower($file_extension);
				    
				    $expensions= array("jpeg","jpg","png");
				     
				    if(in_array($file_ext,$expensions)=== false)
				    {
						$errors[]="extension not allowed, please choose a JPEG or PNG file.";
				    }
				      
				    if($file_size > 2097152)
				    {
						$errors[]='File size must be excately 2 MB';
				    }
				      
				    if(empty($errors)==true)
				    {
						move_uploaded_file($file_tmp,"img/profile_pic/".$file_name);
						$img_path="img/profile_pic/".$file_name;
					 	//echo "<center><h2 style=\"color:green\">Success</h2></center>";
				    }
				    else
				    {
					 	print_r($errors);
				    }
				}		



				if($password_web != $conformpassword_web)
				{
					echo "<script>alert('Password do not match...');</script>";
				}
				else
				{
					// Create connection
						$conn = new mysqli($servername, $username, $password,$dbname);
					// Check connection
						if ($conn)
						{
							
							$sql = "INSERT INTO users VALUES ('','$uuid','$fname_web','$lname_web','$email_web','$encrypted_password','$salt','$m_number_web','$dob_web','$user_type_web','$img_path','$cityname_web','$countryname_web','$gender_web','$address_web',NOW(),'')";


								
								if(mysqli_query($conn,$sql) && $fname_web!=null && $lname_web!=null && $email_web!=null && $encrypted_password!=null && $conformpassword_web!=null && $m_number_web!=null && $dob_web!=null && $address_web!=null)
								{
									echo "<script>alert('E-Mail Registered Successfully...');</script>";
								}
								else
								{
									echo "<script>alert('E-Mail Registeration failed...');</script>";
								}

							mysqli_close($conn);
						}
				}
		}


	}
	

}
else if($_GET['s']==3)	//logout
{

			ob_start();
			session_start();
			session_destroy();
			setcookie(PHPSESSID,session_id(),time()-1);
			header("location:index.php");
			ob_end_flush();

}
?>		