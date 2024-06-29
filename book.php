<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Open+Sans&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
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
      font-family: 'montserrat';
      position: relative;
      top:2rem;
    }


    .card{
      margin-top: 0rem;
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

<div class="row car-section" id="car-cards">
 <!-- breeza ac -->
  <div class="col-lg-4 mb-5 card-wrapper" data-price="2000" data-seating="4" data-ac="ac">
    <div class="card shadow rounded">
      <img src="images/breeza.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Breeza (ac)</h5> <hr>
        <p class="card-text">👨‍👨‍👧‍👧 4 persons </p> <hr>
        <p class="card-text">₹2000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
      </div>
    </div>
  </div>

<!-- freestyle ac -->
  <div class="col-lg-4 mb-5 card-wrapper" data-price="2000" data-seating="4" data-ac="ac">
    <div class="card shadow rounded">
      <img src="images/freestyle.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Freestyle (ac)</h5> <hr>
        <p class="card-text">👨‍👨‍👧‍👧 4 persons </p> <hr>
        <p class="card-text">₹2000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
      </div>
    </div>
  </div>

<!-- i20 ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="2000" data-seating="4" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/i20.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">i20 (ac)</h5> <hr>
<p class="card-text">👨‍👨‍👧‍👧 4 persons </p> <hr>
            <p class="card-text">₹2000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>

<!-- swift ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="2000" data-seating="4" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/swift.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Swift (ac)</h5><hr>
<p class="card-text">👨‍👨‍👧‍👧 4 persons </p> <hr>
            <p class="card-text">₹2000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>


<!-- scorpio ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="3500" data-seating="6" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/scorpio.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Mahindra Scorpio (ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦👨‍👩 6 persons </p> <hr>
            <p class="card-text">₹3500/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>

<!-- hexa ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="3500" data-seating="6" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/hexa.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Hexa (ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦👨‍👩 6 persons </p> <hr>
            <p class="card-text">₹3500/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>

<!-- tiago ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="2000" data-seating="4" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/tiago.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Tata Tiago (ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦 4 persons </p> <hr>
            <p class="card-text">₹2000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>

<!-- baleno ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="2000" data-seating="4" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/baleno.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Baleno (ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦 4 persons </p> <hr>
            <p class="card-text">₹2000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>

<!-- creta ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="3000" data-seating="4" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/creat.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Hyundai Creta (ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦 4 persons </p> <hr>
           <p class="card-text">₹3000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>

<!-- menza ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="2000" data-seating="4" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/menza.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Tata Manza (ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦 4 persons </p> <hr>
            <p class="card-text">₹2000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>


<!-- skoda ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="2500" data-seating="4" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/skoda.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Skoda Superb (ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦 4 persons </p> <hr>
            <p class="card-text">₹2500/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>

<!-- toyota ac -->
        <div class="col-lg-4 mb-5 card-wrapper" data-price="4000" data-seating="6" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/toyota.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Toyota Innova (ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦👨‍👩 6 persons </p> <hr>
            <p class="card-text">₹4000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>

<!-- traveller 11 ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="7000" data-seating="11" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/luxury.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Tempo Traveller (ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦👨‍👩‍👧‍👦👨‍👩‍👧 11 persons </p> <hr>
            <p class="card-text">₹7000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
      </div>

<!-- traveller 24 ac -->
      <div class="col-lg-4 mb-5 card-wrapper" data-price="12000" data-seating="24" data-ac="ac">
        <div class="card shadow rounded">
          <img src="images/traveller.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Tempo Traveller Luxury (ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦👨‍👩👨‍👩‍👧‍👦👨‍👩👨‍👩‍👧‍👦👨‍👩👨‍👩‍👧‍👦👨‍👩 24persons </p> <hr>
            <p class="card-text">₹12000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
          </div>
        </div>
    </div>
<!-- non-ac -->
 <!-- breeza non ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="1600" data-seating="4" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/breeza.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Breeza (non-ac)</h5> <hr>
      <p class="card-text">👨‍👨‍👧‍👧 4 persons </p> <hr>
      <p class="card-text">₹1600/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- freestyle non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="1600" data-seating="4" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/freestyle.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Freestyle (non-ac)</h5> <hr>
      <p class="card-text">👨‍👨‍👧‍👧 4 persons </p> <hr>
      <p class="card-text">₹1600/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- i20 non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="1600" data-seating="4" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/i20.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">i20 (non-ac)</h5> <hr>
<p class="card-text">👨‍👨‍👧‍👧 4 persons </p> <hr>
      <p class="card-text">₹1600/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- swift non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="1600" data-seating="4" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/swift.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Swift (non-ac)</h5> <hr>
<p class="card-text">👨‍👨‍👧‍👧 4 persons </p> <hr>
      <p class="card-text">₹1600/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- scorpio non-c -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="3000" data-seating="6" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/scorpio.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Mahindra Scorpio (non-ac)</h5><hr>
  <p class="card-text">👨‍👩‍👧‍👦👨‍👩 6 persons </p> <hr>
      <p class="card-text">₹3000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
  </div>
  <!-- hexa non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="3000" data-seating="6" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/hexa.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Hexa (non-ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦👨‍👩 6 persons </p> <hr>
      <p class="card-text">₹3000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- tiago non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="1600" data-seating="4" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/tiago.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Tata Tiago (non-ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦 4 persons </p> <hr>
      <p class="card-text">₹1600/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- baleno non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="1600" data-seating="4" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/baleno.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Baleno (non-ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦 4 persons </p> <hr>
      <p class="card-text">₹1600/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- creta non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="2500" data-seating="4" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/creat.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Hyundai Creta (non-ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦 4 persons </p> <hr>
     <p class="card-text">₹2500/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- menza non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="1600" data-seating="4" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/menza.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Tata Manza (non-ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦 4 persons </p> <hr>
      <p class="card-text">₹1600/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- skoda non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="1600" data-seating="4" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/skoda.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Skoda Superb (non-ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦 4 persons </p> <hr>
      <p class="card-text">₹1600/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- toyota non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="3500" data-seating="6" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/toyota.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Toyota Innova (non-ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦👨‍👩 6 persons </p> <hr>
      <p class="card-text">₹3500/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- traveller 11 non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="6000" data-seating="11" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/luxury.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Tempo Traveller (non-ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦👨‍👩‍👧‍👦👨‍👩‍👧 11 persons </p> <hr>
      <p class="card-text">₹6000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
<!-- traveller 24 non-ac -->
<div class="col-lg-4 mb-5 card-wrapper" data-price="10000" data-seating="24" data-ac="non-ac">
  <div class="card shadow rounded">
    <img src="images/traveller.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Tempo Traveller Luxury (non-ac)</h5><hr>
<p class="card-text">👨‍👩‍👧‍👦👨‍👩👨‍👩‍👧‍👦👨‍👩👨‍👩‍👧‍👦👨‍👩👨‍👩‍👧‍👦👨‍👩 24persons </p> <hr>
      <p class="card-text">₹10000/day <a href="https://wa.me/+918328632167" class="button btn btn-dark">Book Now</a></p>
    </div>
  </div>
</div>
  </div>
  <!-- Repeat the above pattern for all car cards, adding appropriate data attributes for price, seating, and AC/Non-AC -->
  <!-- Additional car cards -->
</div>
<div class="back-to-top" onclick="toggleScroll()">
  ꔮ
</div>
    
</body>
</html>