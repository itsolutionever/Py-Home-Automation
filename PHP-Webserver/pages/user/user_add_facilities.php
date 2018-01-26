<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{
$_SESSION['venue_type']=$_POST['venue_type'];





function facilities_type(){
		include'pages/connection.php';
		$conn = new mysqli($servername, $username, $password,$dbname);
		if ($conn)
		{
			$result= mysqli_query($conn,"SELECT * FROM facilities");
	

			echo"<center><table>";
			
			while ($row = mysqli_fetch_array($result))
			{
				echo"<tr>";
				echo"<td rowspan=\"2\">";
				echo"<input type=\"checkbox\" name=\"facilities_type[]\" value=".$row['type']."><br><br></td><td>&nbsp;&nbsp;&nbsp;</td><td>".$row['type']."</td><tr>";
				echo"<td>&nbsp;&nbsp;&nbsp;</td><td>Cost:".$row['cost']."RS.</td></tr>";
			}
			echo"</table></center>";
			
		}
		mysqli_close($conn);

}
?>
<!--Write Code Here....--> 
<center>
				
<form action="index.php?page=user&subpage=user_add_food" method="post" id="newuser">
<table>


<div class="form-group">
			<tr>
			<td><label style="margin:0px; padding:0px;"><h2>Select The Facilities</h2></label></td>
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
			<td><?php facilities_type();?><br><br></td>
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
   
