<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1b91071d81.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: black;
            color: white;
        }
        .card {
            background-color: black;
            border-style: none !important;
            padding: 20px;
        }
        .img-top {
            margin-right: 20px; /* Adjusted margin */
            padding: 10px;
            width: 100%;
            height: auto;
            max-width: 300px;
            transition: transform .5s;
        }
        .img-top:hover {
            transform: scale(1.1);
        }
        .card-body {
            padding: 20px;
        }
        .booking-form {
            background-color: transparent;
            padding: 20px;
            border-radius: 8px;
        }
        .booking-form label {
            font-weight: bold;
            color: #FF4C4C;
        }
        .booking-form input[type="text"],
        .booking-form input[type="date"],
        .booking-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .booking-form button {
            background-color: #FF4C4C;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .booking-form button:hover {
            background-color: black;
        }
        .container1 {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px;
            margin-bottom: 30px; /* Added margin */
            padding: 20px;
        }
        .col-section {
            flex: 1;
            padding: 0 10px;
        }
        i {
            color: #FF3333;
            font-size: 20px;
        }
    </style>
</head>
<body>

<div class="container1">
    <?php
    include 'connect.php';

    if (isset($_GET['car_id'])) {
        $car_id = $_GET['car_id'];
        $query = "SELECT * FROM cars WHERE car_id = '$car_id'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $car_name = $row['car_name'];
            $price_per_day = $row['price_per_day'];
            $seating_capacity = $row['seating_capacity'];
            $ac_status = $row['ac_status'];
            $image_url = $row['image_url'];
            $car_company = $row['car_company'];
            $car_type = $row['car_type'];
            $car_model_year = $row['car_model_year'];
            $fuel_type = $row['fuel_type'];
            $description = $row['description'];

            echo '<div class="col-section">';
            echo '<h3> <i class="fa-solid fa-check-double"></i>&nbspImage of Selected Car</h3>';
            echo '<img src="' . $image_url . '" class="img-top" alt="' . $car_name . '">';
            echo '</div>'; // close col-section

            echo '<div class="col-section">';
            echo '<h3> <i class="fa-solid fa-check-double"></i>&nbspDetails of Selected Car</h3>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title"> <i class="fa-solid fa-car"></i> &nbsp' . $car_name . '</h5>';
            echo '<p class="card-text"><i class="fa-solid fa-fan"></i> &nbsp&nbsp' . $ac_status . '</p>';
            echo '<p class="card-text"><i class="fa-solid fa-money-bill-1"></i>&nbsp&nbsp₹' . $price_per_day . '</p>';
            echo '<p class="card-text"><i class="fa-solid fa-users"></i>&nbsp&nbsp ' . $seating_capacity . '</p>';
            echo '<p class="card-text"><i class="fa-solid fa-industry"></i>&nbsp&nbsp ' . $car_company . '</p>';
            echo '<p class="card-text"><i class="fa-solid fa-car-side"></i>&nbsp&nbsp ' . $car_type . '</p>';
            echo '<p class="card-text"><i class="fa-solid fa-gear"></i>&nbsp&nbsp ' . $car_model_year . '</p>';
            echo '<p class="card-text"><i class="fa-solid fa-gas-pump"></i>&nbsp&nbsp ' . $fuel_type . '</p>';
            echo '<p class="card-text"><i class="fa-solid fa-info-circle"></i>&nbsp&nbsp ' . $description . '</p>';
            echo '</div>'; // close card-body
            echo '</div>'; // close col-section
        } else {
            echo '<p>No car details found.</p>';
        }

        mysqli_free_result($result);
        mysqli_close($conn);
    } else {
        echo '<p>No car selected.</p>';
    }
    ?>
    <div class="col-section">
        <h3><i class="fa-solid fa-check"></i> Select Details</h3>
        <div class="booking-form">
            <form action="whatsapp_redirect.php" method="POST">
                <input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
                <div class="form-group">
                    <label for="location">Choose Location:</label>
                    <select id="location" name="location" required>
                    <option value="" selected disabled>Popular cities</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Amaravati">Amaravati</option>
                    <option value="Vizag">Vizag</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Bengaluru">Bengaluru</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Kashmir">Kashmir</option>
                    <option value="Kanyakumari">Kanyakumari</option>
                    <option value="Jaipur">Jaipur</option>
                    <option value="Ayodhya">Ayodhya</option>
                    <option value="" selected disabled>Some famous Tourist places</option>
                    <option value="Kodaicanal">Kodaicanal</option>
                    <option value="Araku">Araku</option>
                    <option value="Ooty">Ooty</option>
                    <option value="Ladak">Ladak</option>
                    <option value="" selected disabled>Location</option>
                    <option value="warangal">warangal</option>
                    <option value="Karimnagar">Karimnagar</option>
                    <option value="Guntur">Guntur</option>
                    <option value="Tirupati">Tirupati</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" min="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" min="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
        </div> <!-- close booking-form -->
    </div> <!-- close col-section -->
</div> <!-- close container1 -->

<?php include 'footer.php'; ?>
</body>
</html>
