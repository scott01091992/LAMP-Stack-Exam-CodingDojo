<!DOCTYPE HTML>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='/assets/bootstrap.min.css'>
		<title>Destination</title>
	</head>
	<style>
		#home, #logout{
			display: inline-block;
		}
	</style>
	<body>
		<div class='container'>
			<div class='row'>
			 	<div class='col-xs-9'>
			 	</div>
			 	<div class='col-xs-3'>
			 		<a id='home' href='/travels'>Home</a>
			 		<a id='logout' href='/logout'>Logout</a>
			 	</div>
			</div>
			<div class='row'>
				<div class='col-xs-12'>
					
					<h1> <?= $user['destination'] ?> </h1>
					<p>Planned By: <?= $user['name'] ?> </p>
					<p>Description: <?= $user['description'] ?> </p>
					<p>Travel Date From: <?= $user['start_date'] ?> </p>
					<p>Travel Date To: <?= $user['end_date'] ?> </p>
					<h1>Other users' joining the trip:</h1>
					<ul>
						<?php
							foreach($others as $other){
								echo "<li>";
								echo $other['name'];
								echo "</li>";
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
