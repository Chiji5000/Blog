<?php
include 'partials/header.php';

$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
unset($_SESSION['signup-data']);
?>


<!-- Sign Up Section Starts Here -->

<section class="form__section">
  <div class="container form_section-container">
    <h2>Sign Up</h2>
    <?php if (isset($_SESSION['signup'])) : ?>
      <div class="alert__message error">
        <p>
          <?= $_SESSION['signup'];
          unset($_SESSION['signup']);
          ?>
        </p>
      </div>
    <?php endif ?>
    <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
      <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name" />
      <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name" />
      <input type="text" name="username" value="<?= $username ?>" placeholder="Username" />
      <input type="email" name="email" value="<?= $email ?>" placeholder="@email.com" />
      <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create password" />
      <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm password" />
      <div class="form__control">
        <label for="avatar">Profile Pic</label>
        <input type="file" name="avatar" id="avatar" />
      </div>
      <button type="submit" name="submit" class="btn">Sign Up</button>
      <small>Already have an account? <a href="signin.php"> Sign In</a></small>
    </form>
  </div>
</section>

<!-- Sign Up Section Starts Here -->

<?php
include './partials/footer.php';
?>