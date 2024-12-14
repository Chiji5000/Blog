<?php
include 'partial/header.php';

if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  $query = "SELECT * FROM categories WHERE id=$id";
  $result = mysqli_query($connection, $query);
  if (mysqli_num_rows($result) == 1) {
    $category = mysqli_fetch_assoc($result);
  }
} else {
  header('location: ' . ROOT_URL . 'admin/manage-categories');
  die();
}
?>


<!-- Sign Up Section Starts Here -->

<section class="form__section">
  <div class="container form_section-container">
    <h2>Edit Category</h2>
    <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="POST">
      <input type="hidden" name="id" value="<?= $category['id'] ?>" />
      <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title" />
      <textarea rows="8" name="description" placeholder="Description"><?= $category['description'] ?></textarea>
      <button type="submit" name="submit" class="btn">Update category</button>
    </form>
  </div>
</section>

<!-- Sign Up Section Starts Here -->


<?php
include './partial/footer.php';
?>