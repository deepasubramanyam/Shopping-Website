<?php 

// Username is root 
$user = 'root'; 
$password = ''; 

// Database name is gfg 
$database = 'shopping_site'; 

$servername='127.0.0.1:3325'; 
$mysqli = new mysqli($servername, $user, 
				$password, $database); 


if ($mysqli->connect_error) { 
	die('Connect Error (' . 
	$mysqli->connect_errno . ') '. 
	$mysqli->connect_error); 
}
else{
$sql = "SELECT IMAGE,TYPE,PRICE,INSTOCK,SIZE,OFFERS from kurthi"; 
$result = $mysqli->query($sql); 
$mysqli->close(); 
} 
?>
<!DOCTYPE html> 
<html>

<head> 
	<meta charset="UTF-8"> 
	<title>trendy_world</title>
	<style>
    .product-item{
        border:1px gray;
        margin:20px;
        height:400px;
        width:200px;
        padding:5px;
        float:left;
    }
    .product-tile-footer{
        font-size:15px;
        font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
    }

body{
    background-color: white;
}
.btnAddAction{
    background-color:#4CAF50;
    border:none;
    text-align:center;
    font-size:16px;
    box-shadow:2px 2px 2px black;
}

#heading{
	width:150px;
	margin-left:40px;
	height:70px;
	background-color:black;
	color:white;
	font-size:28px;
	text-align:center center;
	box-shadow:3px 6px 2px grey;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color:#818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  max-height:50%;
  position: relative;
  margin: 0;
}

.active {
  background-color:#717171;
}
/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
table.center {
  margin-left: auto; 
  margin-right: auto;
}
th, td {
  padding: 15px;
}
li{
color:white;
}
</style>
	
</head> 


<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="http://localhost/site.html">Home</a>
  <a href="http://localhost/mobile.php">Mobile category</a>
  <a href="http://localhost/phncase.php">Phonecase category</a>
  <a href="http://localhost/tops.php">Women's Clothing</a>
  <a href="http://localhost/furniture.php">Furniture</a>
  <a href="#">Contact us</a>
</div>
<table border="0" width="100%" height="70" bgcolor="gray">
<td> <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span></td>
<th align="left"><font color="white">Kurthi section</th>
</tr>
</table>
<form action="serachfurn.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
</form>
<div id="product-grid">
	
	<?php // LOOP TILL END OF DATA 
				while($rows=$result->fetch_assoc()) 
				{ 
	?> 
	        <span class="product-item">
            <div class="product-image"><img src="<?php echo $rows["IMAGE"];?>" style="height:200px;width:200px; border:1px groove black; box-shadow:2px 2px 2px gray;"></div>
            <br><div class="product-tile-footer">
			<br><b>Price: </b><?php echo $rows["PRICE"]; ?><br>
			<b>Type: </b><?php echo $rows["TYPE"]; ?><br>
            <b>Size: </b><?php echo $rows["SIZE"]; ?><br>
			<b>Availability : </b><?php echo $rows["INSTOCK"]; ?><br>
			<b>offers: </b><?php echo $rows["OFFERS"]; ?><br>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
            </div>
            </span>
	<?php
	}
	?>
	<script>
	function openNav() {
			document.getElementById("mySidenav").style.width = "180px";
		}

	function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}
	</script>

</body> 
</html> 
