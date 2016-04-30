<!DOCTYPE HTML>
<html>
	<head>
		<link rel='stylesheet' type='text/css' href='/assets/bootstrap.min.css'>
		<title>Login/Registration</title>
	</head>
	<style>
		#title{
			display: block;
		}
		.error{
			color: red;
		}
		.success{
			color: green;
		}
	</style>
	<body>
		<div class='container'>
			<div class='row'>
			<h1 id='title'>Welcome!</h1>
				<div class='col-xs-6'>
					<?= $this->session->flashdata('error') ?>
					<form action='register' method='post' role='form'>
						<div class='form-group'>
							<label for='name'>Name:<?= "<span class='error'>".form_error('name')."</span>" ?></label>
							<input type='text' name="name" class='form-control'>
						</div>
						<div class='form-group'>
							<label for='username'>Username:<?= "<span class='error'>".form_error('username')."</span>" ?></label>
							<input type='text' name='username' class='form-control'>
						</div>
						<div class='form-group'>
							<label for='password'>Password:<?= "<span class='error'>".form_error('password')."</span>" ?></label>
							<input type='password' name='password' class='form-control'>
						</div>
						<label>*Password should be at least 8 characters</label>
						<div class='form-group'>
							<label for='confirm'>Confirm Password:<?= "<span class='error'>".form_error('confirm')."</span>" ?></label>
							<input type='password' name='confirm' class='form-control'>
						</div>
						<button class='btn btn-default' type='submit'>Register</button>
					</form>
				</div>
				<div class='col-xs-6'>
					<?= $this->session->flashdata('login_error') ?>
					<form action='login' method='post'>
						<div class='form-group'>
							<label for='username'>Username:<?= "<span class='error'>".form_error('login_username')."</span>" ?></label>
							<input type='text' name='login_username' class='form-control'>
						</div>
						<div class='form-group'>
							<label for='password'>Password:<?= "<span class='error'>".form_error('login_password')."</span>" ?></label>
							<input type='password' name='login_password' class='form-control'>
						</div>
						<button class='btn btn-default' type='submit'>Login</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
