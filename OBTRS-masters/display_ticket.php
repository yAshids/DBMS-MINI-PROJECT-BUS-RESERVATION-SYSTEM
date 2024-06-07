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
            <table>
                <tr>
                    <th>Customer ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Seat Number</th>
                    <th>Route ID</th>
                </tr>
                <!-- PHP code to display table rows will go here -->
            </table>
        </div>
    </div>
</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "Shrihari2003";
$database = "busreservation3"; // Define your actual database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

$servername="localhost";
	$username="root";
	$password="Shrihari2003";
	$database="busreservation3";
	$db=mysqli_connect($servername,$username,$password,$database);

	if(!$db){
		die("Error in connection".mysqli_connect_error());
    }
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Call the modified stored procedure
$customer_id = 1; // Replace 1 with the desired customer_id
$sql = "CALL ViewTickets($customer_id)";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Display ticket information
    echo "<table>";
    echo "<tr><th>ID</th><th>Route ID</th><th>Seat Number</th><th>Journey Date</th><th>Customer Name</th><th>Email</th><th>Bus Type</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["route_id"] . "</td>";
        echo "<td>" . $row["seat_number"] . "</td>";
        echo "<td>" . $row["journey_date"] . "</td>";
        echo "<td>" . $row["customer_name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["bus_type"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No tickets found for customer_id: $customer_id";
}

mysqli_close($conn);
?>

</body>
</html>
