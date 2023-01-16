<?php
    $servername = "localhost";
 	$username = "root";
 	$password = "";
 	$database = "quiz";

 	$connection = new mysqli($servername, $username, $password, $database);


$pay_no = "";
$reason = "";
$amount = "";
$pay_date = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){

	if(!isset($_GET["pay_no"])){
		header("location: index.php");
		exit;
	}
	$pay_no = $_GET["pay_no"];

	$sql = "SELECT * FROM payment WHERE pay_no =$pay_no";
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();

	if(!$row){
		header("location: index.php");
		exit;
	}

	$pay_no = $row["pay_no"];
	$reason = $row["reason"];
	$amount = $row["amount"];
    $pay_date = $row["pay_date"];
}else{
	$pay_no = $_POST["a"];
    $reason = $_POST["b"];
	$amount = $_POST["c"];
    $pay_date = $_POST["d"];
	do{
		if(empty($pay_no) || empty($reason) || empty($amount) || empty($pay_date) ){
			$errorMessage = "All the fields are required";
			break;
		}

		$sql = "UPDATE payment " .
		       "SET  reason = '$reason', amount='$amount' , pay_date='$pay_date'" .
		       "WHERE pay_no = '$pay_no'";

		  $result = $connection->query($sql);

		  if(!$result){
		  	$errorMessage = "Invalid quer: " . $connection->error;
		  	break;
		  }

		  $successMessage = "Client updated correctly";

		  header("location: index.php");
		  exit;


	} while (true);
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>UPDATE</title>
	<link rel="stylesheet" href="style1.css">
	
</head>
<body>
	<div class="container my-5">
		<h2>Edit Payments</h2>
		   <?php  
           if(!empty($errorMessage)){
           	echo"

           	<div class='alert alert-warning alert-dismissible fade show' role='alert'>
           		<strong>$errorMessage</strong>
           		<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
           	</div>

           	";
           }
		   ?>
		<form method="post">
			<input type="hidden" name="pay_no" value="<?php echo $pay_no; ?>">
			<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Pay_no</label>
			<div class="col-sm-6"> 
				<input type="text" 
				class="form-control" 
				name="a" 
				value="<?php echo $pay_no; ?>">
			</div>

			<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Reason</label>
			<div class="col-sm-6"> 
				<input type="text" 
				class="form-control" 
				name="b" 
				value="<?php echo $reason; ?>">
			</div>
			<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Amount</label>
			<div class="col-sm-6"> 
				<input type="double" 
				class="form-control" 
				name="c" 
				value="<?php echo $amount; ?>">
			</div>
		   </div>
           <div class="row mb-3">
			<label class="col-sm-3 col-form-label">Pay_date</label>
			<div class="col-sm-6"> 
				<input type="date" 
				class="form-control" 
				name="d" 
				value="<?php echo $pay_date; ?>">
			</div>
		   </div>

		  <?php 
		  	if (!empty($successMessage)){
		  		echo "
		  		<div class='row mb-3'>
		  			<div class='offset-sm-3 col-sm-6'>
		  				<div class='alert alert-success alert-dismissible fade show' role='alert'>
		  					<strong>$successMessage</strong>
		  					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		  				</div>
		  			</div>
		  		</div>

		  		";
		  	}

		  ?>

		  <div class="row mb-3">
		  	<div class="offset-sm-3 col-sm-3 d-grid">
		  		<button type="submit" class="btn btn-primary">Submit</button>
		  	</div><br>
		  	<div class="col-sm-3 d-grid">
		  		<a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
		  	</div>
		  </div>
		</form>
		
    </div>

</body>
</html>