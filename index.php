<?php
include 'partials/header.php';

$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);

$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connection, $query);
?>

<?php
if (mysqli_num_rows($featured_result) == 1) : ?>
  <!-- 
     Start of Features
      -->
  <section class="featured">
    <div class="container featured__container">
      <div class="post__thumbnails">
        <img src="./images/<?= $featured['thumbnail'] ?>" alt="profile pics" />
      </div>
      <div class="post_info">
        <?php
        $category_id = $featured['category_id'];
        $category_query = "SELECT * FROM categories WHERE id=$category_id";
        $category_result = mysqli_query($connection, $category_query);
        $category = mysqli_fetch_assoc($category_result);
        ?>
        <a href="<?= ROOT_URL ?>category.php?id=<?= $category['id'] ?>" class="category_button"><?= $category['title'] ?></a>
        <h2 class="post_title">
          <a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a>
        </h2>
        <p class="post_body">
          <?= substr($featured['body'], 0, 300) ?>...
        </p>
        <div class="post_author">
          <?php
          $author_id = $featured['author_id'];
          $author_query = "SELECT * FROM users WHERE id=$author_id";
          $author_result = mysqli_query($connection, $author_query);
          $author = mysqli_fetch_assoc($author_result);
          ?>
          <div class="post_author-avatar">
            <img src="./images/<?= $author['avatar'] ?>" alt="" />
          </div>
          <div class="post_author-info">
            <div class="post_author-info">
              <h5>BY: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
              <small><?= date("M d, Y - H:i", strtotime($featured['date_time'])) ?></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>

<!-- Start of Futures -->

<section class="posts <?= $featured ? '' : 'section__extra-margin' ?>">
  <div class="container posts_container">
    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
      <article class="post">
        <div class="post__thumbnail">
          <img src="./images/<?= $post['thumbnail'] ?>" />
        </div>
        <div class="post_info">
          <?php
          $category_id = $post['category_id'];
          $category_query = "SELECT * FROM categories WHERE id=$category_id";
          $category_result = mysqli_query($connection, $category_query);
          $category = mysqli_fetch_assoc($category_result);
          ?>
          <a href="<?= ROOT_URL ?>category.php?id=<?= $category['id'] ?>" class="category_button"><?= $category['title'] ?></a>
          <h3 class="post__title">
            <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
          </h3>
          <p class="post__body">
            <?= substr($featured['body'], 0, 150) ?>...
          </p>
          <div class="post_author">
            <?php
            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
            ?>
            <div class="post_author-avatar">
              <img src="./images/<?= $author['avatar'] ?>" alt="" />
            </div>
            <div class="post_author-info">
              <h5>BY: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
              <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile ?>
  </div>
</section>

<!-- The End of Futures -->

<!-- This is the start of category Buttons -->

<section class="category_buttons">
  <div class="container category_buttons-container">
    <?php
    $all_categories_query = "SELECT * FROM categories";
    $all_categories = mysqli_query($connection, $all_categories_query);
    ?>
    <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
      <a href="<?= ROOT_URL ?>category.php?id=<?= $category['id'] ?>" class="category_button"><?= $category['title'] ?></a>
    <?php endwhile ?>
  </div>
</section>

<!-- This is the End of category Buttons -->

<?php
include './partials/footer.php';
?>