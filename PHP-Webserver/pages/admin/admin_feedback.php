<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='admin')
{
	$email=$_SESSION['email'];

	include'pages/connection.php';
	$conn = new mysqli($servername, $username, $password,$dbname);
	if ($conn)
	{
		echo"<center>";
		echo"<h2>Feedbacks</h2><hr/>";

		$result_web = mysqli_query($conn,"SELECT * FROM feedback");
		if(!mysqli_num_rows($result_web))
		{
			echo"<br><br>";
			echo"<h2>Sorry, No Feedbacks Yet</h2>";
		}
		else
		{
			
			echo"<table>";
			echo"<div class=\"table-responsive\">";
			echo"<table class=\"table table-bordered table-hover table-striped\">";
			echo"<thead>
		            <tr>
		            	<th style=\"text-align:center;\">No.</th>
		                <th style=\"text-align:center;\">User Name</th>
		                <th style=\"text-align:center;\">Email</th>
		                <th style=\"text-align:center;\">User Type</th>
		                <th style=\"text-align:center;\">Date</th>
		                <th style=\"text-align:center;\">Feedback Type</th>
		                <th style=\"text-align:center;\">Feedback</th>
		                <th style=\"text-align:center;\">Delete</th>
		            </tr>
		        </thead>";
			echo"<tbody>";
			
			$count=1;
			while($row = mysqli_fetch_array($result_web))
			{
	            echo"<tr class=\"success\">";
	            echo"<td align=\"center\">".$count."</td>";
				echo"<td align=\"center\">".$row['name']."</td>";
				echo"<td align=\"center\">".$row['email']."</td>";
				echo"<td align=\"center\">".$row['user_type']."</td>";
				echo"<td align=\"center\">".$row['date']."</td>";
				echo"<td align=\"center\">".$row['feedback_type']."</td>";
				echo"<td align=\"center\">".$row['feedback']."</td>";
				echo"<td align=\"center\">";
				echo"<a href=\"index.php?&page=admin&subpage=delete_feedbacks&id=".$row['no']."\"><i class=\"fa fa-trash\"style=\"font-size:24px;color:red\"/></a>";
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
