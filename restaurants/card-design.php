<div style='padding-top:70px;padding-bottom:70px;' id='blogs'>
	<div class='container-fluid'  >
	<h3 class='tittle-w3'>Most Trending</h3>
		<h1>&nbsp;</h1>
		<?php
		$count=0;
		$q=mysqli_query($con,'select * from food_details');
	while($row=mysqli_fetch_array($q))
	{
	$count++;
	$rev=rand(10,20);
	echo"
			<div class='row thumbnail'>
                        <div class='col-md-3'>
                            <img src='upload-img/$row[7]' alt='' class='img-thumbnail img-responsive' style='width:320px;height:200px;'>
						</div>
                            <div class='col-md-6'>
                                <h4 class='w3-title'></h4>
                                <h4><a href='#'>$row[3] &nbsp;</a> <i class='fa fa-inr' aria-hidden='true'>&nbsp;</i>$row[6]/-
                                </h4>
                                <p>($row[4],$row[5])</p>
                                <p>$row[8]</p>
                                <p>$row[9]</p>
                                <p>By:-$row[2]</p>
                            
                                <p class='pull-right'>$rev reviews</p>
                                <p>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-star'></span>
                                    <span class='glyphicon glyphicon-star-empty'></span>
                                </p>
                            </div>
                        </div>
					<div class='col-md-3'>
                            
						</div>
                   ";
	}
	?>
		<h1>&nbsp;</h1>
	</div>
</div>

<!--//blogs-->