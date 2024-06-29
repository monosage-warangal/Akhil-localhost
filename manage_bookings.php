<?php include 'header.php'; ?>
<?php


include 'connect.php';

// Query bookings table and display/manage bookings
$sql = "SELECT * FROM bookings";
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
     /* Add your CSS styles here */
     .body{
            padding:20px;
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
        h2{
            font-size:40px;
            font-family: 'Courier New', Courier, monospace;
            align-content: center;
        }
        table a{
            text-decoration: underline;
            color: blue;
            font-family: 'Courier New', Courier, monospace;
        }
        a:hover{
            color: #FF4C4C;
        }
    </style>
</head>
<body>
<div class="body">
    <h2>Manage Bookings</h2>
   
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>User ID</th>
                <th>Location</th>
                <th>Passengers</th>
                <th>Start Date</th>
                <th>Departure Date</th>
                <th>User Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row['booking_id'] . "</td>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['passengers'] . "</td>";
                    echo "<td>" . $row['start_date'] . "</td>";
                    echo "<td>" . $row['departure_date'] . "</td>";
                    echo "<td>" . $row['user_email'] . "</td>";
                    echo "<td><a href='edit_booking.php?id=" . $row['booking_id'] . "'>Edit</a> | <a href='delete_booking.php?id=" . $row['booking_id'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No bookings found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="admin_dashboard.php"><-Back to Dashboard</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
