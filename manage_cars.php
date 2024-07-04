<?php include 'header.php'; ?>
<?php

include 'connect.php';

// Query cars table and display/manage cars
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cars</title>
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
        .add-car {
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
    <h2>Manage Cars</h2><br>
    <a href="add_car.php" class="add-car">Add New Car</a><br>
    <table>
        <thead>
            <tr>
                <th>Car ID</th>
                <th>Name</th>
                <th>Price per Day</th>
                <th>Seating Capacity</th>
                <th>AC Status</th>
                <th>Image URL</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row['car_id'] . "</td>";
                    echo "<td>" . $row['car_name'] . "</td>";
                    echo "<td>" . $row['price_per_day'] . "</td>";
                    echo "<td>" . $row['seating_capacity'] . "</td>";
                    echo "<td>" . $row['ac_status'] . "</td>";
                    echo "<td><img src='" . $row['image_url'] . "' alt='Car Image' width='100'></td>";
                    echo "<td><a href='edit_cars.php?id=" . $row['car_id'] . "' class='edit-link'>Edit</a>&nbsp; |&nbsp; <a href='delete_cars.php?id=" . $row['car_id'] . "' class='delete-link'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No cars found.</td></tr>";
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
