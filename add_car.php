<?php include 'header.php'; ?>
<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .body {
            padding: 40px;
            max-width: 800px;
            margin: auto;
            font-family: 'Courier New', Courier, monospace;
        }
        form {
            max-width: 600px;
            margin: auto;
            background: #f9f9f9;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: inline-block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 40px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #FF4C4C;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #e43c3c;
        }
        h2 {
            text-align: center;
            font-size: 40px;
            margin-bottom: 20px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: blue;
            text-decoration: none;
        }
        .back-link:hover {
            color:  #FF4C4C;
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            text-align: center;
            border-radius: 8px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script>
        function showModal(message) {
            var modal = document.getElementById("myModal");
            var modalMessage = document.getElementById("modalMessage");
            modalMessage.textContent = message;
            modal.style.display = "block";
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</head>
<body>
<a href="manage_cars.php" class="back-link"><-Back to Manage Cars</a>
<div class="body">
    <h2>Add New Car</h2>
    <form action="add_car.php" method="post">
        <div>
            <label for="car_name">Car Name:</label>
            <input type="text" id="car_name" name="car_name" required>
        </div>
        <div>
            <label for="car_type">Car Type:</label>
            <input type="text" id="car_type" name="car_type" required>
        </div>
        <div>
            <label for="price_per_day">Price per Day:</label>
            <input type="number" id="price_per_day" name="price_per_day" required>
        </div>
        <div>
            <label for="seating_capacity">Seating Capacity:</label>
            <input type="number" id="seating_capacity" name="seating_capacity" required>
        </div>
        <div>
            <label for="ac_status">AC Status:</label>
            <select id="ac_status" name="ac_status" required>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div>
            <label for="image_url">Image URL:</label>
            <input type="url" id="image_url" name="image_url" required>
       
        <input type="submit" value="Add Car">
    </form>

</div>

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p id="modalMessage"></p>
    </div>
</div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_name = $_POST['car_name'];
    $car_type = $_POST['car_type'];
    $price_per_day = $_POST['price_per_day'];
    $seating_capacity = $_POST['seating_capacity'];
    $ac_status = $_POST['ac_status'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO cars (car_name, car_type, price_per_day, seating_capacity, ac_status, image_url) VALUES ('$car_name', '$car_type', '$price_per_day', '$seating_capacity', '$ac_status', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>showModal('New car added successfully');</script>";
    } else {
        echo "<script>showModal('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}

$conn->close();
?>
