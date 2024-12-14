<?php
include 'partial/header.php';

$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($connection, $query);
?>

<section class="dashboard">
  <?php if (isset($_SESSION['add-category-success'])) : ?>
    <div class="alert__message success container">
      <p>
        <?= $_SESSION['add-category-success'];
        unset($_SESSION['add-category-success']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['add-category'])) : ?>
    <div class="alert__message error container">
      <p>
        <?= $_SESSION['add-category'];
        unset($_SESSION['add-category']);
        ?>
      </p>
    </div>

  <?php elseif (isset($_SESSION['edit-category-success'])) : ?>
    <div class="alert__message success container">
      <p>
        <?= $_SESSION['edit-category-success'];
        unset($_SESSION['edit-category-success']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['edit-category'])) : ?>
    <div class="alert__message error container">
      <p>
        <?= $_SESSION['edit-category'];
        unset($_SESSION['edit-category']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['delete-category-success'])) : ?>
    <div class="alert__message success container">
      <p>
        <?= $_SESSION['delete-category-success'];
        unset($_SESSION['delete-category-success']);
        ?>
      </p>
    </div>
  <?php endif ?>
  <div class="container dashboard__container">
    <button id="show__sidebar-btn" class="sidebar__toggle"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
    <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
    <aside>
      <table>
        <ul>
          <li>
            <a href="add-post.php"><i class="fa fa-clipboard" aria-hidden="true"></i>
              <h5>Add Post </h5>
            </a>
          </li>
          <li>
            <a href="index.php"><i class="fa-solid fa-pencil"></i>
              <h5>Manage Post </h5>
            </a>
          </li>
          <?php if (isset($_SESSION['user_is_admin'])) : ?>
            <li>
              <a href="add-user.php"><i class="fa-solid fa-user-plus"></i>
                <h5>Add Users</h5>
              </a>
            </li>
            <li>
              <a href="manage-users.php"><i class="fa-solid fa-users"></i>
                <h5>Manage User</h5>
              </a>
            </li>
            <li>
              <a href="add-category.php"><i class="fa-solid fa-pen-to-square"></i>
                <h5>Add Categories</h5>
              </a>
            <li>
              <a href="manage-categories.php" class="active"><i class="fa-regular fa-rectangle-list"></i>
                <h5>Manage Categories</h5>
              </a>
            </li>
            </li>
          <?php endif ?>
        </ul>
      </table>
    </aside>
    <main>
      <h2>Manage Categories</h2>
      <?php if (mysqli_num_rows($categories) > 0) : ?>
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
              <tr>
                <td><?= $category['title'] ?></td>
                <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id'] ?>" class="btn sn">Edit</a></td>
                <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id'] ?>" class="btn sn danger">Delete</a></td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      <?php else : ?>
        <div class="alert__message error"><?= "No Categories Found" ?></div>
      <?php endif ?>
    </main>
  </div>
</section>



<?php
include './partial/footer.php';
?>