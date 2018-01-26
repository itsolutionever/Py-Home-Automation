<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='admin')
{

$email=$_SESSION['email'];

include'pages/connection.php';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn)
{

	$result_web = mysqli_query($conn,"SELECT * FROM users WHERE email ='$email'");
	$row = mysqli_fetch_array($result_web);
	
	$fname = $row['fname'];
	$lname = $row['lname'];
	$email = $row['email'];
	$mobile_no = $row['mobile_no'];
	$date = 
	$dob = strtotime($row['dob']);
	$dob = date('d-m-Y', $dob);
	
	$city = $row['city'];
	$country = $row['country'];
	$gender = $row['gender'];
	$address = $row['address'];
}
mysqli_close($conn);

?>
<!--Write Code Here....--> 
<center>
<h2>Edit Profile</h2><hr/>	
	
<form action="index.php?page=update_profile" method="post" id="newuser">
<table>
	<div class="form-group">
			<tr>
			<td><label for="name" style="margin:0px; padding:0px; font-size:13px;">First Name (required)</label></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-center" id="fname" name="fname" size="30%" value="<?php echo$fname?>"/><br><br></td>
			</tr>
	</div>
	<div class="form-group">
			<tr>
			<td><label for="name" style="margin:0px; padding:0px; font-size:13px;">Last Name  (required)</label></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-center" id="lname" name="lname" size="30%" value="<?php echo$lname?>"/><br><br></td>
			</tr>
	</div>
	<div class="form-group">
			<tr>
			<td><label for="email" style="margin:0px; padding:0px; font-size:13px;">Email Address (required)</label></td>
			</tr>
			<tr>
			<td><input type="email" class="form-control-center" id="email" name="email" size="30%" value="<?php echo$email?>"/><br><br></td>
			</tr>
	</div>
	<div class="form-group">
			<tr>
			<td><label for="password" style="margin:0px; padding:0px; font-size:13px;">Edit New Password</label></td>
			</tr>
			<tr>
			<td><input type="password" class="form-control-center" id="password" name="password" size="30%" value=""/><br><br></td>
			</tr>
	</div>
	<div class="form-group">
			<tr>
			<td><label for="mobile_number" style="margin:0px; padding:0px; font-size:13px;">Mobile No. (required without any country code)</label></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-center" id="mobile_number" name="mobile_number" size="30%" value="<?php echo$mobile_no?>"/><br><br></td>
			</tr>
	</div> 
	<div class="form-group">
			<tr>
			<td><label for="date" style="margin:0px; padding:0px; font-size:13px;">Date Of Birth (required)</label></td>
			</tr>
			<tr>
			<td><input type="date" class="form-control-center" id="dob" name="dob" style="height:25px; width:285px;" value="<?php echo$newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$dob);?>"/><br><br></td>
			</tr>
	</div> 
	<div class="form-group">
			
	</div>
	<div class="form-group">
			<tr>
			<td><label for="city" style="margin:0px; padding:0px; font-size:13px;">City  (required)</label></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-center" id="city" name="city" size="30%" value="<?php echo$city?>"/><br><br></td>
			</tr>
	</div> 
	<div class="form-group">
			<tr>
			<td><label for="country" style="margin:0px; padding:0px; font-size:13px;">Country  (required)</label></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-center" id="country" name="country" size="30%" value="<?php echo$country?>"/><br><br></td>
			</tr>
	</div>        
	<div class="form-group">
			<tr>
			<td><label for="gender" style="margin:0px; padding:0px; font-size:13px;">Gender</label></td>
			</tr>
			<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php if($gender =='Male'){?>
				<input id="male" name="gender" type="radio" value="Male" checked="checked"/>Male &nbsp;
				<input id="female" name="gender" type="radio" value="Female"/>Female
			<?php }else{?>
				<input id="male" name="gender" type="radio" value="Male"/>Male &nbsp;
				<input id="female" name="gender" type="radio" value="Female" checked="checked"/>Female
			<?php }?>
			<br><br></td>
			</tr>
	</div>
	<div class="form-group">
			<tr>
			<td><label for="message" style="margin:0px; padding:0px; font-size:13px;">Address (required)</label></td>
			</tr>
			<tr>
			<td><textarea name="address" cols="30" id="address" ><?php echo$address?></textarea><br><br></td>
			</tr>
	</div>                  
</table>
<table>
	<tr>
		<td><input type="reset" class="btn btn-danger btn-md" name="reset_button" value="Reset Account Info"></td>
		<td><input type="submit" class="btn btn-success btn-md" name="signup_button" value="Update Account Info"></td>
	</tr>
</table>
</form>
</center> 

<?php
	}
	else
	{
		header("location:index.php?page=login#loginuser");
	}

?>
