<?php
	/*
		Author: Quynh Nguyen (Queenie)
		Date created: Nov - 19 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 12
		Summary: implement Log in Page 
			for authentication use.
	*/
	session_cache_expire(30);
	session_start();

	include "header.php";
	
	//set value to activeTab by session variable
	//session_cache_expire(30);
	$_SESSION["activeTab"] = "homeTab";
	
	//print_r($_SESSION);
	
	//navigations
	include "menu.php";
	
?>
<div class="col-sm-12 container-fluid  text-center">
	<center>
		<h1>Log-in</h1>
		<?php
			if(isset($_SESSION['message'])) {
				print "<h3 style='color:red; background-color:yellow'>" . $_SESSION['message'] . "</h3>";
			}
		?>
	</center>
	<div id="loginSection" class="contentPaddingDiv col-sm-7 slideanim slide loginSection container-fluid">
		
		<p>Enter User-Name and Password to log into "Dream Land Travel Agency" System.</p>
		<form method="post" id="loginForm" action="functions.php">
			<div>
				<p id="tipError" style="display:none">UserName/ Password is incorrect. Please try again!</p>
					<input type="hidden" id="action" name="action" value="authentication"></input>
					<div id="table1">				
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control" id="userName" name="userName" required="required" 
									placeholder="User Name">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="password" class="form-control" id="password" name="password" required="required"
									placeholder="Password">
						</div>
						<div class="input-group" style="padding-top:5px">
							<input type="submit" class="btn btn-primary" value="Log In" id="submit" onclick="<?php $_SESSION['message'] = "";?>"/>							
						</div>			
					</div>
			</div>

		</form>
	</div>
</div>

<br/>
<br/>

<!-- footer -->		
<?php
	include "footer.php";
?>