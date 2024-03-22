<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recent Orders</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css">
        <style>
            .container {
                margin-top: 50px;
                margin-bottom: 50px;
            }
            h1 {
                font-size: 36px;
                margin-bottom: 30px;
            }
            table {
                width: 100%;
                margin-bottom: 1rem;
                background-color: transparent;
                color: #212529;
                font-size: 16px;
                text-align: center;
            }
            th {
                font-weight: 500;
                padding: 0.75rem;
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }
            td {
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            }
            tbody tr:nth-child(even) {
                background-color: rgba(0, 0, 0, 0.05);
            }
            tbody tr:hover {
                background-color: rgba(0, 0, 0, 0.075);
            }
            .fa {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cosentino's</a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/RestaurantWebsite/Restaurant.html">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
	<body>
		<a href="http://localhost/RestaurantWebsite/Restaurant.html">Home</a>
		<h1>
			Employee Schedules
		</h1>
		<br>
		<form action = "showSchedule.php" method = "post">

<?php

			require_once("C:\\xampp\\htdocs\\RestaurantWebsite\\connectdb.php");

		$sql = "SELECT firstName 
				FROM employee";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if ($stmt->rowCount() > 0) {
			echo '<select name="the_name">';
			echo '<option disabled selected value="">Name</option>'; // Added line
			foreach($result as $row) {
				echo '<option value="'.$row['firstName'].'">'.$row['firstName'].'</option>';
			}
			echo '</select>';
		}
		else {
			echo "There are no employees working this week";
		}

		$dbh = null;

?>
			<input type = "submit" value = "Show Schedule">
		</form>


	<body>
<html>