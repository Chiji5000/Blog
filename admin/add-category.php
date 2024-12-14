<?php
include 'partial/header.php';

$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);
?>


<!-- Sign Up Section Starts Here -->

<section class="form__section">
  <div class="container form_section-container">
    <h2>Add Category</h2>
    <?php if (isset($_SESSION['add-category'])) : ?>
      <div class="alert__message error">
        <p>
          <?= $_SESSION['add-category'];
          unset($_SESSION['add-category'])
          ?>
        </p>
      </div>
    <?php endif ?>
    <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST">
      <input type="text" value="<?= $title ?>" name="title" placeholder="Title" />
      <textarea rows="8" name="description" placeholder="Description"><?= $description ?></textarea>
      <button type="submit" name="submit" class="btn">Add category</button>
    </form>
  </div>
</section>

<!-- Sign Up Section Starts Here -->

<?php
include './partial/footer.php';
?>