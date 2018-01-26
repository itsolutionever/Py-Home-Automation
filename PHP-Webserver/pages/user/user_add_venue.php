<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{


$_SESSION['event_title']=$_POST['event_title'];
$_SESSION['event_type']=$_POST['event_type'];
$_SESSION['no_of_gusts']=$_POST['no_of_gusts'];
$_SESSION['event_date']=$_POST['event_date'];


function venue_type(){
		include'pages/connection.php';
		$conn = new mysqli($servername, $username, $password,$dbname);
		if ($conn)
		{
			$result= mysqli_query($conn,"SELECT * FROM venue");
	
			
			echo"<select onchange=\"$('#venue_img').attr('src', this.options[this.selectedIndex].value);$('#venue_cost').attr('value', this.options[this.selectedIndex].id);\" class=\"form-control-center\" id=\"venue_type\" name=\"venue_type\" style=\"height:25px; width:195px;\"/>";
			while ($row = mysqli_fetch_array($result))
			{
				echo"<option id=".$row['cost']." value=".$row['img_path'].">".$row['type']."</option>";
			
			}
			echo"</select>";
		}
		mysqli_close($conn);

}
?>
<!--Write Code Here....--> 
<center>
				
<form action="index.php?page=user&subpage=user_add_facilities" method="post" id="newuser">
<table>


<div class="form-group">
			<tr>
			<td><label style="margin:0px; padding:0px;"><h2>Select Venue</h2></label></td>
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
			<td><?php venue_type();?><br><br></td>
			</tr>
			<tr>
			<td><label for="venue_image" style="margin:0px; padding:0px; font-size:13px;" name="venue_label" id="venue_label">Venue Image</label></td>
			</tr>
			<tr>
			<td><img src="" style="border:hidden;" height="250px" width="500px" name="venue_img" id="venue_img"/><br><br></td>
			</tr>
			<tr>
			<td><label for="venue_cost" style="margin:0px; padding:0px; font-size:13px;">Venue Cost</label></td>
			</tr>
			<tr>
			<td><input style="border:hidden;" type="text" value="" readonly="true" name="venue_cost" id="venue_cost"><br><br></td>
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
	<td><input type="submit" class="btn btn-success btn-md" name="next_button" value=" Next ❯ "/></td>
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

