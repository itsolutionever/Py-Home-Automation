<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='admin')
{
?>

<div class="text-center">
<br/>
	    <h1><i class="material-icons"style="font-size:125px;color:red;">&#xe14b;</i></h1>
            <h1>404, Error</h1>
            <h1><i class="material-icons" style="font-size:75px;color:red;">&#xe160;</i></h1>
	    <h3>Page Not Found On Server...</h3>
</div>

<?php
}		
else
{
	header("location:index.php?page=login#loginuser");
}
?>
