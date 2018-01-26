<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='admin')
{
$email=$_SESSION['email'];

include'pages/connection.php';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn)
{
	echo"<center>";
	echo"<h2>Registered Devices Details</h2><hr/>";

	$result_web = mysqli_query($conn,"SELECT * FROM devices");
	if(!mysqli_num_rows($result_web))
	{
		echo"<br><br>";
		echo"<h2>Sorry, No Devices Registered Yet</h2>";
	}
	else
	{
		
		echo"<table>";
		echo"<div class=\"table-responsive\">";
		echo"<table class=\"table table-bordered table-hover table-striped\">";
		echo"<thead>
	            <tr>
	            	<th style=\"text-align:center;\">No.</th>
	                <th style=\"text-align:center;\">Owner</th>
	                <th style=\"text-align:center;\">MAC Address</th>
	                <th style=\"text-align:center;\">Gloabal IP Address</th>
	                <th style=\"text-align:center;\">Local IP Address</th>
	                <th style=\"text-align:center;\">Created At</th>
	                <th style=\"text-align:center;\">Status</th>
	                <th style=\"text-align:center;\">Change Status</th>
	                <th style=\"text-align:center;\">Delete</th>
	            </tr>
	        </thead>";
		echo"<tbody>";
		
		$count=1;
		while($row = mysqli_fetch_array($result_web))
		{
			
			echo"<tr class=\"danger\">";            
            echo"<td align=\"center\">".$count."</td>";                
			echo"<td align=\"center\">".$row['owner']."</td>";
			echo"<td align=\"center\">".$row['mac']."</td>";
			echo"<td align=\"center\">".$row['global_ip']."</td>";
			echo"<td align=\"center\">".$row['local_ip']."</td>";
			echo"<td align=\"center\">".$row['created_at']."</td>";

			if($row['status'] == 0)
			{
				echo"<td align=\"center\" style=\"color:red\">&nbsp;Not Active&nbsp;</td>";
			}
			elseif($row['status'] == 1)
			{
				echo"<td  align=\"center\" style=\"color:green\">&nbsp;Active&nbsp;</td>";
			}
			else
			{
				echo"<td align=\"center\">&nbsp;Unknown&nbsp;</td>";
			}

			echo"<td align=\"center\">";
			echo"<a href=\"index.php?&page=admin&subpage=change_devices&id=".$row['device_unique_id']."\"><i class=\"fa fa-refresh\" style=\"font-size:24px;color:skyblue\"/></a>";

			echo"</td>";
			echo"<td align=\"center\">";
			echo"<a href=\"index.php?&page=admin&subpage=delete_devices&id=".$row['device_unique_id']."\"><i class=\"fa fa-trash\" style=\"font-size:24px;color:red\"/></a>";
			echo"</td>";
			echo"</tr>";
			
			$count++;
			
		}
		echo"</tbody>";
		echo "</table>";
		echo"</center>";
	}
	
}
mysqli_close($conn);
}
else
{
	header("location:index.php?page=login#loginuser");
}
?>
