<?php

include "partials/header.php";

// fecth kategori dari database
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($conn, $category_query);

// fecth form data dari database
if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM posts WHERE id=$id";
  $posts = mysqli_query($conn, $query);
  $post = mysqli_fetch_assoc($posts);
} else {
  header('location:' . ROOT_URL . 'admin/');
  die();
}

?>

<!-- add post -->
<section class="form-section">
  <div class="container form-section-container">
    <h2>Edit Post</h2>
    <form action="<?= ROOT_URL; ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="post">
      <input type="hidden" name="id" value="<?= $post["id"]; ?>" />
      <input type="hidden" name="prev_thumbnail" value="<?= $post["thumbnail"]; ?>" />
      <input type="text" name="title" value="<?= $post["title"]; ?>" placeholder="Title" />
      <select name="category">
        <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
          <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
        <?php endwhile ?>
      </select>
      <textarea rows="10" name="body" placeholder="Body"><?= $post["body"]; ?></textarea>
      <div class="form-control inline">
        <input type="checkbox" name="is_featured" value="1" id="is_featured" checked />
        <label for="is_featured">Featured</label>
      </div>
      <div class="form-control">
        <label for="thumbnail">Update Thumbnail</label>
        <input type="file" name="thumbnail" id="thumbnail" />
      </div>
      <button type="submit" name="submit" class="btn">Update Posts</button>
    </form>
  </div>
</section>

<!-- Add post end -->
<?php

include "../partials/footer.php"

?>