<?php

include "partials/header.php";

// fetch current user post dari database

$current_user_id = $_SESSION['user-id'];
$query = "SELECT id, title, category_id FROM posts WHERE posts.author_id = $current_user_id ORDER BY posts.id DESC";
$posts = mysqli_query($conn, $query);

?>

<!-- Aside  -->
<section class="dashboard">
  <?php if (isset($_SESSION['add-post-success'])) : ?>
    <div class="alert-message success container">
      <p><?= $_SESSION['add-post-success'];
          unset($_SESSION['add-post-success']); ?></p>
    </div>
  <?php elseif (isset($_SESSION['edit-post-success'])) : ?>
    <div class="alert-message success container">
      <p><?= $_SESSION['edit-post-success'];
          unset($_SESSION['edit-post-success']); ?></p>
    </div>
  <?php elseif (isset($_SESSION['edit-post'])) : ?>
    <div class="alert-message error container">
      <p><?= $_SESSION['edit-post'];
          unset($_SESSION['edit-post']); ?></p>
    </div>
  <?php elseif (isset($_SESSION['delete-post-success'])) : ?>
    <div class="alert-message success container">
      <p><?= $_SESSION['delete-post-success'];
          unset($_SESSION['delete-post-success']); ?></p>
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
          <a href="index.php" class="active"><i class="fa-solid fa-bars-progress"></i>
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
            <a href="manage-categories.php"><i class="fa-solid fa-bars"></i>
              <h5>Manage Categories</h5>
            </a>
          </li>
        <?php endif ?>
      </ul>
    </aside>
    <main>
      <h2>Manage Users</h2>
      <?php if (mysqli_num_rows($posts) > 0) : ?>
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
              <!-- ambil judul kategori dari setiap post dari kategori table -->
              <?php
              $category_id = $post['category_id'];
              $category_query = "SELECT title FROM categories WHERE id = $category_id";
              $category_result = mysqli_query($conn, $category_query);
              $category = mysqli_fetch_assoc($category_result);
              ?>
              <tr>
                <td><?= $post['title']; ?></td>
                <td><?= $category['title']; ?></td>
                <td><a href="<?= ROOT_URL ?>admin/edit-posts.php?id=<?= $post['id']; ?>" class="btn sm">Edit</a></td>
                <td>
                  <a href="<?= ROOT_URL ?>admin/delete-posts.php?id=<?= $post['id']; ?>" class="btn sm danger">Delete</a>
                </td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      <?php else : ?>
        <div class="alert-message error"><?= "Posts Tidak Di Temukan"; ?></div>
      <?php endif ?>
    </main>
  </div>
</section>
<!-- Aside end -->

<?php

include "../partials/footer.php"

?>