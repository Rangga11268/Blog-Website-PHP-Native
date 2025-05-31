<?php

include 'partials/header.php';;

?>

<head>
  <link rel="stylesheet" href="<?= ROOT_URL; ?>dist/contact.css" />

  <!-- Contact  -->
  <section class="contact">
    <div class="container contact-container">
      <aside class="contact-aside">
        <div class="contact-image">
          <img src="./images/img/contact.svg" alt="" />
        </div>
        <h2>Contact US</h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum amet
          perferendis accusamus hic harum beatae tempore natus, quod
          voluptatum tempora molestiae.!
        </p>
        <ul class="contact-details">
          <li>
            <i class="uil uil-phone-times"></i>
            <h5>+0898-9000-090</h5>
          </li>
          <li>
            <i class="uil uil-envelope"></i>
            <h5>mamat@gmail.com</h5>
          </li>
          <li>
            <i class="uil uil-location-point"></i>
            <h5>Jakarta, Indonesia</h5>
          </li>
        </ul>
        <ul class="contact-socials">
          <a href="#"><i class="uil uil-facebook"></i></a>
          <a href="#"><i class="uil uil-instagram"></i></a>
          <a href="#"><i class="uil uil-twitter"></i></a>
          <a href="#"><i class="uil uil-linkedin"></i></a>
        </ul>
      </aside>
      <form class="contact-form">
        <div class="form-name">
          <input type="text" name="First Name" placeholder="Frist Name" required>
          <input type="text" name="Last Name" placeholder="Last Name" required>
        </div>
        <input type="email" name="Email Address" placeholder="Your Email Address" required>
        <textarea name="Message" rows=7" placeholder="Message" required></textarea>
        <button type="submit" class="btn btn-primary">Send Message</button>
      </form>
    </div>
  </section>
  <!-- Contact end -->
</head>

<?php

include 'partials/footer.php';

?>