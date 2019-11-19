<?php
session_start();
$_SESSION["authenticated"] = False;

?>
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
<style>
	body {font-family: Arial;}
	
	/* Style the tab */
	.tab {
		overflow: hidden;
		border: 1px solid #ccc;
		background-color: #f1f1f1;
	}
	
	/* Style the buttons inside the tab */
	.tab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
		font-size: 17px;
	}
	
	/* Change background color of buttons on hover */
	.tab button:hover {
		background-color: #ddd;
	}
	
	/* Create an active/current tablink class */
	.tab button.active {
		background-color: #ccc;
	}
	
	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
	}
	</style>
<script>
function login(e){
			var str=e.value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					console.log(this.responseText)
				}
			}
			xmlhttp.open("GET", "suggest.php?q="+str, true);
			xmlhttp.send();
		}
function openCity(evt, cityName) {
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
}
tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
tablinks[i].className = tablinks[i].className.replace(" active", "");
}
document.getElementById(cityName).style.display = "block";
evt.currentTarget.className += " active";
}
function handleclick(e){
// ----------------------------------------------------------------------- user login --------------------------
	if(e.value=='Ulogin'){
	var uemail=document.getElementById("uemail").value;
	var upassword=document.getElementById("upassword").value;
	event.preventDefault()
	//console.log(e.value,uemail,upassword)
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				//console.log(this.responseText)
				if(this.response==1){
				<?php $_SESSION["authenticated"] = True; ?>
				window.location.href = "smartq/login.php?username="+uemail;
				}
				else{
					alert("Login failed! Try again");
				}
				//alert(this.responseText);
            }
        }
		//xmlhttp.open("GET", "../01_php_scripts/RabbitMQClientSample.php?type=Ulogin"+"&email="+uemail+"&password="+upassword, true);
		xmlhttp.open("GET", "../01_php_scripts/RabbitMQClientSample.php?type=Ulogin"+"&uemail="+uemail+"&upassword="+upassword, true);
        xmlhttp.send();
	}
// -----------------------------------------------------------------------user registration ---------------------------
	else if(e.value=='Register as User'){
	var Uaddress=document.getElementById("Uaddress").value;
	var uemail=document.getElementById("uremail").value;
	var upassword=document.getElementById("urpassword").value;
	//console.log(Uaddress)
	event.preventDefault()
	console.log(Uaddress,uemail,upassword)
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				console.log(this.responseText)
				if(this.response==1){
				window.location.href = "index.php";
				alert("success!....")
				}
				else{
					alert("failed! Try again");
				}	
            }
        }
		xmlhttp.open("GET", "../01_php_scripts/RabbitMQClientSample.php?type=uregistration"+"&uemail="+uemail+"&upassword="+upassword+"&uaddress="+Uaddress, true);
        xmlhttp.send();
	}
// -----------------------------------------------------------------------client registration
	else if(e.value=='Register as Marchant'){
	var caddress=document.getElementById("cAddress").value;
	var cemail=document.getElementById("cremail").value;
	var cpassword=document.getElementById("crpassword").value;
	var ccategory=document.getElementById("category").value;
	var cstore=document.getElementById("cstore").value;
	event.preventDefault()
	console.log(cAddress,cemail,cpassword,category,cstore)
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				console.log(this.responseText)
				if(this.response==1){
				window.location.href = "index.php";
				alert("success! Redirecting to homepage....")
				}
				else{
					alert("failed! Try again");
				}
				//alert(this.responseText);
            }
        }
		xmlhttp.open("GET", "../01_php_scripts/RabbitMQClientSample.php?type=cregistration"+"&cemail="+cemail+"&cpassword="+cpassword+"&caddress="+caddress+"&ccategory="+ccategory+"&cstore="+cstore, true);
        xmlhttp.send();
	}
// -----------------------------------------------------------------------client login
	if(e.value=='cLogin'){
	var cemail=document.getElementById("cemail").value;
	var cpassword=document.getElementById("cpassword").value;
	event.preventDefault()
	console.log(e.value,cemail,cpassword)
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				console.log(this.responseText)
				if(this.response==1){
				<?php $_SESSION["authenticated"] = True; ?>
				window.location.href = "smartq/Dash/dashboard.php?username="+cemail;
				}
				else{
					alert("failed! Try again");
				}
            }
        }
		xmlhttp.open("GET", "../01_php_scripts/RabbitMQClientSample.php?type=cLogin"+"&cemail="+cemail+"&cpassword="+cpassword, true);
        xmlhttp.send();
	}
}
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "gethint.php?q="+str, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
	<div class="limiter">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">SmartQue</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item active">
			  <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" onclick="openCity(event, 'login')">User login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" onclick="openCity(event, 'user_reg')">User Registration</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" onclick="openCity(event, 'client_login')">Client login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" onclick="openCity(event, 'client_reg')">Client Registration</a>
			</li>
		  </ul>
		</div>
	  </nav>		
<!----------- user login starts here       -->
<div id="login" class="tabcontent">
	<div class="container-login100 member">
		<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="images/img-01.png" alt="IMG">
					</div>
					<form class="login100-form validate-form">
						<span class="login100-form-title">
							User Login
						</span>
						<div class="wrap-input100">
							<input id="uemail" class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>
	
						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input id="upassword" class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
						<div class="container-login100-form-btn">
							<input type="button" onclick="handleclick(this)" class="login100-form-btn" name="type" value="Ulogin">
						</input>
						</div>
					</form>
				</div>
			</div>	
</div>
</div>
<!----------- user reg starts here       -->

<div id="user_reg" class="tabcontent">
		<div class="container-login100 member">
				<div class="container-login100">
						<div class="wrap-login100">
  <div class="member">
		<form class="login100-form validate-form" action="../01_php_scripts/RabbitMQClientSample.php">
		<p>Address: <input id="Uaddress" type="text" name="address" class="search_addr form-control" size="45"></p>
				<label for="ermail">Email address:</label>
				<input id="uremail" type="text" name="email" class="form-control" id="email">
				<div class="form-group">
				<label  for="urpassword">Password:</label>
				<input id="urpassword" type="text" name="password" class="form-control" id="pwd">
		</div>
		<input type="button" onclick="handleclick(this)" name="type" value="Register as User" class="btn btn-default"></input>
		</form>	
	</div>
</div>
</div>
</div>
</div>
<!----------- client login starts here       -->
<div id="client_login" class="tabcontent">
	<div class="container-login100 member">
		<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="images/img-01.png" alt="IMG">
					</div>
	
					<form class="login100-form validate-form">
						<span class="login100-form-title">
							Client Login
						</span>
	
						<div class="wrap-input100">
							<input id="cemail" class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>
	
						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input id="cpassword" class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
						<div class="container-login100-form-btn">
							<input type="button" onclick="handleclick(this)" class="login100-form-btn" name="type" value="cLogin">
						</input>
						</div>
					</form>
				</div>
			</div>	
</div>
</div>
<!----------- client reg starts here       -->
<div id="client_reg" class="tabcontent">
<div class="container-login100 member">
<div class="container-login100">
<div class="wrap-login100">
<div class="member">
<form class="login100-form validate-form" action="../01_php_scripts/RabbitMQClientSample.php">
<p>Address: <input id="cAddress" type="text" name="address" class="search_addr form-control" size="45"></p>
		<label for="cremail">Email address:</label>
		<input id="cremail" type="text" name="email" class="form-control" id="email">
		<div class="form-group">
		<label for="crpassword">Password:</label>
		<input id="crpassword" type="text" name="password" class="form-control" id="pwd">
		</div>
		<div class="form-group">
			<label for="email">Category</label>
			<input id="category" type="text" name="category" class="form-control" id="email">
			</div>
			<div class="form-group">
			<label for="pwd">Store Name</label>
			<input id="cstore" type="text" name="storename" class="form-control">
		</div>
<input type="button" onclick="handleclick(this)" name="type" value="Register as Marchant" class="btn btn-default"></input>
</form>	
</div>
</div>
</div>
</div>
</div>

<!-----------     member login ends here       -->

</div>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>
