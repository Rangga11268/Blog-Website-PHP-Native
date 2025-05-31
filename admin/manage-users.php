<?php

include "partials/header.php";

// fetch user dari database tapi bukan user sekarang
$cuurent_admin_id = $_SESSION['user-id'];


$query = "SELECT * FROM users WHERE NOT id=$cuurent_admin_id";
$users = mysqli_query($conn, $query);
?>

<!-- Aside  -->
<section class="dashboard">
  <!-- Pesan Jika Ada yang di hapus , tambah atau edit -->
  <?php if (isset($_SESSION['add-user-success'])) : //Jika add user berhasil 
  ?>
    <div class="alert-message success container">
      <p>
        <?= $_SESSION['add-user-success'];
        unset($_SESSION['add-user-success']) ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['edit-user-success'])) : //Jika edit user berhasil 
  ?>
    <div class="alert-message success container">
      <p>
        <?= $_SESSION['edit-user-success'];
        unset($_SESSION['edit-user-success']) ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['edit-user'])) : //Jika edit user gagal 
  ?>
    <div class="alert-message error container">
      <p>
        <?= $_SESSION['edit-user'];
        unset($_SESSION['edit-user']) ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['delete-user'])) : //Jika delete user gagal 
  ?>
    <div class="alert-message error container">
      <p>
        <?= $_SESSION['delete-user'];
        unset($_SESSION['delete-user']) ?>
      </p>
    <?php elseif (isset($_SESSION['delete-user-success'])) : //Jika delete user berhasil 
    ?>
      <div class="alert-message success container">
        <p>
          <?= $_SESSION['delete-user-success'];
          unset($_SESSION['delete-user-success']) ?>
        </p>
      </div>
    <?php endif ?>
    <div class="container dashboard-container">
      <button id="show-sidebar-btn" class="sidebar-toggle">
        <i class="fa-solid fa-angle-right"></i>
      </button>
      <button id="hide-sidebar-btn" class="sidebar-toggle">
        <i class="fa-solid fa-angle-left"></i>
      </button>

      <aside>
        <ul>
          <li>
            <a href="add-post.php"><i class="fa-solid fa-pen"></i>
              <h5>Add post</h5>
            </a>
          </li>
          <li>
            <a href="index.php"><i class="fa-solid fa-bars-progress"></i>
              <h5>Manage posts</h5>
            </a>
          </li>
          <?php if (isset($_SESSION['user-id-admin'])) : ?>
            <li>
              <a href="add-user.php"><i class="fa-solid fa-pen"></i>
                <h5>Add user</h5>
              </a>
            </li>
            <li>
              <a href="manage-users.php" class="active"><i class="fa-solid fa-users"></i>
                <h5>Manage users</h5>
              </a>
            </li>
            <li>
              <a href="add-category.php"><i class="fa-solid fa-pen-to-square"></i>
                <h5>Add Category</h5>
              </a>
            </li>
            <li>
              <a href="manage-categories.php"><i class="fa-solid fa-bars"></i>
                <h5>Manage categories</h5>
              </a>
            </li>
          <?php endif ?>
        </ul>
      </aside>
      <main>
        <h2>Manage Users</h2>
        <?php if (mysqli_num_rows($users) > 0) : ?>
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>UserName</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Admin</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($user = mysqli_fetch_assoc($users)) : ?>
                <tr>
                  <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                  <td><?= $user['username']; ?></td>
                  <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id= <?= $user['id']; ?>" class="btn sm">Edit</a></td>
                  <td>
                    <a href="<?= ROOT_URL ?>admin/delete-user.php?id= <?= $user['id']; ?>" class="btn sm danger">Delete</a>
                  </td>
                  <td><?= $user['is_admin'] ? 'Yes' : 'No'; ?></td>
                </tr>
              <?php endwhile ?>
            </tbody>
          </table>
        <?php else : ?>
          <div class="alert-message error"><?= "User Tidak Di Temukan"; ?></div>
        <?php endif ?>
      </main>
    </div>
</section>
<!-- Aside end -->

<?php

include "../partials/footer.php"

?>