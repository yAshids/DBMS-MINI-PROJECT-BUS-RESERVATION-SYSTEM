<?php
// Assuming you have a database connection established

// Get the route ID from the AJAX request
$routeID = $_POST['route_id'];

// Call the stored procedure
$sql = "CALL GetBookingsByRoute($routeID)";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error retrieving ticket information: " . mysqli_error($conn));
}

// Fetch the results and format the ticket
$ticket = "";
while ($row = mysqli_fetch_assoc($result)) {
    $ticket .= "Bus Ticket\n";
    $ticket .= "Booking ID: " . $row['BookingID'] . "\n";
    $ticket .= "Seat Number: " . $row['SeatNumber'] . "\n";
    $ticket .= "Journey Date: " . $row['JourneyDate'] . "\n";
    $ticket .= "Booking Date: " . $row['BookingDate'] . "\n";
    $ticket .= "Passenger ID: " . $row['PassengerID'] . "\n";
    $ticket .= "Route ID: " . $row['RouteID'] . "\n";
    $ticket .= "Bus Type: " . $row['BusType'] . "\n";
    $ticket .= "Customer Name: " . $row['CustomerName'] . "\n";
    $ticket .= "Email: " . $row['Email'] . "\n";
    $ticket .= "Address: " . $row['Address'] . "\n";
    $ticket .= "Contact No: " . $row['ContactNo'] . "\n";
    $ticket .= "Payment Method: " . $row['PaymentMethod'] . "\n";
    $ticket .= "Current Phone No: " . $row['CurrentPhoneNo'] . "\n\n";
}

// Close the database connection
mysqli_close($conn);

// Return the formatted ticket
echo $ticket;
?>
