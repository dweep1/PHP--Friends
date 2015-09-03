 <!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 	<meta charset="utf-8">
 	<style>
 	button a
 	{
 		color: white;
 	}
 	</style>
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title><?php echo $user_name . "'s" . " Profile" ;?></title>
 	<link rel="stylesheet" href="">

 </head>
 <body>
 	
 </body>
 </html>
 <button class="btn btn-danger"><a href="/login/profile">Home</a></button>
 <button class="btn btn-primary"> <a href="/">Logout</a></button>
<?php 

	echo "<h1>".  $user_name . "'s" . " Profile" . "</h1>" ;
	
	echo "Email:  " . $email ;
 ?>
