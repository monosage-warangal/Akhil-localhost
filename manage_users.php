
<?php include 'header.php'; ?>
<?php


include 'connect.php';

// Query users table and display/manage users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="style.css">
    <style>
         .body {
            padding: 20px;
            background-color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #FF4C4C;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        h2 {
            font-size: 40px;

            text-align: center;
        }
     
        a:hover {
            color: #FF4C4C;
        }
        .add-user {
            margin-bottom: 20px;
            display: block;
            text-align: center;
        }
        table a.edit-link {
            text-decoration: none;
            color: green;
        }
        table a.delete-link {
            text-decoration: none;
            color: red;
        }
    </style>
</head>
<body>
<div class="body">
<a href="admin_dashboard.php"><-Back to Dashboard</a>
    <h2>Manage Users</h2><br>
    <a href="add_user.php" class="add-user">Add New User</a><br>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    // Ensure the field name matches your database structure
                    echo "<td>" . $row['user_id'] . "</td>"; // Adjust 'id' as per your database structure
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td><a href='edit_user.php?id=" . $row['user_id'] . "' class='edit-link'>Edit</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href='delete_user.php?id=" . $row['user_id'] . "' class='delete-link'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found.</td></tr>";
            }
            ?>
        </tbody>
    </table><br>

</div>
</body>
</html>

<?php
$conn->close();
?>
