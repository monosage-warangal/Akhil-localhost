<?php
session_start();


include 'connect.php';
if(isset($_GET['id'])) {
    $carId = $_GET['id'];
    
    // Fetch car details based on car_id
    $sql = "SELECT * FROM cars WHERE car_id = $carId"; // Adjust 'car_id' as per your actual column name
    $result = $conn->query($sql);

    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $carName = $row['car_name'];
        $carType = $row['car_type'];
        $pricePerDay = $row['price_per_day'];
        $seatingCapacity = $row['seating_capacity'];
        $acStatus = $row['ac_status'];
        $imageUrl = $row['image_url'];
    } else {
        echo "Car not found.";
        exit();
    }
} else {
    echo "Car ID not provided.";
    exit();
}


if(isset($_POST['updateCar'])) {
    $carName = $_POST['carName'];
    $carType = $_POST['carType'];
    $pricePerDay = $_POST['pricePerDay'];
    $seatingCapacity = $_POST['seatingCapacity'];
    $acStatus = $_POST['acStatus'];
    $imageUrl = $_POST['imageUrl'];
    $carId = $_POST['car_id'];
    
    // Update car details
    $sql = "UPDATE cars SET car_name='$carName', car_type='$carType', price_per_day='$pricePerDay', seating_capacity='$seatingCapacity', ac_status='$acStatus', image_url='$imageUrl' WHERE car_id=$carId";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_cars.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h2>Edit Car</h2>
    <form method="POST">
        <input type="hidden" name="car_id" value="<?php echo $carId; ?>">
        <label for="carName">Car Name:</label>
        <input type="text" id="carName" name="carName" value="<?php echo $carName; ?>"><br><br>
        <label for="carType">Car Type:</label>
        <input type="text" id="carType" name="carType" value="<?php echo $carType; ?>"><br><br>
        <label for="pricePerDay">Price Per Day:</label>
        <input type="text" id="pricePerDay" name="pricePerDay" value="<?php echo $pricePerDay; ?>"><br><br>
        <label for="seatingCapacity">Seating Capacity:</label>
        <input type="text" id="seatingCapacity" name="seatingCapacity" value="<?php echo $seatingCapacity; ?>"><br><br>
        <label for="acStatus">AC Status:</label>
        <input type="text" id="acStatus" name="acStatus" value="<?php echo $acStatus; ?>"><br><br>
        <label for="imageUrl">Image URL:</label>
        <input type="text" id="imageUrl" name="imageUrl" value="<?php echo $imageUrl; ?>"><br><br>
        <input type="submit" name="updateCar" value="Update Car">
    </form>
    <a href="manage_cars.php">Cancel</a>
</body>
</html>
