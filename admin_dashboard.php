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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
           width:auto;
        }

        h1 {
            text-align: center;
            color: black;
        }

        .container1 {
            width:100%;
    display: flex;
    justify-content: space-around;
    gap: 20px;
    margin-top: 40px;
    background-color: transparent;
    padding: 20px;
    box-shadow: none;
    border: none;
}

.card {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: calc(33.33% - 20px); /* Adjust width as per your layout */
    text-align: center;
    transition: transform 0.3s ease, background-color 0.3s ease;
}

@media (max-width: 768px) {
    .container1 {
        flex-wrap: wrap;
    }

    .card {
        width: calc(50% - 20px); /* Adjust width for smaller screens */
    }
}
        .card:hover {
            transform: scale(1.05);
            background-color: #f7f7f7;
        }

        .card a {
            text-decoration: none;
            color: #555;
            display: block;
            padding: 20px;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .card a:hover {
            color: #FF4C4C;
        }

        .card-header {
            background-color: #007bff; /* Primary color */
            color: #fff;
            padding: 20px;
            font-size: 22px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-header.warning {
            background-color: #ffc107; /* Warning color */
        }

        .card-header.success {
            background-color: #28a745; /* Success color */
        }

        .card-footer {
            padding: 10px;
            background-color: #f1f1f1;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        @media (max-width: 768px) {
            .container1 {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <h1>Welcome, Admin!</h1>
<br>
    <div class="container1">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-footer"><a href="manage_users.php">View Details</a></div>
        </div>

        <div class="card">
            <div class="card-header warning">Manage Cars</div>
            <div class="card-footer"><a href="manage_cars.php">View Details</a></div>
        </div>

        <div class="card">
            <div class="card-header success">Manage Bookings</div>
            <div class="card-footer"><a href="manage_bookings.php">View Details</a></div>
        </div>
    </div>
</body>

</html>
