<?php  

if (isset($_GET["pay_no"])) {
	$pay_no = $_GET["pay_no"];

	$servername = "localhost";
 	$username = "root";
 	$password = "";
 	$database = "quiz";

 	$connection = new mysqli($servername, $username, $password, $database);

 	$sql = "DELETE FROM payment WHERE pay_no=$pay_no";
 	$connection->query($sql);

 	 header("location: index.php");
		  exit;
}

?>