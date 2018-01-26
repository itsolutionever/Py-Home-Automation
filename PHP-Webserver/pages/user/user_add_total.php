<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{

$_SESSION['decoration_type']=implode(',', $_POST['decoration_type']);
$email=$_SESSION['email'];
$event_title=$_SESSION['event_title'];
$event_type=$_SESSION['event_type'];
$no_of_gusts=$_SESSION['no_of_gusts'];
$event_date=$_SESSION['event_date'];
$venue_type=$_SESSION['venue_type'];
$facilities_type=$_SESSION['facilities_type'];
$food_type=$_SESSION['food_type'];
$decoration_type=$_SESSION['decoration_type'];
include'pages/connection.php';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn)
{

	$sql = "INSERT INTO events VALUES ('','$email','$event_title','$event_type','$no_of_gusts','$event_date','$venue_type','$facilities_type','$food_type','$decoration_type',50000,'remain','')";
	
	$result_web = mysqli_query($conn,$sql);
	
	if($result_web)
	{	
		echo"<script>Event Saved Successfully...</script>";
	}
	function total_cost()
	{
		echo"50000";
	}
	
	
	
}
mysqli_close($conn);


?>
<!--Write Code Here....--> 
<center>
				
<form action="index.php?page=user&subpage=user_payment" method="post" id="newuser">
<table>


<div class="form-group">
			<tr>
			<td align=\"center\"><h2 align="center">Final Cost</h2></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td><h2 align="center">Total Cost :<?php total_cost();?> <i class="fa fa-inr" style="color:green"></i></h2><br><br></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td><h3 style="color:green;" align="center">Your Event Has Been Saved...</h3></label></td>
			</tr>
			<tr>
			<td><h4 style="color:red;" align="center">Note:Please To Active It Complete The Payment Process</h4></label></td>
			</tr>
			
			

</div> 
</table>
<table>                   
	<tr>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td><input type="submit" class="btn btn-success btn-md" name="next_button" value=" Pay ❯ "/></td>
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
   
