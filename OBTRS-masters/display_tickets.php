<!DOCTYPE html>
<html>
<head>
    <title>Display Tickets</title>
    <style>
        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th, td {
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: center;
        }
        
        th {
            background-color: #f2f2f2;
            color: #333333;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Hover Effect */
        tr:hover {
            background-color: #eaeaea;
        }

        /* Header Text Color */
        h1 {
            color: #333333;
        }

        /* Body Background and Text Color */
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            color: #333333;
            margin: 0;
            padding: 20px;
        }

        /* Page Container */
        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Section Styling */
        .section {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section">
            <h1>Booked Bus Tickets</h1>
            
        </div>
    </div>
</body>
</html>


<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$database = "bus1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);


$servername="localhost";
	$username="root";
	$password="";
	$database="bus1";
	$db=mysqli_connect($servername,$username,$password,$database);

	if(!$db){
		die("Error in connection".mysqli_connect_error());
    }
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Call the stored procedure
$sql = "CALL GetBookedBusTickets()";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    // Display the result
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Customer ID</th><th>Username</th><th>Email</th><th>Seat Number</th><th>Route ID</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["customer_id"]."</td>";
            echo "<td>".$row["username"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["seat_number"]."</td>";
            echo "<td>".$row["route_id"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}

// Close connection
$conn->close();
?>
