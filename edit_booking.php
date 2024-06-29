<?php
session_start();


include 'connect.php';

// Initialize variables to store booking details
$userId = $location = $passengers = $startDate = $departureDate = '';
$bookingId = $_GET['id'] ?? '';


// Check if booking ID is provided in the URL
if(empty($bookingId)) {
    echo "Booking ID not provided. <a href='manage_bookings.php'>Back to Manage Bookings</a>";
    exit();
}


// Fetch booking details based on booking_id
$sql = "SELECT * FROM bookings WHERE booking_id = $bookingId"; // Adjust 'booking_id' as per your actual column name
$result = $conn->query($sql);

if($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $userId = $row['user_id'];
    $location = $row['location'];
    $passengers = $row['passengers'];
    $startDate = $row['start_date'];
    $departureDate = $row['departure_date'];
} else {
    echo "Booking not found.";
    exit();
}

// Handle form submission for updating booking details
if(isset($_POST['updateBooking'])) {
    $userId = $_POST['userId'];
    $location = $_POST['location'];
    $passengers = $_POST['passengers'];
    $startDate = $_POST['startDate'];
    $departureDate = $_POST['departureDate'];
    $bookingId = $_POST['booking_id'];
    
    // Update booking details in the database
    $sql = "UPDATE bookings SET user_id='$userId', location='$location', passengers='$passengers', start_date='$startDate', departure_date='$departureDate' WHERE booking_id=$bookingId";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_bookings.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Edit Booking</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <input type="hidden" name="booking_id" value="<?php echo $bookingId; ?>">
        
        <label for="userId">User ID:</label>
        <input type="text" id="userId" name="userId" value="<?php echo $userId; ?>"><br><br>
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo $location; ?>"><br><br>
        
        <label for="passengers">Passengers:</label>
        <input type="text" id="passengers" name="passengers" value="<?php echo $passengers; ?>"><br><br>
        
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" value="<?php echo $startDate; ?>"><br><br>
        
        <label for="departureDate">Departure Date:</label>
        <input type="date" id="departureDate" name="departureDate" value="<?php echo $departureDate; ?>"><br><br>
        
        <input type="submit" name="updateBooking" value="Update Booking">
    </form>
</body>
</html>
