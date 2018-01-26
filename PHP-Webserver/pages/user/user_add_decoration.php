<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{

$_SESSION['food_type']=implode(',', $_POST['food_type']);

function decoration_type(){
		include'pages/connection.php';
		$conn = new mysqli($servername, $username, $password,$dbname);
		if ($conn)
		{
			$result= mysqli_query($conn,"SELECT * FROM decoration");
	

			echo"<table>";
			while ($row = mysqli_fetch_array($result))
			{
				echo"<tr><td><input type=\"checkbox\" class=\"form-control-center\" id=\"decoration_type\"  value=".$row['type']." name=\"decoration_type[]\" style=\"height:25px; width:20px;\"/><td><td align=\"right\">";
				echo$row['type']."</td><td>&nbsp;:&nbsp;</td><td>";
				echo$row['cost']."</td></tr>";
			}
			echo"</table>";
		}
		mysqli_close($conn);

}
?>
<!--Write Code Here....--> 
<center>
				
<form action="index.php?page=user&subpage=user_add_total" method="post" id="newuser">
<table>


<div class="form-group">
			<tr>
			<td><label style="margin:0px; padding:0px;"><h2>Select Decoration</h2></label></td>
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
			<td><?php decoration_type();?><br><br></td>
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
	<td><input type="submit" class="btn btn-info btn-md" name="next_button" value=" Calculate ❯ "/></td>
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
   
