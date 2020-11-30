
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
$sql = "SELECT IMAGE,NAME,PRICE,SELLER,RAM,ROM FROM mobile_category"; 
$result = $mysqli->query($sql); 
$mysqli->close(); 
} 
?><?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM  mobile_category WHERE CONCAT(IMAGE,NAME,PRICE,SELLER,RAM,ROM ) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost:3325", "root", "", "shopping_site");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html> 
<html lang="en"> 

<head> 
	<meta charset="UTF-8"> 
	<title>Mobile_products</title>
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
  font-size: 15px;
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
  font-size: 20px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 15px;}
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
<th align="left"><font color="white">Mobile category</th>
</tr>
</table>
<form action="a.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
			<?php while($row = mysqli_fetch_array($search_result)):?>
			<h2><?php echo "search results for" ;?></h2>
			<h3><?php echo $row['NAME'];?></h3><br>
                <tr>
				
				   
                   
                    
                    <th><?php echo $row['NAME'];?></th></br>
                    <th><br><b>Price: </b><?php echo $row['PRICE'];?></th></br>
                    <th><b>RAM: </b><?php echo $row['RAM'];?></th></br>
					<th><b>ROM: </b><?php echo $row['ROM'];?></th></br>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
</form>
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