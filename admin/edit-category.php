<?php

include "partials/header.php";

if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  // ambil data dari kategori database
  $query = "SELECT * FROM categories WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $category = mysqli_fetch_assoc($result);
  }
} else {
  header('location:' . ROOT_URL . 'admin/manage-category.php');
  die();
}

?>
<section class="form-section">
  <div class="container form-section-container">
    <h2>Edit Category</h2>
    <form action="<?= ROOT_URL; ?>admin/edit-category-logic.php" method="POST">
      <input type="hidden" name="id" value="<?= $category['id']; ?>" />
      <input type="text" name="title" value="<?= $category['title']; ?>" placeholder="Title" />
      <textarea name="description" rows="4" placeholder="Update category"><?= $category['description']; ?></textarea>
      <button type="submit" name="submit" class="btn">Add Category</button>
    </form>
  </div>
</section>

<?php

include "../partials/footer.php"

?>