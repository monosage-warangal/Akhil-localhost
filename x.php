<?php
session_start(); // Start or resume a session

include 'connect.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// Fetch user details
$sql_user = "SELECT firstName, lastName, email FROM users WHERE email = ?";
$stmt_user = $conn->prepare($sql_user);
if ($stmt_user === false) {
    die("Error preparing statement: " . htmlspecialchars($conn->error));
}

$stmt_user->bind_param("s", $email);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
$user = $result_user->fetch_assoc();

if (!$user) {
    die("User not found");
}

// Fetch booked cars details for the user including booking_date, location, start_date, end_date
$sql_booked_cars = "SELECT booking_id, car_name, price_per_day, seating_capacity, ac_status, image_url, booking_date, location, start_date, end_date, car_company, car_type, car_model_year, fuel_type, description FROM booked_car WHERE email = ?";
$stmt_booked_cars = $conn->prepare($sql_booked_cars);
if ($stmt_booked_cars === false) {
    die("Error preparing statement: " . htmlspecialchars($conn->error));
}

$stmt_booked_cars->bind_param("s", $email);
$stmt_booked_cars->execute();
$result_booked_cars = $stmt_booked_cars->get_result();
$booked_cars = $result_booked_cars->fetch_all(MYSQLI_ASSOC);

$stmt_user->close();
$stmt_booked_cars->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1b91071d81.js" crossorigin="anonymous"></script>
    <title>User Profile</title>
    <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('images/body.png');
            background-size: cover;
            height:auto;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .wrapper {
            width: 100%;
            margin-top: -50px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 80px;
        }

        .profile {
            /* background-image: url('images/background1.png'); */
            background-size: cover;
            background-position: center;
            height:auto;
            background-color: #fff;
            width: 100%;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .profile h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .detail {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .emoji {
            font-size: 20px;
            margin-right: 10px;
        }

        strong {
            font-weight: bold;
            width: 150px; /* Adjust width to create space */
            display: inline-block;
        }

        input[type="text"],
        input[type="password"] {
            padding: 8px;
            width: 100%; /* Full width input */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Button styles */
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .update-button button,
        .cancel-button button {
            color: blue;
            text-decoration: underline;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%; /* Ensure button takes full width */
        }

        .update-button button:hover,
        .cancel-button button:hover {
            color: #FF4C4C;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: -webkit-sticky;
            bottom: 0;
            width: 100%;
        }
        hr {
            margin-bottom: 18px;
            margin-top: 20px;
        }
        i{
            color:#B2ACAC;
        }
        .car-image{
            height: 200px;
            width: 200px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="wrapper">
        <div class="profile">
            <h2>Profile Details</h2>
            <div class="detail">
                <span class="emoji"><i class="fa-solid fa-user"></i></span>
                <strong>First Name:</strong> <?php echo htmlspecialchars($user['firstName']); ?>
            </div>
            <div class="detail">
                <span class="emoji"><i class="fa-solid fa-user"></i></span>
                <strong>Last Name:</strong> <?php echo htmlspecialchars($user['lastName']); ?>
            </div>
            <div class="detail">
                <span class="emoji"><i class="fa-solid fa-at"></i></span>
                <strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?>
            </div>
            <a href="edit_profile.php" id="editProfileBtn">Edit Profile</a>
            <hr>
            
            <!-- Display booked cars details -->
            <h2>Booked Cars Details</h2>
            <?php if (!empty($booked_cars)): ?>
                <?php foreach ($booked_cars as $car): ?>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-image"></i></span>
                        <strong>Car Image:</strong>
                        <img src="<?php echo htmlspecialchars($car['image_url']); ?>" alt="<?php echo htmlspecialchars($car['car_name']); ?>" class="car-image">
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-hashtag"></i></span>
                        <strong>Booking ID:</strong> <?php echo htmlspecialchars($car['booking_id']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-calendar-days"></i></span>
                        <strong>Booked Date:</strong> <?php echo htmlspecialchars($car['booking_date']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-car"></i></span>
                        <strong>Car Name:</strong> <?php echo htmlspecialchars($car['car_name']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-money-bill-1-wave"></i></span>
                        <strong>Price per Day:</strong> ₹<?php echo htmlspecialchars($car['price_per_day']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-users"></i></span>
                        <strong>Seating Capacity:</strong> <?php echo htmlspecialchars($car['seating_capacity']); ?> persons
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-fan"></i></span>
                        <strong>AC Status:</strong> <?php echo htmlspecialchars($car['ac_status']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-location-dot"></i></span>
                        <strong>Location:</strong> <?php echo htmlspecialchars($car['location']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-calendar-days"></i></span>
                        <strong>Start Date:</strong> <?php echo htmlspecialchars($car['start_date']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-calendar-days"></i></span>
                        <strong>End Date:</strong> <?php echo htmlspecialchars($car['end_date']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-building"></i></span>
                        <strong>Car Company:</strong> <?php echo htmlspecialchars($car['car_company']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-car"></i></span>
                        <strong>Car Type:</strong> <?php echo htmlspecialchars($car['car_type']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-calendar"></i></span>
                        <strong>Car Model Year:</strong> <?php echo htmlspecialchars($car['car_model_year']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-gas-pump"></i></span>
                        <strong>Fuel Type:</strong> <?php echo htmlspecialchars($car['fuel_type']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji"><i class="fa-solid fa-file-lines"></i></span>
                        <strong>Description:</strong> <?php echo htmlspecialchars($car['description']); ?>
                    </div>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No cars booked yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
