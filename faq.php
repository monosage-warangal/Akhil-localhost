<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1b91071d81.js" crossorigin="anonymous"></script>
    <title>Homepage</title>
    <style>
        body{
            background-color: black;
        }
          .faq-container {
    background-image:url('images/faq.png');
    background-size: cover;
    border-radius: 15px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    padding: 20px;
    margin: 20px;
    width: calc(100% - 40px);
  }

  .faq-title {
    color:white;
    text-align: center;
    font-size: 40px;
    margin-left: 22px;
  }

  .faq-question {
    color: white;
    border-bottom: 2px solid #74b2d1;
    padding: 10px;
    cursor: pointer;
  }

  .faq-answer {
    color:silver;
    border-bottom: 2px solid #dd90ca;
    display: none;
    padding: 10px;
  }
  .toggle-button {
    font-size: 24px;
    float: right;
    cursor: pointer;
  }
  </style>
  </head>
  <body>
    <div class="faq-title">Frequently Asked Questions</div>
<div class="faq-container">
  
  <div class="faq">
  
  <div class="faq-question">
  <i class="fa-solid fa-question"></i> What is a self-drive car rental?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> Self-drive car rentals allow you to rent a car and drive it yourself without a chauffeur or driver service.
  </div>

<div class="faq-question">
<i class="fa-solid fa-question"></i> What are the requirements to rent a self-drive car?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> Typically, you need a valid driver's license, a credit card, and be above a certain age (usually 21 or 25).
  </div>

<div class="faq-question">
<i class="fa-solid fa-question"></i> Is insurance included in self-drive car rentals?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> Basic insurance is often included, but you can usually purchase additional coverage for more comprehensive protection.
  </div>

<div class="faq-question">
<i class="fa-solid fa-question"></i> What should I do if the rental car breaks down?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> Contact us immediately. We typically provide roadside assistance. Follow our instructions for repair or replacement.
  </div>

<div class="faq-question">
<i class="fa-solid fa-question"></i> What if I return the car late?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> Late returns may incur additional fees. Inform us as soon as you know you'll be late to avoid higher charges.
  </div>

<div class="faq-question">
<i class="fa-solid fa-question"></i> What services do you offer?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> We offer a range of travel services including airport transfers, city tours, long-distance trips, corporate travel, and special event transportation. All services come with a professional driver.
  </div>

<div class="faq-question">
<i class="fa-solid fa-question"></i> What types of vehicles do you have?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> We have a diverse fleet including sedans, SUVs, minivans, and luxury vehicles. You can choose a vehicle that best suits your needs when booking.
  </div>

<div class="faq-question">
<i class="fa-solid fa-question"></i> Are your drivers professional and licensed?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> Yes, all our drivers are professionally trained, licensed, and have undergone thorough background checks. They are experienced in providing safe and comfortable travel.
  </div>
  <div class="faq-question">
  <i class="fa-solid fa-question"></i> How can I cancel or modify my booking?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> You can cancel or modify your booking through our website, app, or by contacting our customer service. Please refer to our cancellation policy for details on any applicable fees.
  </div>
</div>
<div class="faq-question">
<i class="fa-solid fa-question"></i> What measures do you take for passenger safety?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> We prioritize passenger safety by maintaining our vehicles regularly, training our drivers in safe driving practices, and adhering to all local regulations. Additionally, we follow strict hygiene protocols to ensure a clean and safe environment.
  </div>

<div class="faq-question">
<i class="fa-solid fa-question"></i> Do you offer 24/7 service?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> If you leave an item in one of our vehicles, please contact our customer service as soon as possible. We will assist you in retrieving your lost belongings.
  </div>

<div class="faq-question">
<i class="fa-solid fa-question"></i> How far in advance should I book?
    <span class="toggle-button">+</span>
  </div>
  <div class="faq-answer">
    <b>Answer:</b> While we accept last-minute bookings, we recommend booking at least 24 hours in advance to ensure availability, especially during peak times and for special requests.
  </div>
<script>
    
    document.addEventListener('DOMContentLoaded', (event) => {
  document.querySelectorAll('.faq-question').forEach(item => {
    item.addEventListener('click', event => {
      const answer = item.nextElementSibling;
      const toggleButton = item.querySelector('.toggle-button');
      const isAnswerVisible = answer.style.display === 'block';
      
      // Toggle answer visibility
      answer.style.display = isAnswerVisible ? 'none' : 'block';
      
      // Update toggle button text
      toggleButton.textContent = isAnswerVisible ? '+' : '-';
    });
  });
});
</script>


  <!-- Repeat for each FAQ -->

</div>
</body
<?php include 'footer.php'; ?>>
</html>