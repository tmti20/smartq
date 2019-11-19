<?php
include("header.php");
include("connectDB.php");
?>

<form action ="function.php">

<!-- MENU PHP CALL-->
<br><br><b>Please Select Location&nbsp &nbsp: </b>
<?php  include("location.php");  ?>

<!--TRANSACTION CHOICE OPTIONS-->
<br><br><b>Please Select Store&nbsp &nbsp: </b>
<?php  include("store.php");  ?>

<br><br><b>Please Select Barber&nbsp &nbsp: </b>
<?php  include("barber.php");  ?>

<!--<select name= "choice" id = "choice">-->
<!--  <option value="nothing"> Please Select</option>-->
<!--  <option value="show"> Show </option>-->
<!--  <option value="deposit"> Deposit </option>-->
<!--  <option value="withdraw"> Withdraw </option>-->
<!--</select>-->
<br><br>

<!--USE SPAN FOR MAKE THE FIELD DISAPPEAR-->
<span id = "amount" class= "dis">
<!-- amount -->
Enter Amount: <input type= text name="amount" id= "amount" placeholder="Enter Amount "  autocomplete=off> <br><br>
</span>

<span id = "number" class= "dis">
<!-- # of transaction -->
Number of Transactions: <input type= text name="number" id= "number" placeholder=" Enter Number"  autocomplete=off> <br><br>
</span>
<!-- Email Checkbox -->
Receipt Email <input type="checkbox" name= "mail" value="Y"> <br><br>

<!-- Submit Button -->
<input type=submit ><br><br>
<!-- Logout Button -->
<a href="logout.php" ><b>LOGOUT</b></a><br><br>


<!--AUTO LOGOUT -->
<!--STOP AUTO_LOGOUT<input type="checkbox" id="stop" checked>-->
<!--<a id="demo"></a>-->
</form>

<!-- JAVA SCRIPT-->
<script language="javascript" type="text/javascript">
"use strict";
var ptrbox = document.getElementById("stop");
var timeOut;

function reset() {
    // IF UNCHECKED
    if (!ptrbox.checked){
    document.getElementById("demo").innerHTML= "<h2 style='color: red; text-align: center '>You Will be Logout after 5 seconds of inactivity... </h2>";
    window.clearTimeout(timeOut);
    timeOut = window.setTimeout( "redir()" , 5000 );
    }
    else
    document.getElementById("demo").innerHTML="";
}

function redir() {
    if (ptrbox.checked) //IF CHECKED,Do nothing
    return;
    else{
    window.location.href = "logout.php";
    }
}

window.onload = reset;
window.onmousemove = reset;
window.onclick = reset;
window.ondblclick = reset;
window.onkeypress = reset;

var part1 = document.getElementById("choice");
part1.addEventListener('change', f );
function f() {

     var v1 = part1.value ; // gets value form menu
     var part2 = document.getElementById("amount"); // access element by amount
     var part3 = document.getElementById("number");

     if (v1 == "nothing"){
         part2.style.display = "none";
         part3.style.display = "none";
     }
     if (v1 == "show" ){
         part2.style.display = "none";
         part3.style.display = "block";
     }
     else if (v1 == "deposit" || v1=="withdraw"){
         part2.style.display = "block";
         part3.style.display = "none";
     }
}

</script>
