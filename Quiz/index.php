<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	
	<link rel="stylesheet" href="style1.css">
	
</head>
</head>
<body>
	<div class="container my-5">
		<h2>Payment </h2>
		<a class="btn btn-primary" href="create.php" role="button">New Payment</a>
		<hr>
		<table class="table">
			<thead>
				<tr >
					<th>Payment_No</th>
					<th>Reason</th>
					<th>Amount</th>
                    <th>Date of Payment</th>
					<th>Change</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$servername = "localhost";
					$username = "root";
					$password = "";
					$database = "quiz";

					$connection = new mysqli($servername, $username, $password, $database);

					if($connection->connect_error){
						die("Connection failed: " . $connection->connect_error);

					}

					$sql = "SELECT * FROM payment";
					$result =  $connection->query($sql);

					if(!$result){
						die("Invalid query: " . $connection->error);
					}

					while($row = $result->fetch_assoc()){
						echo "

						<tr>
					<td>$row[pay_no]</td>
					<td>$row[reason]</td>
					<td>$row[amount]</td>
                    <td>$row[pay_date]</td>
					<td>
						<a class='btn btn-primary btn-sm' href='update.php?pay_no=$row[pay_no]'>Edit</a>
						<a class='btn btn-danger btn-sm' href='delete.php?pay_no=$row[pay_no]'>Delete</a>
					</td>
				</tr>

						";
					}
				?>
				
			</tbody>		
		</table>
    </div>
<!-- Bootstrap JS-->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
</body>
</html>