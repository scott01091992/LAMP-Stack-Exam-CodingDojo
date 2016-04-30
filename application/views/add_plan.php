<!DOCTYPE HTML>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='/assets/bootstrap.min.css'>
		<title>Add Plan</title>
		<script src='/assets/jquery-2.2.0.min.js' type='text/javascript'></script>
		<script src='/assets/jquery-ui.min.js' type="text/javascript"></script>
		<script src='/assets/bootstrap.min.js' type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){

				
			});
		</script>
		<style>
			.error{
				color: red;
			}
			#home, #logout{
				display: inline-block;
			}
		</style>
	</head>
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
					<h1> Add a Trip </h1>
					<?= "<span class='error'>" . $this->session->flashdata('error') . "</span>" ?>
					<form action='/add_travel_plan' method='post'>
						<div class='form-group'>
							<label for='destination'>Desination<?= "<span class='error'>".form_error('destination')."</span>"?></label>
							<input class='form-control' type='text' name='destination'>
						</div>
						<div class='form-group'>
							<label for='description'>Description<?= "<span class='error'>".form_error('description')."</span>"?></label>
							<input class='form-control' type='text' name='description'>
						</div>
						<div class='form-group'>
							<label for='start_date'>Start Date: (MM/DD/YYYY)<?= "<span class='error'>".form_error('start_date')."</span>"?></label>
							<input class='form-control' id='start_date' type='text' name='start_date'>
						</div>
						<div class='form-group'>
							<label for='end_date'>End Date (MM/DD/YYYY)<?= "<span class='error'>".form_error('end_date')."</span>"?></label>
							<input class='form-control' id='end_date' type='text' name='end_date'>
						</div>
						<button class='btn btn-default' type='submit'>Add</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
