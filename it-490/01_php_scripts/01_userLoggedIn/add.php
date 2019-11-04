<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to SmartQue</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="http://localhost/it-490/00_homepage/">SmartQue</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>		
<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item active">
			<a class="nav-link" href="userLoggedIn.php">Current Queue<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="add.php">Add Queue</a>
			</li>
		  </ul>
		</div>
	  </nav>		
<!----------- Quelist here       -->
	<form action="../01_php_scripts/RabbitMQClientSample.php">
	<p>Address: <input type="text" name="address" class="search_addr form-control" size="45"></p>
	<p>Latitude: <input type="text" name="lat" class="search_latitude form-control" size="30"></p>
	<p>Longitude: <input type="text" name="longit" class="search_longitude form-control" size="30"></p>
	<div class="form-group">
	<div class="form-group">
			<label for="email">Email address:</label>
			<input type="text" name="email" class="form-control" id="email">
			</div>
			<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="text" name="password" class="form-control" id="pwd">
	</div>
	<input type="submit" name="type" value="uregistration" class="btn btn-default"></input>
	</form>	
<!-----------           -->

</div>

</body>
</html>
