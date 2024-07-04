<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1b91071d81.js" crossorigin="anonymous"></script>
    <title>Car Booking System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .custom-footer {
            width: 100%;
            background-color: black;
            color: white;
            padding: 10px 0;
        }

        .custom-footer .container {
            margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
            background-color: transparent;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            padding: 0 20px;
            gap: 20px;
        }

        .custom-footer .column {
            flex-grow: 1;
            padding: 10px;
        }

        .custom-footer .column h2, .custom-footer .column h3 {
            margin-top: 0;
        }

        .custom-footer .column p, .custom-footer .column ul {
            margin: 10px 0;
        }

        .custom-footer .column ul {
            list-style: none;
            padding: 0;
        }

        .custom-footer .column ul li {
            margin: 5px 0;
        }

        .custom-footer .column ul li a {
            color: whitesmoke;
            text-decoration: underline;
        }

        .custom-footer .column ul li a:hover {
            color: #FF4C4C;
            text-decoration: underline;
        }

        .custom-footer .footer-bottom {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #fff;
            flex-basis: 100%;
            background-color: black;
        }
        i{
            color:#FF4C4C;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <footer class="custom-footer">
        <div class="container">
            <div class="column">
                <h2>
                    <video width="200" height="100" autoplay loop muted>
                        <source src="images/ms3.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </h2>
            </div>
            <div class="column">
                <h3>INFORMATION</h3>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="book_cars.php">Bookings</a></li>
                    <li><a href="profile.php">View Profile</a></li>
                </ul>
            </div>
            <div class="column">
                <h3>SOCIAL MEDIA LINKS</h3><br>
                <ul>
                    <li>&nbsp&nbsp<i class="fa-brands fa-whatsapp"></i>&nbsp&nbsp&nbsp&nbsp<i class="fa-brands fa-instagram"></i></a>&nbsp&nbsp&nbsp&nbsp<i class="fa-brands fa-facebook-f"></i>
                &nbsp&nbsp&nbsp<i class="fa-brands fa-x-twitter"></i>&nbsp&nbsp&nbsp&nbsp<i class="fa-brands fa-youtube"></i></li>
                    <!-- <li><a href="#">Media</a></li>
                    <li><a href="#">Socials</a></li> -->
                </ul>
            </div>
        </div>
    </footer>
    <footer class="custom-footer">
        <div class="footer-bottom">
            <p>Copyright © 2024 Miles & Smiles. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
