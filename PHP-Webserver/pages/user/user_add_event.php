<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{


	function event_type(){
		include'pages/connection.php';
		$conn = new mysqli($servername, $username, $password,$dbname);
		if ($conn)
		{
			$result= mysqli_query($conn,"SELECT * FROM event_type");
	

			echo"<select class=\"form-control-center\" id=\"event_type\" name=\"event_type\" style=\"height:25px; width:195px;\"/>";
			while ($row = mysqli_fetch_array($result))
			{
				echo"<option value=".$row['id'].">".$row['e_type']."</option>";
			}
			echo"</select>";
		}
		mysqli_close($conn);
	}
?>
<!--Write Code Here....--> 
<center>
				
<form action="index.php?page=user&subpage=user_add_venue" method="post" id="newuser">
<table>


<div class="form-group">
			<tr>
			<td><label style="margin:0px; padding:0px;"><h2>Create New Event</h2></label></td>
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
			<td><label for="event" style="margin:0px; padding:0px; font-size:13px;">Event Title (required)</label></td>
			</tr>
			<tr>
			<td><input class="form-control-center" type="text" name="event_title" id="event_title" value="E.g. my birthday" /><br><br></td>
			</tr>
			<tr>
			<td><label for="event_type" style="margin:0px; padding:0px; font-size:13px;">Event Type  (required)</label></td>
			</tr>
			<tr>
			<td><?php event_type();?><br><br></td>
			</tr>
			<tr>
			<td><label for="event_gusts" style="margin:0px; padding:0px; font-size:13px;">No. Of Gusts  (required)</label></td>
			</tr>
			<tr>
			<td><input class="form-control-center" type="number" name="no_of_gusts" id="no_of_gusts" value="50" /><br><br></td>
			</tr>
			<tr>
			<td><label for="event_date" style="margin:0px; padding:0px; font-size:13px;">Event Date (required)</label></td>
			</tr>
			<tr>
			<td><input class="form-control-center" type="date" name="event_date" id="event_title" style="height:25px; width:195px;"/><br><br></td>
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
	<td><input type="submit" class="btn btn-success btn-md" name="next_button" value="Next ❯"/></td>
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
   
