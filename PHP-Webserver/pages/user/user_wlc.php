<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{
?>
<div class="text-center">
 <h2>Dashboard</h2><hr/>

		<?php
			include'pages/connection.php';
			$conn = new mysqli($servername, $username, $password,$dbname);
			if ($conn)
			{
				$email = $_SESSION['email'];
				$sql="SELECT profile_pic, fname FROM users WHERE email='$email'";
				$result= mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				echo"<img class=\"img-circle\" height=\"200px\" width=\"200px\" src='".$row['profile_pic']."'/>";
				echo"<h1>Welcome ".$row['fname']."</h1>";
			}
			mysqli_close($conn);
		?>
		<h1><span class="glyphicon" style="font-size:50px;color:lightblue;">&#xe128;</span></h1>
	    <h3>Your Actions are in Menu</h3>
</div>
<?php
}		
else
{
	header("location:index.php?page=login#loginuser");
}
?>
