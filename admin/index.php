<?php
include 'partial/header.php';
$current_admin_id = $_SESSION['user-id'];
$query = "SELECT id, title, category_id FROM posts WHERE author_id=$current_admin_id ORDER BY id DESC";
$posts = mysqli_query($connection, $query);
?>
<section class="dashboard">
  <?php if (isset($_SESSION['add-post-success'])) : ?>
    <div class="alert__message success container">
      <p>
        <?= $_SESSION['add-post-success'];
        unset($_SESSION['add-post-success']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['edit-post-success'])) : ?>
    <div class="alert__message success container">
      <p>
        <?= $_SESSION['edit-post-success'];
        unset($_SESSION['edit-post-success']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['edit-post'])) : ?>
    <div class="alert__message error container">
      <p>
        <?= $_SESSION['edit-post'];
        unset($_SESSION['edit-post']);
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['delete-post-success'])) : ?>
    <div class="alert__message success container">
      <p>
        <?= $_SESSION['delete-post-success'];
        unset($_SESSION['delete-post-success']);
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
            <a href="index.php" class="active"><i class="fa-solid fa-pencil"></i>
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
              <a href="manage-categories.php"><i class="fa-regular fa-rectangle-list"></i>
                <h5>Manage Categories</h5>
              </a>
            </li>
          <?php endif ?>
        </ul>
      </table>
    </aside>
    <main>
      <h2>Manage Users</h2>
      <?php if (mysqli_num_rows($posts) > 0) : ?>
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($post = mysqli_fetch_assoc($posts)) : ?>

              <?php
              $category_id = $post['category_id'];
              $category_query = "SELECT title FROM categories WHERE id=$category_id";
              $category_result = mysqli_query($connection, $category_query);
              $category = mysqli_fetch_assoc($category_result);
              ?>
              <tr>
                <td><?= $post['title'] ?></td>
                <td><?= $category['title'] ?></td>
                <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn sn">Edit</a></td>
                <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn sn danger">Delete</a></td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      <?php else : ?>
        <div class="alert__message error"><?= "No posts found" ?></div>
      <?php endif ?>
    </main>
  </div>
</section>

<?php
include './partial/footer.php';
?>