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

$stmt_user->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Profile</title>
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

        /* Button styles */
        .profile-button-container {
            display: inline-block;
            justify-content: space-between;
            margin-top: 20px;
        }

        .update-button {
            flex: 1;
            margin-right: 10px; /* Adjust margin for spacing */
        }

        .update-button button {
            color: blue;
            text-decoration: underline;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%; /* Ensure button takes full width */
            margin-left: 215px;
        }

        .update-button button:hover {
            color: #FF4C4C;
        }

        /* Cancel button */
        .cancel-button {
            flex: 1;
            margin-left: 20px; /* Adjust margin for spacing */
        }

        .cancel-button button {
            color: blue;
            text-decoration: underline;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%; /* Ensure button takes full width */
            margin-left: 200px;
        }

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
            margin-bottom:18px;
            margin-top:20px;
        }
    </style>
    <script>
        function confirmCancel() {
            var confirmation = confirm("Do you want to cancel the process or keep editing?");
            if (confirmation) {
                window.location.href = "profile.php";
            }
        }
    </script>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="wrapper">
        <div class="profile edit-profile">
            <h2>Edit Profile</h2>
            <form action="update_profile.php" method="post">
                <div class="detail">
                    <span class="emoji">👤</span>
                    <strong>First Name:</strong>
                    <input type="text" name="firstName" value="<?php echo htmlspecialchars($user['firstName']); ?>" required>
                </div>
                <div class="detail">
                    <span class="emoji">👤</span>
                    <strong>Last Name:</strong>
                    <input type="text" name="lastName" value="<?php echo htmlspecialchars($user['lastName']); ?>" required>
                </div>
                <div class="detail">
                    <span class="emoji">🔒</span>
                    <strong>New Password:</strong>
                    <input type="password" name="newPassword" required>
                </div>
                <div class="detail">
                    <span class="emoji">🔒</span>
                    <strong>Confirm New Password:</strong>
                    <input type="password" name="confirmNewPassword" required>
                </div>
    <b>NOTE: </b>If you dont want to change your password, please enter your current password.
    <div class="button-container">
                    <div class="update-button">
                        <button type="submit">Update</button>
                    </div>
                    <div class="cancel-button">
                        <button type="button" onclick="confirmCancel()">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>
