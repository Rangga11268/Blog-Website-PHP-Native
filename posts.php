<?php

include 'partials/header.php';

// fetch post dari database
if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM posts WHERE id = $id";
  $result = mysqli_query($conn, $query);
  $post = mysqli_fetch_assoc($result);
} else {
  header('location:' . ROOT_URL . 'blog.php');
  die();
}



?>
<!-- Single Post -->
<section class="singlepost">
  <div class="container singlepost-container">
    <h2><?= $post['title']; ?></h2>
    <div class="post-author">
      <?php
      // fetch data author dari database
      $author_id = $post['author_id'];
      $author_query = "SELECT * FROM users WHERE id = $author_id";
      $author_result = mysqli_query($conn, $author_query);
      $author = mysqli_fetch_assoc($author_result);
      ?>
      <div class="post-author-avatar">
        <img src="./images/<?= $author['avatar']; ?>" />
      </div>
      <div class="post-author-info">
        <h5>By: <?= "{$author['firstname']} {$author['lastname']}"; ?></h5>
        <small>
          <?= date("M d, Y - H:i", strtotime($post['date_time'])); ?>
        </small>
      </div>
    </div>
    <div class="singlepost-thumbnail">
      <img src="./images/<?= $post['thumbnail']; ?>" />
    </div>
    <p>
      <?= $post['body']; ?>
    </p>
  </div>
</section>
<!-- Single Post end -->

<?php

include 'partials/footer.php';

?>