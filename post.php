<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM posts WHERE id=$id";
  $result = mysqli_query($connection, $query);
  $post = mysqli_fetch_assoc($result);
} else {
  header('location: ' . ROOT_URL . 'blog.php');
}
?>
<!-- 
    Nav Ends
     -->

<!-- This is The START Of SIngle Post -->

<section class="singlepost">
  <div class="container singlepost__container">
    <h2>
      <?= $post['title'] ?>
    </h2>
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
    <div class="singlepost__thumbnail">
      <img src="./images/<?= $post['thumbnail'] ?>" />
    </div>
    <p>
      <?= $post['body'] ?>
    </p>
  </div>
</section>

<!-- This is The End Of SIngle Post -->

<!-- This is the start of category Buttons -->

<section class="category_buttons">
  <div class="container category_buttons-container">
    <a href="" class="category_button">Smoking</a>
    <a href="" class="category_button">Spiratuality</a>
    <a href="" class="category_button">Love</a>
    <a href="" class="category_button">Sex</a>
    <a href="" class="category_button">Sports</a>
  </div>
</section>

<!-- This is the End of category Buttons -->

<?php
include './partials/footer.php';
?>