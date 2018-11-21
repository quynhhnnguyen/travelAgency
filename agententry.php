<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 16 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 10 - 11
		Summary: implement Agent Entry Page.
	*/
	
	session_cache_expire(30);
	session_start();

	include "header.php";
	
	//set value to activeTab by session variable
	$_SESSION["activeTab"] = "agentEntryTab";
	
	//print_r($_SESSION);
	
	//navigations
	include "menu.php";
	require_once("sqlfunctions.php");	
	// prepare data
	$agencies = getAgenciesInfo();
	
?>

<div class="col-sm-12 container-fluid text-center">
	<div><center>
		<h1>Agent Entry</h1>
		<?php
			if(isset($_SESSION['message'])) {
				print "<h3 style='color:red; background-color:yellow'>" . $_SESSION['message'] . "</h3>";
			}
		?>
	</center></div>
	<div id="agentEntry" class="contentPaddingDiv col-sm-7 slideanim slide container-fluid">
		
		<p>Enter Agent Information.</p>
		<form method="post" id="agentEntryForm" action="functions.php">
			<div>
				<input type="hidden" id="action" name="action" value="addNewAgent"></input>
				<div id="table1">				
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
						<input type="text" class="form-control" id="AgtFirstName" name="AgtFirstName" required="required" 
									placeholder="First Name">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
						<input type="text" class="form-control" id="AgtMiddleInitial" name="AgtMiddleInitial"  
									placeholder="Middle Name">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
						<input type="text" class="form-control" id="AgtLastName" name="AgtLastName" required="required" 
									placeholder="Last Name">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
						<input type="text" class="form-control" id="AgtBusPhone" name="AgtBusPhone" required="required" 
									placeholder="Phone Number">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
						<input type="text" class="form-control" id="AgtEmail" name="AgtEmail" required="required" 
									placeholder="Email">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
						<select class="form-control" id="AgtPosition" name="AgtPosition" placeholder="Position">
							<option value="Junior Agent">Junior Agent</option>
							<option value="Intermediate Agent">Intermediate Agent</option>
							<option value="Senior Agent">Senior Agent</option>
						</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
						<select class="form-control" id="AgencyId" name="AgencyId" placeholder="Agency">
							<?php
								foreach($agencies as $agency) {
									print "<option value='" . $agency -> AgencyId ."'>" . $agency -> AgncyCity . "</option>";
								}
							?>
						</select>
					</div>
					
					<div class="input-group" style="padding-top:5px">
						<input type="submit" class="btn btn-primary" value="Submit" id="submit" onclick="<?php $_SESSION['message'] = "";?>"/>						
					</div>			
				</div>
			</div>

		</form>
	</div>
</div>


<?php
	include "footer.php";
?>