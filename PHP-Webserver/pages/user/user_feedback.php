<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{

$email=$_SESSION['email'];

include'pages/connection.php';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn)
{

	$result_web = mysqli_query($conn,"SELECT fname,lname,user_type FROM users WHERE email ='$email'");
	$row = mysqli_fetch_array($result_web);
	
	$fname = $row['fname'];
	$lname = $row['lname'];
	$name = $fname.' '.$lname;
	$user_type = $row['user_type'];
	
}
mysqli_close($conn);

?>
<!--Write Code Here....--> 

<center>
<h2>Feedback</h2><hr/>
		
<form action="index.php?page=user&subpage=user_feedback" method="post" id="newuser">
<table>
<div class="form-group">
			<tr>
			<td><center><label style="margin:0px; padding:0px;"><h3>Submit Your Feedback</h3></label></center></td>
			</tr>
</div>
<div class="form-group">
			<tr>
			<td>&nbsp;</td>
			</tr>
</div>
			
</div>
<div class="form-group">
			<tr>
			<td><label for="feedback" style="margin:0px; padding:0px; font-size:13px;">Your Feedback (required)</label></td>
			</tr>
			<tr>
			<td><textarea name="feedback" cols="30" rows="10" id="feedback" ></textarea></td>
			</tr>
	</div>
<div class="form-group">
			<tr>
			<td>&nbsp;</td>
			</tr>
</div>
	<div class="form-group">
							<tr>
							<td><label for="feedback_type" style="margin:0px; padding:0px; font-size:13px;">Feedback review  (required)</label></td>
							</tr>
							<tr>
							<td>
								<select class="form-control-center" id="feedback_type" name="feedback_type" style="height:26px; width:290px;"/>
								<option value="positive">Positive</option>
								<option value="nutral" selected>Nutral</option>
								<option value="negative">Negative</option>
								</select></td>
							</tr>
					</div>
<div class="form-group">
			<tr>
			<td>&nbsp;</td>
			</tr>
</div>                  
</table>
<table>
	<tr>
		<td><input type="submit" class="btn btn-success btn-md" name="submit_button" value="Submit Feedback"></td>
	</tr>
</table>
</form>
</center> 

<?php
	
		
		
			if(isset($_POST['submit_button']))
			{
				
				$name_web = $name;
				$date_web = date("Y-m-d"); 
				$email_web = $email;
				$user_type_web = $user_type;
				$feedback_type_web = strval($_POST['feedback_type']);
				
				$feedback_web = strval($_POST['feedback']);
					
					
						// Create connection
							$conn = new mysqli($servername, $username, $password,$dbname);
						// Check connection
							if ($conn)
							{
								$insert_web = "INSERT INTO feedback VALUES ('','$name_web','$email_web','$user_type_web','$date_web','$feedback_type_web','$feedback_web')";

								

								
									if(mysqli_query($conn,$insert_web)&& $name_web!=null && $email_web!=null && $user_type_web!=null && $date_web!=null && $feedback_type_web!=null && $feedback_web!=null)
									{
										?>
										<div class="form-control-center">
										<script>alert('feedback submitted Successfully...');</script>
										<center><h1 style="color:lightgreen;">Thankyou For Submitting Feedback...</h1></center>
										</div>
										<?php
									}
									else
									{?>
										<div class="form-control-center">
										<script>alert('feedback submission failed...');</script>
										<center><h1 style="color:lightred;">Submitting Feedback failed...</h1></center>
										</div>
									<?php
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
