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
    <script src="https://kit.fontawesome.com/1b91071d81.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Edit Profile</title>
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
                    <span class="emoji"><i class="fa-solid fa-user"></i></span>
                    <strong>First Name:</strong>
                    <input type="text" name="firstName" value="<?php echo htmlspecialchars($user['firstName']); ?>" required>
                </div>
                <div class="detail">
                    <span class="emoji"><i class="fa-solid fa-user"></i></span>
                    <strong>Last Name:</strong>
                    <input type="text" name="lastName" value="<?php echo htmlspecialchars($user['lastName']); ?>" required>
                </div>
                <div class="detail">
                    <span class="emoji"><i class="fa-solid fa-lock"></i></span>
                    <strong>New Password:</strong>
                    <input type="password" name="newPassword" required>
                </div>
                <div class="detail">
                    <span class="emoji"><i class="fa-solid fa-lock"></i></span>
                    <strong>Confirm New Password:</strong>
                    <input type="password" name="confirmNewPassword" required>
                </div>
    <b>NOTE: </b>If you dont want to change your password, please enter your current password.
    <div class="button-container">
                    <div class="update-button">
                        <button type="submit">Update</button>
                    </div>
                    <div class="cancel-button">
                        <button type="submit">Update</button>
                        <button type="button" onclick="confirmCancel()">Cancel</button>
                    </div>
                </div>
    </div>
            </form>
        </div>
    </div>
    <div>
    <?php include 'footer.php'; ?>
    </div>
</body>
</html>
