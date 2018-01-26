<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='admin')
{
?>
<!--Write Code Here....--> 
 
<center><h1>Hello Seller</h1></center>
<?php
}
else
{
	header("location:index.php?page=login#loginuser");
}
?>
   
