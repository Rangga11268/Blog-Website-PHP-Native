<?php

include "partials/header.php";

// jika ada error data akan tetap
$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createPass = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmPass = $_SESSION['add-user-data']['confirmpassword'] ?? null;
// hapus sesi data
unset($_SESSION['add-user-data']);

?>
<!-- add post -->
<section class="form-section">
  <div class="container form-section-container">
    <h2>Add User</h2>
    <?php if (isset($_SESSION['add-user'])) : ?>
      <div class="alert-message error">
        <p>
          <?= $_SESSION['add-user'];
          unset($_SESSION['add-user']) ?>
        </p>
      </div>
    <?php endif ?>
    <form action="<?= ROOT_URL; ?>admin/add-user-logic.php" enctype="multipart/form-data" method="post">
      <input type="text" name="firstname" value="<?= $firstname; ?>" placeholder="First Name" />
      <input type="text" name="lastname" value="<?= $lastname; ?>" placeholder="Last Name" />
      <input type="text" name="username" value="<?= $username; ?>" placeholder="User Name" />
      <input type="email" name="email" value="<?= $email; ?>" placeholder="Email" />
      <input type="password" name="createpassword" value="<?= $createPass; ?>" placeholder="Create Password" />
      <input type="password" name="confirmpassword" value="<?= $confirmPass; ?>" placeholder="Confirm Password" />
      <select name="userrole" id="">
        <option value="0">Author</option>
        <option value="1">Admin</option>
      </select>
      <div class="form-control">
        <label for="avatar">User Avatar</label>
        <input type="file" name="avatar" id="avatar" />
      </div>
      <button type="submit" name="submit" class="btn">Add User</button>
    </form>
  </div>
</section>

<!-- Add post end -->
<?php

include "../partials/footer.php"

?>