<?php
		require_once("C:\\xampp\\htdocs\\RestaurantWebsite\\connectdb.php");
		
		$sql = "SELECT orderDate AS order_date, COUNT(*) AS total_orders
          FROM foodorder
          WHERE orderDate >= DATE(NOW()) - INTERVAL 30 DAY
          GROUP BY DATE(order_date)";
		  
	$stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total_orders = array();
    foreach ($result as $row) {
        $total_orders[$row['order_date']] = $row['total_orders'];
    }
?>


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
        <div class="container">
				<a href="http://localhost/RestaurantWebsite/Restaurant.html">Home</a>

            <h1>Recent Orders</h1>
            <p>Order activity over the past 30 days</p>
            <div class="table-responsive">
                <table>
                    <thead>
			<tr>
				<th>Days ago</th>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
				<th>6</th>
				<th>7</th>
				<th>8</th>
				<th>9</th>
				<th>10</th>
			</tr>
			<tr>
				<th>Date</th>
				<th>
					<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 1);
						document.write(date.toLocaleDateString());
					</script>
					</div> 
				</th>
				<th> 
					<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 2);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> 
					<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 3);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th>
					<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 4);
						document.write(date.toLocaleDateString());
					</script>
					</div>				
				</th>
				<th> 
					<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 5);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> 
				<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 6);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> 
				<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 7);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> 
				<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 8);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> 
				<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 9);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> 
					<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 10);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
			</tr>
			<tr>
				<th>Total orders</th>
				<?php
				// Display the total number of orders for each date
				for ($i = 1; $i <= 10; $i++) {
				    $date = date('Y-m-d', strtotime('-' . $i . ' days'));
					echo '<td>' . (isset($total_orders[$date]) ? $total_orders[$date] : '') . '</td>';
				}
				?>
			</tr>
			<tr>
				<th>Days ago</th>
				<th>11</th>
				<th>12</th>
				<th>13</th>
				<th>14</th>
				<th>15</th>
				<th>16</th>
				<th>17</th>
				<th>18</th>
				<th>19</th>
				<th>20</th>
			</tr>
			<tr>
				<th>Date</th>
				<th> 
				<div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 11);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 12);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 13);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 14);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 15);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 16);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 17);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 18);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 19);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 20);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
			</tr>
			<tr>
				<th>Total orders</th>
				<?php
				// Display the total number of orders for each date
				for ($i = 11; $i <= 20; $i++) {
				    $date = date('Y-m-d', strtotime('-' . $i . ' days'));
				    echo '<td>' . (isset($total_orders[$date]) ? $total_orders[$date] : '') . '</td>';
				}
				?>
			</tr>
			<tr>
				<th>Days ago</th>
				<th>21</th>
				<th>22</th>
				<th>23</th>
				<th>24</th>
				<th>25</th>
				<th>26</th>
				<th>27</th>
				<th>28</th>
				<th>29</th>
				<th>30</th>
			</tr>
			<tr>
				<th>Date</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 21);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 22);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 23);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 24);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 25);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 26);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 27);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 28);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 29);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
				<th> <div>
					<script>
						date = new Date();
						day = date.setDate(date.getDate() - 30);
						document.write(date.toLocaleDateString());
					</script>
					</div>
				</th>
			</tr>
			<tr>
				<th>Total orders</th>
				<?php
				// Display the total number of orders for each date
				for ($i = 21; $i <= 30; $i++) {
				    $date = date('Y-m-d', strtotime('-' . $i . ' days'));
				    echo '<td>' . (isset($total_orders[$date]) ? $total_orders[$date] : '') . '</td>';
				}
				?>
			</tr>
	</body>
</html>

<?php
	$dbh = null;
?>
