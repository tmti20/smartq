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
			  <a class="nav-link" href="clientLoggedIn.php">Current Queue<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="add.php">Add Queue</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="remove.php">Remove Queue</a>
			</li>
		  </ul>
		</div>
	  </nav>		
<!----------- Quelist here       -->
<form action="../RabbitMQClientSample.php">
	<div class="form-group">
	<div class="form-group">
			<label for="queueid">Queue ID</label>
			<input type="text" name="queueid" class="form-control" id="queueid">
			</div>
	<input type="submit" name="type" value="Qremove_client" class="btn btn-default"></input>
</form>	
</body>
</html>
