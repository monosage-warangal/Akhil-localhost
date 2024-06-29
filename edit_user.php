<?php
session_start();


include 'connect.php';

if(isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    // Fetch user details based on ID
    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = $conn->query($sql);

    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $email = $row['email'];
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "User ID not provided.";
    exit();
}

if(isset($_POST['updateUser'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $userId = $_POST['user_id'];
    
    // Update user details
    $sql = "UPDATE users SET firstName='$firstName', lastName='$lastName', email='$email' WHERE id=$userId";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_users.php");
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
    <title>Edit User</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
        <label for="fName">First Name:</label>
        <input type="text" id="fName" name="fName" value="<?php echo $firstName; ?>"><br><br>
        <label for="lName">Last Name:</label>
        <input type="text" id="lName" name="lName" value="<?php echo $lastName; ?>"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br><br>
        <input type="submit" name="updateUser" value="Update User">
    </form>
    <a href="manage_users.php">Cancel</a>
</body>
</html>
