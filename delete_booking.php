<?php
session_start();


include 'connect.php';

if(isset($_GET['id'])) {
    $bookingId = $_GET['id'];
    
    // Delete booking from database based on booking_id
    $sql = "DELETE FROM bookings WHERE booking_id = $bookingId"; // Adjust 'booking_id' as per your actual column name

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_bookings.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Booking ID not provided.";
    exit();
}

$conn->close();
?>
