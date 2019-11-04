<!DOCTYPE html>
<html>
<head>
	<title>Search User</title>
	<link rel="stylesheet" href="http://bootswatch.com/cerulean/bootstrap.min.css">
	<script>
		function showSuggestion(e){
			var str=e.value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var temp=JSON.parse(this.responseText);
					for(var i=0;i<temp.length;i++){
						console.log(temp[i][4])
					}
					
					//console.log((temp[0]))
					//console.log(typeof(this.responseText))
				}
			}
			xmlhttp.open("GET", "RabbitMQClientSample.php?q="+str, true);
			xmlhttp.send();
		}
	</script>
</head>
<body>
	<div class="container">
	    <h1>Search Users</h1>
		<select onchange="showSuggestion(this)" id="select_id">
			<option value="Volvo">Volvo</option>
			<option value="Saab">Saab</option>
			<option value="Opel">Opel</option>
			<option value="audi">Audi</option>
		</select>
</div>
</body>
</html>