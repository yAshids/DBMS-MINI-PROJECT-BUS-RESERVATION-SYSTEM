<?php
// Assuming you have a database connection established
include "dbconnect.php";

$servername="localhost";
	$username="root";
	$password="Shrihari2003";
	$database="bus";
	$db=mysqli_connect($servername,$username,$password,$database);

	if(!$db){
		die("Error in connection".mysqli_connect_error());
	}
    $conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Function to get tickets with user details
function getTicketsWithUserDetails($conn, $routeID) {
    $sql = "CALL GetTicketsWithUserDetails($routeID)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Check if there are results
        if (mysqli_num_rows($result) > 0) {
            // Display ticket information
            while($row = mysqli_fetch_assoc($result)) {
                // Display ticket details along with user information
                echo "Booking ID: " . $row["BookingID"] . "<br>";
                echo "Seat Number: " . $row["SeatNumber"] . "<br>";
                echo "Journey Date: " . $row["JourneyDate"] . "<br>";
                echo "Booking Date: " . $row["BookingDate"] . "<br>";
                echo "Route Rent: " . $row["RouteRent"] . "<br>";
                echo "Bus Type: " . $row["BusType"] . "<br>";
                echo "Customer ID: " . $row["CustomerID"] . "<br>";
                echo "Customer Name: " . $row["CustomerName"] . "<br>";
                echo "Email: " . $row["Email"] . "<br>";
                echo "Address: " . $row["Address"] . "<br>";
                echo "Contact No: " . $row["ContactNo"] . "<br>";
                echo "Payment Method: " . $row["PaymentMethod"] . "<br>";
                echo "Current Phone No: " . $row["CurrentPhoneNo"] . "<br>";
                echo "<hr>";
            }
        } else {
            echo "No bookings found for this route.";
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Call the function with a specific route ID
$routeID = 39; // Example route ID
getTicketsWithUserDetails($conn, $routeID);

// Close connection
mysqli_close($conn);
?>
