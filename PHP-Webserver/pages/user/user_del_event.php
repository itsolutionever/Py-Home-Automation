<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{

$email=$_SESSION['email'];

include'pages/connection.php';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn)
{

	$result_web = mysqli_query($conn,"SELECT fname,lname,user_type FROM registration WHERE email ='$email'");
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
				
<form action="index.php?page=user&subpage=user_del_event" method="post" id="newuser">
<table>
<div class="form-group">
			<tr>
			<td><label style="margin:0px; padding:0px;"><h2>Delete Events</h2></label></td>
			</tr>
</div>                  
</table>
<font size="5px">Enter Event-ID Of Event Which You Want To Delete...</font>
			
<table>
<div class="form-group">	
			<tr>
			<td><label for="name" style="margin:0px; padding:0px; font-size:13px;">Event ID (required)</label></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-center" id="eid" name="eid" size="10%" value="0"/></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
</div>                  
</table>
<table>
	<tr>
		<td><input type="submit" class="btn btn-danger btn-md" name="submit_button" value="Delete Event"></td>
	</tr>
</table>
</form>
</center> 

<?php
	
		
		
			if(isset($_POST['submit_button']))
			{
				
				$eid = strval($_POST['eid']);					
				if($eid==0)
				{
					
				}
				else
				{	
				// Create connection
					$conn = new mysqli($servername, $username, $password,$dbname);
				// Check connection
					if ($conn)
					{
						$sql = "SELECT creator FROM events WHERE id =".$eid;

						
							
						
							if($result=mysqli_query($conn,$sql))
							{
									$row = mysqli_fetch_array($result);
								  
									if($row['creator'] == $email)
									{
										$sql1 = "DELETE FROM events WHERE id=".$eid;
										if($row=mysqli_query($conn,$sql1)&& $eid!=null)
										{
										?>
										<div class="form-control-center">
										<script>alert('Event Deleted Successfully...');</script>
										<center><h1 style="color:green;">Event Deleted</h1></center>
										</div>
										<?php
										}	
									}
								
								else
								{
									?>
									<div class="form-control-center">
									<script>alert('Event Not Deleted');</script>
									<center><h1 style="color:red;">You Have No Rights To Delete This Event</h1></center>
									</div>
									<?php			
								}
							}
							else
							{?>
									<div class="form-control-center">
									<script>alert('Event Not Deleted');</script>
									<center><h1 style="color:red;">Event Not Deleted</h1></center>
									</div>
							<?php	
							}

						mysqli_close($conn);
					}
			
			


		}
	}	

	}
	else
	{
		header("location:index.php?page=login#loginuser");
	}

?>
