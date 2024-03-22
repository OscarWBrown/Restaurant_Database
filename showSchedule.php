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
	
			<?php
				require_once("C:\\xampp\\htdocs\\RestaurantWebsite\\connectdb.php");

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					// Get the selected employee name
					$selected_name = $_POST["the_name"];

					// Retrieve the employee's schedule from Monday to Friday
					$sql = "SELECT days, startTime, endTime FROM shift WHERE empID IN (SELECT ID FROM employee WHERE firstName = :name) AND DAYOFWEEK(days) BETWEEN 2 AND 6";
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(':name', $selected_name);
					$stmt->execute();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

					if ($stmt->rowCount() > 0) {
						echo "Schedule for $selected_name";

						echo '<br><br><table border="1">';
						echo '<tr><th>Days</th><th>Start Time</th><th>End Time</th></tr>';
						foreach($result as $row) {
							$day = $row['days'];
							$start_time = $row['startTime'];
							$end_time = $row['endTime'];
							echo "<tr><td>$day</td><td>$start_time</td><td>$end_time</td></tr>";
						}
						echo '</table>';
					} else {
						echo "No schedule found for $selected_name";
					}
				}

				$dbh = null;
			?>
			<br><br>
			
	<body>
</html>