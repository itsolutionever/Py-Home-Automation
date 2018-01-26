<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{
$email=$_SESSION['email'];

include'pages/connection.php';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn)
{
	echo"<center>";
	echo"<h2>Messages History</h2><hr/>";

	$result_web = mysqli_query($conn,"SELECT * FROM history WHERE owner ='$email'");
	if(!mysqli_num_rows($result_web))
	{
		echo"<br><br>";
		echo"<h2>Sorry, No Messages Present Yet</h2>";
	}
	else
	{
		
		echo"<table>";
		echo"<div class=\"table-responsive\">";
		echo"<table class=\"table table-bordered table-hover table-striped\">";
		echo"<thead>
	            <tr>
	                <th style=\"text-align:center\">No.</th>
	                <th style=\"text-align:center\">Message</th>
	                <th style=\"text-align:center\">Time</th>
	                <th style=\"text-align:center\">Host Type</th>
	                <th style=\"text-align:center\">Status</th>
	                <th style=\"text-align:center\">Delete Message</th>
	            </tr>
	        </thead>";
		echo"<tbody>";
		
		$count=1;
		while($row = mysqli_fetch_array($result_web))
		{
			
			
			echo"<tr class=\"success\">";                            
			echo"<td align=\"center\">".$count."</td>";
			echo"<td align=\"center\">".$row['message']."</td>";
			echo"<td align=\"center\">".$row['time']."</td>";
			echo"<td align=\"center\">".$row['host_type']."</td>";

			if($row['status'] == 0)
			{
				echo"<td align=\"center\" style=\"color:red\">&nbsp;Not Send&nbsp;</td>";
			}
			elseif($row['status'] == 1)
			{
				echo"<td  align=\"center\" style=\"color:green\">&nbsp;Send&nbsp;</td>";
			}
			else
			{
				echo"<td align=\"center\">&nbsp;Unknown&nbsp;</td>";
			}

			echo"<td align=\"center\">";
			echo"<a href=\"index.php?&page=user&subpage=delete_message&id=".$row['id']."\"><i class=\"fa fa-trash\" style=\"font-size:24px;color:red\"/></a>";
			echo"</td>";
			echo"</tr>";
			
			$count=$count+1;
			
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
