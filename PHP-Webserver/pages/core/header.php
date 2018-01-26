<header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Py-Home-Automation</h1>
                <hr>
                <p>Finally, The 'Dream' Came True...!
                A Synchronize Service Using Python, PHP And Android Which Can Access Globally.
                Just Register your self (Website Or App) & Download The Software And You are ready to Go...</p>
                <?php

				if(isset($_SESSION['sid']))
				{
				?>
				<center>
					<table>
						<tr>
							<td><a href="index.php?page=logout" class="btn btn-danger btn-md">Logout</a></td>
						</tr>
					</table>
				</center>
				<?php
					}
					else
					{
				?>
				<a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a><br><br>
				<center>
					<table>
						<tr>
							<td><a href="index.php?page=login#loginuser" class="btn btn-success btn-md">Login</a></td>
							<td><a href="index.php?page=signup#newuser" class="btn btn-default btn-md">Signup</a></td>
						</tr>
					</table>
				</center>
				<?php	
					}
				?>
                
            </div>
        </div>
    </header>
