<?php include 'header.php'; ?>
<?php

include 'connect.php';

// Query bookings table and display/manage bookings
$sql = "SELECT * FROM booked_car";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="style.css">
    <style>
      .body {
            padding: 20px;
            background-color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #FF4C4C;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        h2 {
            font-size: 40px;

            text-align: center;
        }
     
        a:hover {
            color: #FF4C4C;
        }
        .add-booking {
            margin-bottom: 20px;
            display: block;
            text-align: center;
        }
        table a.edit-link {
            text-decoration: none;
            color: green;
        }
        table a.delete-link {
            text-decoration: none;
            color: red;
        }
    </style>
</head>
<body>
<div class="body">
<a href="admin_dashboard.php"><-Back to Dashboard</a>
    <h2>Manage Bookings</h2><br>
    <a href="add_booking.php" class="add-booking">Add New Booking</a><br>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Booked Date</th>
                <th>Car Name</th>
                <th>Price</th>
                <th>Location</th>
                <th>Seating Capacity</th>
                <th>Starting Date</th>
                <th>Departure Date</th>
                <th>User Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['booking_id'] . "</td>";
                    echo "<td>" . $row['booking_date'] . "</td>";
                    echo "<td>" . $row['car_name'] . "</td>";
                    echo "<td>" . $row['price_per_day'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['seating_capacity'] . "</td>";
                    echo "<td>" . $row['start_date'] . "</td>";
                    echo "<td>" . $row['end_date'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td><img src='" . $row['image_url'] . "' alt='Car Image' width='100'></td>";
                    echo "<td><a href='edit_booking.php?id=" . $row['booking_id'] . "' class='edit-link'>Edit</a> | <a href='delete_booking.php?id=" . $row['booking_id'] . "' class='delete-link'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No bookings found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>

    </div>
</body>
</html>

<?php
$conn->close();
?>
