<?php
echo "<div style='padding-top:70px;padding-bottom:70px;' >
	<div class='container-fluid'  >";
	echo"<div class='row'>
		<div class='col-md-1'>&nbsp;
		</div>
			<div class='col-md-2'><h1>&nbsp;</h1>";
			
						
						// sort by category
						echo "<div class='panel panel-default'>
						  <div class='panel-heading'>By Category</div>
							  <div class='panel-body'>";
							  echo "<input type='checkbox' name='types' value=' ' hidden checked='true'>";
							  $q1=mysqli_query($con,"select * from food_type");
							  while($row=mysqli_fetch_array($q1))
							  {
								echo "<input type='checkbox' name='types' class='filter' value='$row[1]' onclick='myFunction()'> &nbsp; $row[1] <br>";
							  } 
							  echo "</div>
						</div>";
						
						// sort by cuisine
						echo "<div class='panel panel-default'>
						  <div class='panel-heading'>By Cuisine</div>
							  <div class='panel-body'>";
							  echo "<input type='checkbox' name='cuisine' value=' ' hidden checked='true'>";
							  $q1=mysqli_query($con,"select * from cuisine");
							  while($row=mysqli_fetch_array($q1))
							  {
								echo "<input type='checkbox' name='cuisine' class='filter' value='$row[1]' onclick='myFunction()'> &nbsp; $row[1] <br>";
							  } 
							  echo "</div>
						</div>";
						
			echo"
			</div>";?>
			<h1>&nbsp;</h1>
			<center><div id='loader'  style='display:none;'></div>	</center>
						
							
			<?php
			echo "<div class='col-md-6 animate-bottom' id='shorted'>
			
			";?>