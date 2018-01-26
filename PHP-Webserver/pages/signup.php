<center>
	<form action="index.php?page=services&s=2" method="post" id="newuser" enctype = "multipart/form-data">
			<h2>Hi There! Signup Here...</h2>
			<h5>We'll get you set up on 'Py-Home-Automation' in three easy steps! Just answer a few simple questions, register your Email and set yor password & you'll be set...</h5>
			<table>
				<div class="form-group">
						<tr>
						<td><label for="name" style="margin:0px; padding:0px; font-size:13px;">First Name (required)</label></td>
						</tr>
						<tr>
						<td><input type="text" class="form-control-center" id="fname" name="fname" size="30%"/><br><br></td>
						</tr>
				</div>
				<div class="form-group">
						<tr>
						<td><label for="name" style="margin:0px; padding:0px; font-size:13px;">Last Name  (required)</label></td>
						</tr>
						<tr>
						<td><input type="text" class="form-control-center" id="lname" name="lname" size="30%"/><br><br></td>
						</tr>
				</div>
				<div class="form-group">
						<tr>
						<td><label for="email" style="margin:0px; padding:0px; font-size:13px;">Email Address (required)</label></td>
						</tr>
						<tr>
						<td><input type="email" class="form-control-center" id="email" name="email" size="30%"/><br><br></td>
						</tr>
				</div>
				<div class="form-group">
						<tr>
						<td><label for="password" style="margin:0px; padding:0px; font-size:13px;">Password (required)</label></td>
						</tr>
						<tr>
						<td><input type="password" class="form-control-center" id="password" name="password" size="30%"/><br><br></td>
						</tr>
				</div>
				<div class="form-group">
						<tr>
						<td><label for="conformpassword" style="margin:0px; padding:0px; font-size:13px;">Conform Password (required)</label></td>
						</tr>
						<tr>
						<td><input type="password" class="form-control-center" id="conformpassword" name="conformpassword" size="30%""/><br><br></td>
						</tr>
				</div> 
				<div class="form-group">
						<tr>
						<td><label for="mobile_number" style="margin:0px; padding:0px; font-size:13px;">Mobile No. (required)</label></td>
						</tr>
						<tr>
						<td><input type="number_format" class="form-control-center" id="mobile_number" name="mobile_number" size="30%""/><br><br></td>
						</tr>
				</div> 
				<div class="form-group">
						<tr>
						<td><label for="date" style="margin:0px; padding:0px; font-size:13px;">Date Of Birth (required)</label></td>
						</tr>
						<tr>
						<td><input type="date" class="form-control-center" id="dob" name="dob" style="height:25px; width:285px;"""/><br><br></td>
						</tr>
				</div> 
				<div class="form-group">
						<tr>
						<td><label for="img" style="margin:0px; padding:0px; font-size:13px;">Profile Picture (required)</label></td>
						</tr>
						<tr>
						<td><input type = "file" name = "image" />
							<br></td>
						</tr>
				</div>
				<div class="form-group">
						<tr>
						<td><label for="city" style="margin:0px; padding:0px; font-size:13px;">City  (required)</label></td>
						</tr>
						<tr>
						<td><input type="text" class="form-control-center" id="city" name="city" size="30%""/><br><br></td>
						</tr>
				</div> 
				<div class="form-group">
						<tr>
						<td><label for="country" style="margin:0px; padding:0px; font-size:13px;">Country  (required)</label></td>
						</tr>
						<tr>
						<td><input type="text" class="form-control-center" id="country" name="country" size="30%""/><br><br></td>
						</tr>
				</div>        
				<div class="form-group">
						<tr>
						<td><label for="gender" style="margin:0px; padding:0px; font-size:13px;">Gender</label></td>
						</tr>
						<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="male" name="gender" type="radio" value="Male" />Male &nbsp;
						<input id="female" name="gender" type="radio" value="Female" />Female<br><br></td>
						</tr>
				</div>
				<div class="form-group">
						<tr>
						<td><label for="message" style="margin:0px; padding:0px; font-size:13px;">Address (required)</label></td>
						</tr>
						<tr>
						<td><textarea name="address" cols="30" id="address"></textarea><br><br></td>
						</tr>
				</div>                  
			</table>
			<table>
				<tr>
					<td><a href="index.php?page=login#loginuser" class="btn btn-default btn-md">Login</a></td>
					<td><input type="submit" class="btn btn-success btn-md" name="signup_button" value="Signup"></td>
				</tr>
			</table>
		</form>
	</center>
</div>
