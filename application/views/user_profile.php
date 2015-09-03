<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<title><?php echo $username['name'] . "'s " . "Profile";?></title>
	<style>
	body
	{
		list-style-type: none;
		text-decoration: none;
	}
	
	button{
		text-decoration: none;
		color:black;
		padding-left:10px;
	}
	a {
		color: black;
		text-decoration:none;
	}
	.logout
	{
		margin-left:850px;
		margin-top: -20px;
		text-decoration: none;
	}
	</style>
</head>
<body>
<div class="container">

<h3> Hello	<?php echo $username['alias']; ?> !</h3>
<h3> Here is the list of your friends </h3>
<p class="logout btn btn-danger" ><a href="/login/logout">Logout</a></p>
<form action="" method="post" accept-charset="utf-8">

	<table class="table class table-bordered table-striped">
		<caption>Friends list table</caption>
		<thead>
			<tr>
				<th>Alias</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
				
				
				

				<?php foreach($friends as $friend)

				{
					echo "<tr>";
					echo "<td>";
					echo $friend["alias"];
					echo "</td>"; 
					echo "<td>";

					?>
					<button class="btn btn primary"><a href="/login/remove_friend/<?php echo $friend['id']?>/">Remove</a></button>
					<button class="btn btn-danger"><a href="/login/view_friend/<?php echo $friend['id']?>/">View Profile</a></button>
					<?php 
					echo  "</td>";
					echo "</tr>";

					} ?>
					

					
					
			
		</tbody>
	</table>
</form>
<form action="" method="post" accept-charset="utf-8">
	
	<table class="table class table-bordered table-striped">
		<caption>Nonfriends list table</caption>
		<thead>
			<tr>
				<th>Alias</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
			<?php 


			foreach($nonfriends as $nonfriend)
			{
				echo "<tr>";
				echo "<td>";
				echo $nonfriend["alias"];
				echo "</td>";
				echo "<td>";?>
				<button class="btn btn-danger"><a href="/login/add_friend/<?php echo $nonfriend['id']?>/">Add Friend</a></button>
				<?php
				echo "</td>";
				echo "</tr>";
				?>
				
				
				

				<?php
			
					} ?>
				
				
				
				
				

			
				
					

					
					
					
					
			

				
					
				
					
			
				
			</tr>
		</tbody>
	</table>
</form>



</ul>
	



</div>

</body>
</html>