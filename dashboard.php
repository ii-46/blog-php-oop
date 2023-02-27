<?php
ob_start();
session_start();
if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/icon/icon.css" />

  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="./style/dashboard.css" />

  <link rel="icon" type="image/png" href="./assets/images/webElement/favicon.png" />
  <script src="https://kit.fontawesome.com/c554a97971.js" crossorigin="anonymous"></script>
  <title>Dashboard</title>
</head>

<body>
  <div class="nav__container">
    <?php
    include("./components/dashboard_nav.php");
    ?>
  </div>

  <div class="dashboard__container">
    <?php
    include("./components/accout_info.php");
    ?>
    <div class="operation">
      <div class="post-manager">
        <h2 style="text-align: center">Manage Your Content</h2>
        <div class="line-x"></div>
        <div class="post-operation">
          <a href="newpost.php" class="new-btn">New Post
            <div class="icon">
              <span class="icon-plus-square-o"></span>
            </div>
          </a>
        </div>
        <div class="list_user-content">
          <?php
          require_once("./module/user.module.php");
          $username = $_SESSION["username"];
          $user->display_user_posts($username);
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php
  include("./components/footer.php");
  ?>