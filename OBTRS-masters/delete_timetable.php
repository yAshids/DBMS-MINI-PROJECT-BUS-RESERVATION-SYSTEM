<?php
    // Include database connection and server file
    include 'dbconnect.php';
    include 'server.php';

    // Check if 'id' is set in the URL parameters
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // Sanitize the input to prevent SQL injection
        $route_id = mysqli_real_escape_string($db, $_GET['id']);

        // Query to delete the timetable entry
        $query = "DELETE FROM `time_table` WHERE `route_id` = '$route_id'";

        // Execute the query
        if (mysqli_query($db, $query)) {
            // Deletion successful, redirect back to the timetable page
            header("Location: timetable.php");
            exit();
        } else {
            // Error message if deletion fails
            echo "Error deleting record: " . mysqli_error($db);
        }
    } else {
        // Invalid request if 'id' is not set or empty
        echo "Invalid request.";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Timetable Entry</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Delete Timetable Entry</h1>
    <form method="post" action="update_timetable.php">
        <input type="hidden" name="route_id" value="<?php echo $route_id; ?>">
        <div>
            <label for="departure_station">Departure Station:</label>
            <input type="text" id="departure_station" name="departure_station" value="<?php echo $data['departure_station']; ?>" readonly>
        </div>
        <div>
            <label for="arrival_station">Arrival Station:</label>
            <input type="text" id="arrival_station" name="arrival_station" value="<?php echo $data['arrival_station']; ?>" readonly>
        </div>
        <div>
            <label for="via_station">Via Station:</label>
            <input type="text" id="via_station" name="via_station" value="<?php echo $data['via_station']; ?>" readonly>
        </div>
        <div>
            <label for="departure_time">Departure Time:</label>
            <input type="text" id="departure_time" name="departure_time" value="<?php echo $data['departure_time']; ?>" readonly>
        </div>
        <div>
            <label for="arrival_time">Arrival Time:</label>
            <input type="text" id="arrival_time" name="arrival_time" value="<?php echo $data['arrival_time']; ?>" readonly>
        </div>
        <div>
            <label for="fare">Fare:</label>
            <input type="text" id="fare" name="fare" value="<?php echo $data['fare']; ?>" readonly>
        </div>
        <input type="submit" name="delete" value="Delete">
    </form>
</body>
</html>

