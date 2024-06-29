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
<header>

    <video width="200" height="100" autoplay loop muted>
  <source src="images/ms3.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

<nav>
    <ul>
        <?php if ($loggedIn): ?>
            <li style="margin: 20px;"><a href="homepage.php">Home</a></li>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] != 'admin'): ?>
                
                <li style="margin: 20px;"><a href="contact.php">Contact Us</a></li>
                <li style="margin: 20px;"><a href="calendar.php">Booking</a></li>
            <?php else: ?>
                <li style="margin: 20px;"><a href="contact.php">Contact Us</a></li>
                <li style="margin: 20px;"><a href="calendar.php">Booking</a></li>
                <li style="margin: 20px;"><a href="admin_dashboard.php">Admin Panel</a></li>
                
            <?php endif; ?>
        <?php else: ?>
            <li style="margin: 20px;"><a href="index.php">Sign Up/Sign In</a></li>
        <?php endif; ?>
    </ul>
</nav>
    <div class="user-profile">
        <?php if ($loggedIn): ?>
            <div class="dropdown">
                <button class="dropbtn" style="margin: 20px;"><a>👤</a><?php echo htmlspecialchars($email); ?></button>
                <div class="dropdown-content">
                    <a href="profile.php">View Profile</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <a href="index.php">Sign Up/Sign In</a>
        <?php endif; ?>
    </div>
</header>