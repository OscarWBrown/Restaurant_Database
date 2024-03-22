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

<?php

require_once("C:\\xampp\\htdocs\\RestaurantWebsite\\connectdb.php");

$currentDate = $_POST["currentDate"];

$sql = "SELECT c.firstName, c.lastName, GROUP_CONCAT(m.food SEPARATOR ', ') AS 'items ordered', o.totalPrice, o.tip, e.firstName AS 'delivery person'
        FROM customerAccount c
            INNER JOIN orderPlacement op ON c.emailAddress = op.customerEmail
            INNER JOIN foodOrder o ON op.orderID = o.orderID
            INNER JOIN delivery d ON o.orderID = d.orderID
            INNER JOIN employee e ON d.deliveryPerson = e.ID
            INNER JOIN foodItemsinOrder m ON o.orderID = m.orderID
        WHERE o.orderDate = :currentDate
            GROUP BY o.orderID;";

$stmt = $dbh->prepare($sql);
$stmt->execute(array(':currentDate' => $currentDate));
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
    echo "<table>";
    echo "<tr><th>Customer Name</th><th>Items Ordered</th><th>Total Amount</th><th>Tip</th><th>Delivery Person</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>".$row["firstName"]." ".$row["lastName"]."</td>";
        echo "<td>".$row["items ordered"]."</td>";
        echo "<td>$".$row["totalPrice"]."</td>";
        echo "<td>$".$row["tip"]."</td>";
        echo "<td>".$row["delivery person"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} 
else {
    echo "No orders found for the selected date.";
}

$dbh = null;
?>
</body>
<html>
