<?php
include 'partial/header.php';

if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM users WHERE id=$id";
  $result = mysqli_query($connection, $query);
  $user = mysqli_fetch_assoc($result);
} else {
  header('location: ' . ROOT_URL . 'admin/manage-users.php');
  die();
}


?>
<!-- Sign Up Section Starts Here -->

<section class="form__section">
  <div class="container form_section-container">
    <h2>Edit User</h2>
    <form action="<?= ROOT_URL ?>admin/edit-user-logic.php" enctype="multipart/form-data" method="POST">
      <input type="hidden" value="<?= $user['id'] ?>" name="id"/>
      <input type="text" value="<?= $user['firstname'] ?>" name="firstname" placeholder="First Name" />
      <input type="text" value="<?= $user['lastname'] ?>" name="lastname" placeholder="Last Name" />
      <select name="userrole" id="">
        <option value="0">Author</option>
        <option value="1">Admin</option>
      </select>
      <div class="form__control">
        <label for="avatar">User Profile Pic</label>
        <input type="file" id="avatar" />
      </div>
      <button type="submit" class="btn" name="submit">Update User</button>
    </form>
  </div>
</section>

<!-- Sign Up Section Starts Here -->

<?php
include './partial/footer.php';
?>