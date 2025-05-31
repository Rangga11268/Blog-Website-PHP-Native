<?php

include "partials/header.php";

// fetch categories dari database
$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($conn, $query);


?>

<!-- Aside  -->
<section class="dashboard">
  <?php if (isset($_SESSION['add-category-success'])) : //Jika add kaegori berhasil 
  ?>
    <div class="alert-message success container">
      <p>
        <?= $_SESSION['add-category-success'];
        unset($_SESSION['add-category-success']) ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['add-category'])) : //Jika add kaegori berhasil 
  ?>
    <div class="alert-message error container">
      <p>
        <?= $_SESSION['add-category'];
        unset($_SESSION['add-category']) ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['edit-category'])) : //Jika edit kaegori gagal 
  ?>
    <div class="alert-message error container">
      <p>
        <?= $_SESSION['edit-category'];
        unset($_SESSION['edit-category']) ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['edit-category-success'])) : //Jika edit kaegori berhasil 
  ?>
    <div class="alert-message success container">
      <p>
        <?= $_SESSION['edit-category-success'];
        unset($_SESSION['edit-category-success']);
        ?>
      </p>
    <?php elseif (isset($_SESSION['delete-category-success'])) : //Jika delete kaegori berhasil 
    ?>
      <div class="alert-message success container">
        <p>
          <?= $_SESSION['delete-category-success'];
          unset($_SESSION['delete-category-success']);
          ?>
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
              <a href="manage-users.php"><i class="fa-solid fa-users"></i>
                <h5>Manage users</h5>
              </a>
            </li>
            <li>
              <a href="add-category.php"><i class="fa-solid fa-pen-to-square"></i>
                <h5>Add Category</h5>
              </a>
            </li>
            <li>
              <a href="manage-categories.php" class="active"><i class="fa-solid fa-bars"></i>
                <h5>Manage Categories</h5>
              </a>
            </li>
          <?php endif ?>
        </ul>
      </aside>
      <main>
        <h2>Manage Categories</h2>
        <?php if (mysqli_num_rows($categories) > 0) : ?>
          <table>
            <thead>
              <tr>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                <tr>
                  <td><?= $category['title']; ?></td>
                  <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id']; ?>" class="btn sm">Edit</a></td>
                  <td>
                    <a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id']; ?>" class="btn sm danger">Delete</a>
                  </td>
                </tr>
              <?php endwhile ?>
            </tbody>
          </table>
        <?php else : ?>
          <div class="alert-message error"><?= "Kategori Tidak Di Temukan"; ?></div>
        <?php endif ?>
      </main>
    </div>
</section>
<!-- Aside end -->

<?php

include "../partials/footer.php"

?>