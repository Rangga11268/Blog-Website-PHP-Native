<?php
require "config/constants.php";

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);

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
      <h2>Sign In</h2>
      <?php if (isset($_SESSION['signupSuccess'])) : ?>
        <div class="alert-message success">
          <p>
            <?= $_SESSION['signupSuccess'];
            unset($_SESSION['signupSuccess']) ?>
          </p>
        </div>
      <?php elseif (isset($_SESSION['signin'])) :  ?>
        <div class="alert-message error">
          <p>
            <?= $_SESSION['signin'];
            unset($_SESSION['signin']) ?>
          </p>
        </div>
      <?php endif ?>
      <form action="<?= ROOT_URL ?>signin-logic.php" method="post">
        <input type="text" name="username_email" value="<?= $username_email; ?>" placeholder="UserName / Email" />
        <input type="password" name="password" value="<?= $password; ?>" placeholder="password" />
        <button type="submit" name="submit" class="btn">Sign In</button>
        <small>Don't have an account ? <a href="signup.php">Sign Up</a></small>
      </form>
    </div>
  </section>
</body>

</html>