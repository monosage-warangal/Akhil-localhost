<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Cars</title>
    <!-- Bootstrap CSS link (assuming you use Bootstrap for grid system) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Open+Sans&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Custom CSS styles -->
    <style> 
     .filter-section {
    margin-bottom: 10px; /* Adjust the margin as needed */
    margin-left: auto; /* Move the section towards the right */
    max-width: 76%; /* Limit the width to avoid taking up the entire page */
}


.filter-section label {
  margin-right: 10px;
}
/* style the fixed message */
.message-icon {
    position: fixed;
    top: 110px;
    left: 10px;
    background-color: #ffffff00;
    color: #000000;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    animation: shake 2s ease-in-out infinite;
}

@keyframes shake {
    0%, 100% {
        transform: translateX(0);
    }
    10%, 30%, 50%, 70%, 90% {
        transform: translateX(-5px);
    }
    20%, 40%, 60%, 80% {
        transform: translateX(5px);
    }
}
.toggle-icon {
    font-size: 25px;
    cursor: pointer;
    margin-left: 0px;
}

/* .fixed-message {
    position: fixed;
    top: 170px;
    left: 10px;
    background-color: #ffffff00;
    color: #000000;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: none; /* Initially hidden */
*/

/* Style the container */
         h1{
      font-family: 'arial';
      position: relative;
      top:2rem;
    }


    .card{
      margin-top: 0rem;
      padding:30px;
    }

    .card-img-top{
      padding: 25px;
      transition: transform .5s;

    }

    .button{
      float: right;
    }

    .card{
      background-color: #f5f5f5f5;
      border-style: none !important;
    }

    hr{
      border-color: #dbdbdb;
    }

    .card-text{
      font-weight: bold;
    }

    .card-img-top:hover{
      transform: scale(1.1);
    }

    @media (min-width: 1024px) and (max-width: 2000px){
      .car-section{
        margin: 5rem !important;
      }
    }
.text-center {
    font-size: 30px; /* Adjust this value as needed */
  }

  body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

/* Reset default margin and padding */


.section{
  margin-top: -55px;
  display: flex;
  align-items: center;
  height: 500px; /* Adjust as needed */
  background-color: #c6c6c6; 
}

.imgcontainer {
  flex: 2;
  padding: 20px;/* Set background color for image area */
}

.imgcontainer img {
  width: 100%;
  height: auto;
  display: block;
}

.textcontainer {
  flex: 1;
  padding: 100px 20px; /* Set background color for text area */
}
  </style>
    <script>
// script for filter
      document.addEventListener('DOMContentLoaded', () => {
    const priceFilter = document.getElementById('price-filter');
    const seatingFilter = document.getElementById('seating-filter');
    const acFilter = document.getElementById('ac-filter');
    const carCards = document.querySelectorAll('.card-wrapper');
  
    priceFilter.addEventListener('change', filterCards);
    seatingFilter.addEventListener('change', filterCards);
    acFilter.addEventListener('change', filterCards);
  
    function filterCards() {
      const price = priceFilter.value;
      const seating = seatingFilter.value;
      const ac = acFilter.value;
  
      carCards.forEach(card => {
        const cardPrice = card.getAttribute('data-price');
        const cardSeating = card.getAttribute('data-seating');
        const cardAC = card.getAttribute('data-ac');
  
        let show = true;
  
        if (price !== 'all' && cardPrice !== price) {
          show = false;
        }
  
        if (seating !== 'all' && cardSeating !== seating) {
          show = false;
        }
  
        if (ac !== 'all' && cardAC !== ac) {
          show = false;
        }
  
        card.style.display = show ? 'block' : 'none';
      });
    }
  });
  // script for move top
let atTop = true;

function toggleScroll() {
    const rotation = document.querySelector('.back-to-top').style.transform;
    const newRotation = rotation === 'rotate(360deg)' ? 'rotate(0deg)' : 'rotate(360deg)';
    
    document.querySelector('.back-to-top').style.transform = newRotation;

    if(atTop) {
        window.scrollTo({top: document.body.scrollHeight, behavior: 'smooth'});
    } else {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
    
    atTop = !atTop;
}
</script>
</head>
<body>
    <br>
    <br>
    <br>
<div class="filter-section">
    <label for="price-filter"><b>Price (₹/day):</b></label>
    <select id="price-filter">
      <option value="all">All</option>
      <option value="1600">₹1600</option>
      <option value="2000">₹2000</option>
      <option value="2500">₹2500</option>
      <option value="3000">₹3000</option>
      <option value="3500">₹3500</option>
      <option value="4000">₹4000</option>
      <option value="6000">₹6000</option>
      <option value="10000">₹10000</option>
      <option value="12000">₹12000</option>
    </select>
    
    <label for="seating-filter"><b>Seating Capacity:</b></label>
    <select id="seating-filter">
      <option value="all">All</option>
      <option value="4">4 persons</option>
      <option value="6">6 persons</option>
      <option value="11">11 persons</option>
      <option value="24">24 persons</option>
    </select>
    
    <label for="ac-filter"><b>AC/Non-AC:</b></label>
    <select id="ac-filter">
      <option value="all">All</option>
      <option value="ac">AC</option>
      <option value="non-ac">Non-AC</option>
    </select>
  </div>

<h1 class="text-center"><b>Choose the best here.</b></h1>
<br>
<?php
// Include the database connection file
include 'connect.php';

// Query to fetch data from the 'cars' table
$query = "SELECT car_name, price_per_day, seating_capacity, image_url, ac_status FROM cars";
$result = mysqli_query($conn, $query); // Use $conn from connect.php

// Check if query was successful
if ($result) {
    // Start output buffering
    ob_start();
    
    // Counter for cards per row
    $count = 0;

    // Loop through each row in the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Extract data from the row
        $car_name = $row['car_name'];
        $price_per_day = $row['price_per_day'];
        $seating_capacity = $row['seating_capacity'];
        $image_url = $row['image_url'];
        $ac_status = $row['ac_status'];

        // Output the card HTML
        if ($count % 3 == 0) {
            // Start a new row after every 3 cards
            echo '<div class="row">';
        }
        
        // Card HTML structure
        echo '<div class="col-md-4">';
        echo '<div class="card">';
        // Replace 'image_url' with your actual field name for the image path
        echo '<img src="' . $image_url . '" class="card-img-top" alt="' . $car_name . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $car_name . '</h5>';
        echo '<p class="card-text">AC status: ' . $ac_status. '</p>';
        echo '<p class="card-text">Price: ' . $price_per_day . '</p>';
        echo '<p class="card-text">Capacity: ' . $seating_capacity . '</p>';
        echo '<a href="https://wa.me/+918328632167" target="_blank" data-car-name="' . urlencode($car_name) . '" class="btn btn-primary">Book Now</a>';
        echo '</div>'; // card-body
        echo '</div>'; // card
        echo '</div>'; // col-md-4

        $count++;

        if ($count % 3 == 0) {
            // Close the row after every 3 cards
            echo '</div>'; // row
        }
    }

    // Check if there are remaining cards to close the row
    if ($count % 3 != 0) {
        echo '</div>'; // row
    }

    // Flush output buffer
    ob_end_flush();
} else {
    // Query failed, handle the error
    echo "Error: " . mysqli_error($conn);
}
?>

<!-- Your PHP script generating cards goes here -->
<?php include 'footer.php'; ?>

</body>
</html>
