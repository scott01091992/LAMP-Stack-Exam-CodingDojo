<!DOCTYPE HTML>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='/assets/bootstrap.min.css'>
		<title>Travel Dashboard</title>
	</head>
	<body>
		<div class='container'>
			<div class='row'>
			 	<div class='col-xs-10'>
			 	</div>
			 	<div class='col-xs-2'>
			 		<a id='logout' href='/logout'>Logout</a>
			 	</div>
			</div>
			<div class='row'>
				<div class='col-xs-12'>
					<h1>Hello <?= $user['name'] ?></h1>
					<h3>Your Trip Schedules:</h3>
					<table class="table table-hover">
					    <thead>
					      	<tr>
					        	<th>Desination</th>
					        	<th>Travel Start Date</th>
					        	<th>Travel End Date</th>
					        	<th>Plan</th>
					      	</tr>
					    </thead>
					    <tbody>
					      	<?php
					      		foreach ($users_plans as $plan){
					      			echo "<tr>";
					      			echo "<td><a href='destination/{$plan['users_id']}'>".$plan['destination']."</a></td>";
					      			echo "<td>".$plan['start_date']."</td>";
					      			echo "<td>".$plan['end_date']."</td>";
					      			echo "<td>".$plan['description']."</td>";
					      			echo "</tr>";
					      		}
					      	?>
					    </tbody>
					 </table>
					 <h3>Other User's Travel Plans:</h3>
					 	<table class="table table-hover">
					    <thead>
					      	<tr>
					        	<th>Name</th>
					        	<th>Destinations</th>
					        	<th>Travel Start Date</th>
					        	<th>Travel End Date</th>
					        	<th>Do You Want to Join?</th>
					      	</tr>
					    </thead>
					    <tbody>
					      	<?php
					      		foreach($other_plans as $others){
					      			echo "<tr>";
					      			echo "<td>".$others['name']."</td>";
					      			echo "<td><a href='destination/{$others['id']}'>".$others['destination']."</a></td>";
					      			echo "<td>".$others['start_date']."</td>";
					      			echo "<td>".$others['end_date']."</td>";
					      			echo "<td><a href='/join/{$others['id']}'>JOIN</a></td>";
					      			echo "</tr>";
					      		}
					      	?>
					    </tbody>
					 </table>
					 <a id='add_item' href='/travels/add'>Add Travel Plan</a>
				</div>
			</div>
		</div>
	</body>
</html>
