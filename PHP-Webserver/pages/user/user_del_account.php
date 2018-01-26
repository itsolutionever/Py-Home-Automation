<?php
if($_SESSION['sid']==session_id() && $_SESSION['login_type']=='user')
{
?>
<div class="text-center">
		<i style="font-size:24px" class="fa"></i>
		<h1><i class="material-icons"style="font-size:125px;color:red;">&#xe160;</i></h1>
	        <h1>Are You Sure?</h1>
        	<h1><i class="material-icons" style="font-size:75px;color:red;">&#xe14b;</i></h1>
		<h3>You Want To Delete Account?</h3>
		<center>
		<table>
			<tr>
				<td><a href="index.php?page=delete_profile"><input type="reset" class="btn btn-danger btn-lg" name="yes" value="Yes"></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><a href="index.php?page=user&subpage=user_wlc"><input type="submit" class="btn btn-success btn-lg" name="no" value="&nbsp;No&nbsp;"></a></td>
			</tr>
		</table>
		</center>
	
</div>
<?php
}		
else
{
	header("location:index.php?page=login#loginuser");
}
?>
   
