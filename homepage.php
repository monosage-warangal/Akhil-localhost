<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Homepage</title>
</head>
<body>
<div class="slider">
  <div class="slides">
    <img src="images/1.png" alt="Slide 1">
    <img src="images/2.png" alt="Slide 2">
    <img src="images/3.png" alt="Slide 3">
    <img src="images/4.png" alt="Slide 4">
  </div>
</div>

<!-- <img src="images/.1.png" alt="cover" > -->

    <section class="image-text-section">
        <img src="images/first.png" alt="Section Image" class="section-img">
        <div class="section-text">
            <h2>Welcome to Our Service</h2>
            <p>Miles & Smiles Travels, nestled in the coastal beauty of Vizag, invites you to embark on
                 unforgettable journeys across India. Whether you're dreaming of exploring the serene beaches
                  of Goa, experiencing the vibrant culture of Rajasthan, or trekking through the Himalayan 
                  foothills, we curate journeys that resonate with your spirit of adventure. 
                  With a passion for travel and a commitment to quality service, Miles & Smiles Travels ensures 
                  that every trip is a seamless blend of comfort, discovery, and cherished memories.</p>
    </section>
    <hr>
    <div class="image-text-section">
        <div class="section-text">
            <h1><b class="b">|</b> Airport Pickup<br><b class="b">|</b> Breakdown Assistance<br><b class="b">|</b> Emergency Service</h1>
        </div>
            <img src="images/4cars.png" alt="section image" class="section-img">
    </div>
    <hr>
    <section class="image-text-section">
        <img src="images/2cars.png" alt="Section Image" class="section-img">
        <div class="section-text">
            <h2>MOST RELIABLE CAR RENTAL SERVICE IN INDIA</h2><br>
            <p>🔸Miles & Smiles Car Travels & rentals Service is the best 
            car travel and rental service in India. With affordable rates
            and 24/7 customer service, it is the ideal platform for tourists 
            exploring India.
            </p>
            <p>🔸Save yourself some time by scheduling services right here. 
            After clicking on BOOK NOW, we will be in touch to confirm 
            your service appointment and vehicle reservation.
             It does not get much easier than that.</p>
        </div>
    </section>

    <!-- <section class="full-width-image">
        <img src="images/vizagx.png" alt="Full Width Image 1" class="full-width-img">
    </section>

    <section class="full-width-image">
        <img src="images/box1.png" alt="Full Width Image 2" class="full-width-img">
    </section>

    <section class="full-width-image">
        <img src="images/akhil1.png" alt="Full Width Image 3" class="full-width-img">
    </section> -->

    <?php include 'footer.php'; ?>
    <script>
const slides = document.querySelectorAll('.slides img');
const slideCount = slides.length;
const slideWidth = slides[0].clientWidth;
let index = 0;

function nextSlide() {
  index = (index + 1) % slideCount;
  updateSlidePosition();
}

function updateSlidePosition() {
  const offset = -index * slideWidth;
  document.querySelector('.slides').style.transform = `translateX(${offset}px)`;
}

setInterval(nextSlide, 3000); // Change slide every 3 seconds (3000 milliseconds)
</script>
</body>
</html>
