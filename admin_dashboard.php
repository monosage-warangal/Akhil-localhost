<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'connect.php';

$loggedIn = false;
$email = '';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $loggedIn = true;
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
<?php include 'header.php'; ?>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Include any CSS stylesheets or meta tags here -->
     <style>
        /* Reset default margin and padding */
body, ul {
    margin: 0;
    padding: 0;
}

/* Basic styling for the body */
body {
    font-family: Arial, sans-serif;
    background-color:whitesmoke; /* Light gray background */
}

/* Main heading style */
h1 {
    text-align: center;
    color: #333; /* Dark gray text color */
}

/* Styling for the list of links */
ul {
    list-style-type: none;
    padding: 0;
}

/* Styling for each link item */
.link {
    margin-bottom: 10px;
    padding: 20px;
    background-image: url("images/body.png");
}

/* Link styling */
.link a {
    display: block;
    padding: 10px 20px;
    text-decoration: none;
    color: #555; /* Medium gray text color */
    background-color: #fff; /* White background */
    border: 1px solid #ccc; /* Light gray border */
    border-radius: 5px;
    transition: background-color 0.3s ease;
    background-image: url("images/1234567.png");
}

/* Hover effect for links */
.link a:hover {
    background-color: #FF4C4C; /* Light gray background on hover */
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
    li a {
        padding: 8px 16px;
    }
}

        </style>
</head>
<body>
    <h1>Welcome, Admin!</h1><br><br><br>
    
    <!-- Example links to manage users, cars, bookings -->
    <ul>
        <div class="link">
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_cars.php">Manage Cars</a></li>
        <li><a href="manage_bookings.php">Manage Bookings</a></li>
</div>
    </ul>

    <!-- Add more content as needed -->
</body>
</html>
