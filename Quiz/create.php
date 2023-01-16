<?php 
 	
 	$servername = "localhost";
 	$username = "root";
 	$password = "";
 	$database = "quiz";

 	$connection = new mysqli($servername, $username, $password, $database);

 	$pay_no = "";
 	$reason= "";
	$amount= "";
  $pay_date= "";

 	$errorMessage = "";
 	$successMessage = "";

 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
 		$pay_no = $_POST["a"];
 		$reason= $_POST["b"];
		$amount = $_POST["c"];
    $pay_date= $_POST["d"];
 		do{
 			if(empty($pay_no) || empty($reason) || empty($amount) || empty($pay_date) ){
 				$errorMessage = "All the fields are required";
 				break;
 			}

 			$sql = "INSERT INTO payment (pay_no, reason , amount, pay_date )" . "VALUES ('$pay_no','$reason','$amount','$pay_date')";
 			$result = $connection->query($sql);

 			if(!$result){
 				$errorMessage = "Invalid query: " . $connection->error;
 				break;
 			}

 			$pay_no = "";
 	    $reason= "";
	    $amount= "";
      $pay_date= "";
 		
 		$successMessage = "Product added correctly!";

 		header("location: index.php");
 		exit;

 		} while (false);
 	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Payment</title>
	
	<link rel="stylesheet" href="style1.css">
	
</head>
<body>
	<div class="container my-5">
		<h2>Create Payments</h2>
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
			<div class="row mb-3">
			<label class="col-sm-3 col-form-label">pay_no</label>
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
			<label class="col-sm-3 col-form-label">pay_date</label>
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
<!-- Bootstrap JS-->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
</body>
</html>