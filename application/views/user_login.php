<!DOCTYPE html>
<html lang = "en">
<head>

	<title>Welcome</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
	// <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style type="text/css">
	body
	{
		margin-left: 20px;
	}
	.move_date
	{
		margin-left: -50px;
	}
	.login
	{
		margin-top: -370px;
		margin-left: 310px;

	}
	.name
	{
		margin-left: -5px;
		padding-top: 10px;
	}
	.alias
	{
		margin-left: 3px;
	}
	.register{
		margin-left: -45px;
	}
	.password
	{
		margin-left: -30px;
	}
	.confirm
	{
		margin-left: -45px;
	}
	.register_form
	{
		border:1px solid black;
		margin-left: -50px;
		width:300px;
		text-align: center;
	}
	.btn btn-primary btn-sm
	{
		margin-left: 130px;
	}
	.login-email
	{
		padding-top: 10px;
		
	}
	.login-password
	{
		padding-top: 10px;
		margin-left: -30px;
	}
	.btn btn-primary
	{
		margin-left: 500px;
	}
	.login-button
	{
	margin-top: 80px;
		
	}
	.login_form
	{
		margin-top: -5px;
		border: 1px solid black;
		width:300px;
		margin-left: 300px;
		height: 250px;
		text-align: center;
	}
	.welcome
	{
		margin-left: -50px;
	}
	.moveloginup
	{
		margin-top: -100px;
	}
	


	</style>
</head>
<body>
	<div class="container">
		<h1 class="welcome">Welcome!</h1>
		<h3 class="register">Register</h3>
			<div class="register_form">

		<form class="form-horizontal" method="post" action="/login/process_registration" name="register"  >

				<div class="form-group">
				<div class="name">
				<label>Name: </label>
				<input type="text" name="name" />
				</div>
			</div>
			<div class="form-group">
				<div class="alias">
				<label> Alias: </label>
				<input type="text" name="alias" />
				</div>
			</div>
			<div class="form-group">
				<label> Email: </label>
				<input type="text" name="email" />
			</div>
			<div class="form-group">
				<div class="password">
				<label> Password: </label>
				<input type="password" name="password" />
				<h6> *Password should be at least 8 characters </h6>
				</div>
			</div>
			<div class="form-group">
				<div class="confirm">
				<label> Confirm PW: </label>
				<input type="password" name="confirm_password" />
				</div>
			</div>
			<div class="form-group">
				<div class="move_date">
				<label>Date of Birth: </label>
				<input type="text" name="dob" id="datepicker"/>
				</div>
			</div>
			<?php 
			if($this->session->flashdata("registration_errors"))
			{
				echo $this->session->flashdata("registration_errors");
			
			}
		?>
		<?php 
			if($this->session->flashdata("Success"))
			{
				echo $this->session->flashdata("Success");
			
			}
		?>
			<div class="form-group">
				
				<input type="submit" class="btn btn-primary"  name="register-form" value="Register">
			</div>
			
			
		</form>
		</div>
		<div class="moveloginup">
			<h3 class="login">Login </h3>

			<div class="login_form">
		<form class="form-horizontal" method="post" action="/login/login_process" >
			<div class="form-group">
				<div class="login-email">
				<label>Email: </label>
				<input type="text" name="email" />
				</div>
			<div class="form-group">
				<div class="login-password">
				<label>Password: </label>
				<input type="password" name="password" />
				</div>
				<?php if($this->session->flashdata("login_errors"))
			{
				echo $this->session->flashdata("login_errors");
				} 
				?>
			<div class="form-group">
				<div class="login-button">
				<button class="btn btn-primary" type="submit" name="login">Login</button>

			<!-- 	<input type="submit" name="login" value="Login" class="btn btn-success btn-sm" /> -->
				</div>
			</div>
		</form>
		</div>
	</div>
	</div>

</body>
</html>