<?php

include 'partials/header.php';

// fetch semua post dari post table
$query = "SELECT * FROM posts ORDER BY date_time DESC";
$posts = mysqli_query($conn, $query);


?>

<!-- Search bar  -->
<section class="search-bar">
  <form action="<?= ROOT_URL; ?>search.php" class="container search-bar-container" method="GET">
    <div>
      <i class="fa-solid fa-magnifying-glass"></i>
      <input type="search" name="search" placeholder="search" />
    </div>
    <button type="submit" name="submit" class="btn">Go</button>
  </form>
</section>
<!-- Search bar end -->

<!-- Posts  -->
<section class="posts">
  <div class=" container posts-container">
    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
      <article class="post">
        <div class="post-thumbnail">
          <img src="./images/<?= $post['thumbnail']; ?> " />
        </div>
        <div class="post-info">
          <?php
          // fecth kategori dari database
          $category_id = $post['category_id'];
          $category_query = "SELECT * FROM categories WHERE id = $category_id";
          $category_result = mysqli_query($conn, $category_query);
          $category = mysqli_fetch_assoc($category_result);
          ?>
          <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id']; ?>" class="category-button">
            <?= $category['title']; ?></a>
          <h3 class="post-title">
            <a href="<?= ROOT_URL ?>posts.php?id=<?= $post['id']; ?>; ?>"><?= $post['title']; ?></a>
          </h3>
          <p class="post-body">
            <?= substr($post['body'], 0, 150); ?>...
          </p>
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
        </div>
      </article>
    <?php endwhile ?>
  </div>
</section>
<!-- Posts end -->

<!-- Category Button-->

<section class="category-buttons">
  <div class="container category-buttons-container">
    <?php
    $all_categories = "SELECT * FROM categories";
    $all_categories_result = mysqli_query($conn, $all_categories);
    ?>
    <?php while ($category = mysqli_fetch_assoc($all_categories_result)) : ?>
      <a href="<?= ROOT_URL; ?>category-posts.php?id=<?= $category['id']; ?>" class="category-button"><?= $category['title']; ?></a>
    <?php endwhile ?>
  </div>
</section>
<!-- Category Button end-->

<?php

include 'partials/footer.php';

?>