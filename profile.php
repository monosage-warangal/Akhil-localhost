<style>
          /* Reset default margin and padding */
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
    min-height: 100vh; /* Ensure the page takes at least the height of the viewport */
}

.wrapper {
    margin-top: -50px;
    flex: 1; /* This ensures the wrapper takes up the remaining vertical space */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 80px;
}

.profile {
    background-image: url('images/background1.png');
    background-size: cover;
    background-position: center;
    height:auto;
    background-color: #fff;
    width: 600px;
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
}

.emoji {
    font-size: 20px;
    margin-right: 10px;
}

strong {
    font-weight: bold;
    width: 100px;
    display: inline-block;
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
hr{
    margin-bottom:18px;
    margin-top:20px;
}
</style>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

// Fetch booking details
$sql_booking = "SELECT booking_id, location, passengers, start_date, departure_date FROM bookings WHERE user_email = ?";
$stmt_booking = $conn->prepare($sql_booking);
if ($stmt_booking === false) {
    die("Error preparing statement: " . htmlspecialchars($conn->error));
}

$stmt_booking->bind_param("s", $email);
$stmt_booking->execute();
$result_booking = $stmt_booking->get_result();
$bookings = $result_booking->fetch_all(MYSQLI_ASSOC);

$stmt_user->close();
$stmt_booking->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Profile</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="wrapper">
        <div class="profile">
            <h2>Profile Details</h2>
            <div class="detail">
                <span class="emoji">👤</span>
                <strong>First Name:</strong><?php echo htmlspecialchars($user['firstName']); ?>
            </div>
            <div class="detail">
                <span class="emoji">👤</span>
                <strong>Last Name:</strong><?php echo htmlspecialchars($user['lastName']); ?>
            </div>
            <div class="detail">
                <span class="emoji">📧</span>
                <strong>Email:</strong><?php echo htmlspecialchars($user['email']); ?>
            </div>
            <a href="edit_profile.php" id="editProfileBtn">Edit Profile</a>
            <hr>
            <h2>Booking Details</h2>
            <?php if (!empty($bookings)): ?>
                <?php foreach ($bookings as $booking): ?>
                    <div class="detail">
                        <span class="emoji">🆔</span>
                        <strong>Booking Id:</strong><?php echo htmlspecialchars($booking['booking_id']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji">📍</span>
                        <strong>Location:</strong><?php echo htmlspecialchars($booking['location']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji">🗓️</span>
                        <strong>Start Date:</strong><?php echo htmlspecialchars($booking['start_date']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji">🗓️</span>
                        <strong>Departure Date:</strong><?php echo htmlspecialchars($booking['departure_date']); ?>
                    </div>
                    <div class="detail">
                        <span class="emoji">👥</span>
                        <strong>No.of Passengers:</strong><?php echo htmlspecialchars($booking['passengers']); ?>
                    </div>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No bookings found.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
