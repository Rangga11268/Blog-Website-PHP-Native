<?php
require "config/constants.php";

// kembali data form jika ada error

$firstname = $_SESSION['signupData']['firstname'] ?? null;
$lastname = $_SESSION['signupData']['lastname'] ?? null;
$username = $_SESSION['signupData']['username'] ?? null;
$email = $_SESSION['signupData']['email'] ?? null;
$createPass = $_SESSION['signupData']['createpassword'] ?? null;
$confirmPass = $_SESSION['signupData']['confirmpassword'] ?? null;

// delete signup data session
unset($_SESSION['signupData']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Darell Blog web</title>
  <!-- css -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>dist/style.css" />
  <!-- <link rel="stylesheet" href="/dist/blog.css" /> -->
  <!-- FontAwsome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <!-- Montserrat -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <section class="form-section">
    <div class="container form-section-container">
      <h2>Sign Up</h2>
      <?php
      if (isset($_SESSION['signup'])) : ?>
        <div class="alert-message error">
          <p><?=
              $_SESSION['signup'];
              unset($_SESSION['signup']);
              ?>
          </p>
        </div>
      <?php endif ?>
      <form action="<?= ROOT_URL ?>singup-logic.php" enctype="multipart/form-data" method="post">
        <input type="text" value="<?= $firstname; ?>" name="firstname" placeholder="First Name" />
        <input type="text" value="<?= $lastname; ?>" name="lastname" placeholder="Last Name" />
        <input type="text" value="<?= $username; ?>" name="username" placeholder="User Name" />
        <input type="email" value="<?= $email; ?>" name="email" placeholder="Email" />
        <input type="password" value="<?= $createPass; ?>" name="createpassword" placeholder="Create Password" />
        <input type="password" value="<?= $confirmPass; ?>" name="confirmpassword" placeholder="Confirm Password" />
        <div class="form-control">
          <label for="avatar">User Avatar</label>
          <input type="file" name="avatar" id="avatar" />
        </div>
        <button type="submit" name="submit" class="btn">Sign Up</button>
        <small>Alredy have an account ? <a href="signin.php">Sign In</a></small>
      </form>
    </div>
  </section>
</body>

</html>