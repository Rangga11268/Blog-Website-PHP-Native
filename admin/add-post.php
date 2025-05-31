<?php

include "partials/header.php";


// fetch kategori dari database
$query = "SELECT * FROM categories";
$categories = mysqli_query($conn, $query);


// kembalikan data jika form data tidak valid
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;


// hapus form data session
unset($_SESSION['add-post-data']);

?>
<!-- add post -->
<section class="form-section">
  <div class="container form-section-container">
    <h2>Add Post</h2>
    <?php if (isset($_SESSION['add-post'])) : ?>
      <div class="alert-message error">
        <p><?= $_SESSION['add-post'];
            unset($_SESSION['add-post']); ?></p>
      </div>
    <?php endif ?>
    <form action="<?= ROOT_URL; ?>admin/add-post-logic.php" enctype="multipart/form-data" method="post">
      <input type="text" name="title" value="<?= $title; ?>" placeholder="Title" />
      <select name="category">
        <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
          <option value="<?= $category['id']; ?>"><?= $category['title']; ?></option>
        <?php endwhile ?>
      </select>
      <textarea name="body" rows="10" placeholder="Body"><?= $body; ?></textarea>
      <?php if (isset($_SESSION['user-id-admin'])) : ?>
        <div class="form-control inline">
          <input type="checkbox" name="is_featured" value="1" id="is_featured" checked />
          <label for="is_featured">Featured</label>
        </div>
      <?php endif ?>
      <div class="form-control">
        <label for="thumbnail">Add Thumbnail</label>
        <input type="file" name="thumbnail" id="thumbnail" />
      </div>
      <button type="submit" name="submit" class="btn">Add Posts</button>
    </form>
  </div>
</section>

<!-- Add post end -->
<?php

include "../partials/footer.php"

?>