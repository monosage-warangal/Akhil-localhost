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
 background-color: black;
            height: auto;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .profile {
background-color: black;
            background-position: center;
            height: auto;
            width: 100%;
            padding: 20px;
        }

        .profile h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: white;
        }

        .detail {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            color:white;
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

        .link-container {
            width:20%;
            left:20%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .link-container a {
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 48%; /* Ensure buttons are side by side with space between */
            text-align: center;
        }

        .edit-profile {
            background-color: #FF4C4C;
    
        }

        .view-bookings {
            background-color:black;
        }

        .edit-profile:hover {
            background-color: black;
        }

        .view-bookings:hover {
            background-color: #FF4C4C;
        }

        hr {
            margin-bottom: 18px;
            margin-top: 20px;
        }

        i {
            color: #B2ACAC;
        }

        .car-image {
            height: 200px;
            width: 200px;
        }
        h2{
            color:white;
            text-align:center;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="profile">
        <div class="link-container">
            <a href="edit_profile.php" class="edit-profile">Edit Profile</a>
            <a href="booking_details.php" class="view-bookings">View Bookings</a>
        </div>
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
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
