<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/icon/icon.css" />

  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="./style/login.css" />

  <link rel="icon" type="image/png" href="./assets/images/webElement/favicon.png" />
  <title>Warning</title>
</head>

<body>
  <div class="nav__container">
    <div class="nav__container">
      <?php
      include("./components/dashboard_nav.php");
      ?>
    </div>
  </div>
  <div class="login__container">
    <div class="login-form">



      <?php

      if (isset($_GET["accout_id"])) {

        echo "
    <div class='form__detail'>
        <br>
        <p style='text-align: center;'>Delete accout</p>
    </div>
      <div class='line-x'></div>
    <form action='' method='post'>
        <div class='input__container'>
            <label for='reason'>ANSWER - Why you want to delete accout?</label>
            <input type='text' name='reason' placeholder='becuase ...' required />
        </div>
        <div class='input__container'>
            <label for='password'>password</label>
            <input type='password' name='password' required />
        </div>
        <div class='input__submit'>
            <input type='submit' value='Delete Accout' name='delete_accout' id='submit' style='background: #e37d7d' />
        </div>
    </form>";
      }
      if (isset($_GET["post_id"])) {

        echo "
    <div class='form__detail'>
        <br>
        <p>To delete post please enter your password again</p>
    </div>
      <div class='line-x'></div>
    <form action='' method='post'>
        <div class='input__container'>
            <label for='password'>password</label>
            <input type='password' name='password' required />
        </div>
        <div class='input__submit'>
            <input type='submit' value='Delete post' name='delete_post' id='submit' style='background: #e37d7d' />
        </div>
    </form>";
      }
      require_once("./module/db.php");
      if (isset($_POST["delete_post"])) {

        $password = $db->escape_string($_POST["password"]);
        $sql = "SELECT * FROM users WHERE password='$password'";
        $result = $db->query($sql);
        if ($result->num_rows == 0) {
          echo '<p style="color: orange; font-size: 12px;">The username or password is incorrect, Please try again</p>';
        } else {
          $id = $_GET["post_id"];

          $db->query("DELETE FROM posts WHERE `posts`.`post_id` = $id");
          echo "<p style='text-align: center; color: #99ffbd;'>Your content has been delete. You'll be redirected to dashboard in few seconds</p>
              <script>
               setTimeout(()=>{
                window.location.href = 'dashboard.php';
               }, 2000)
              </script>
              ";
        }
      }
      if (isset($_POST["delete_accout"])) {

        $reason = $db->escape_string($_POST["reason"]);
        $password = $db->escape_string($_POST["password"]);
        $sql = "SELECT * FROM users WHERE password='$password'";
        $result = $db->query($sql);
        if ($result->num_rows == 0) {
          echo '<p style="color: orange; font-size: 12px;">The username or password is incorrect, Please try again</p>';
        } else {
          $id = $_GET["accout_id"];

          $db->query("DELETE FROM users WHERE `users`.`user_id` = $id");
          echo "<p style='text-align: center; color: #99ffbd;'>Your accoutt has been delete. You'll be redirected to homepage in few seconds</p>
              <script>
               setTimeout(()=>{
                window.location.href = 'logout.php';
               }, 2000)
              </script>
              ";
        }
      }
      ?>
      <div class="register-link">
        <p>
          Need help?<a href="https://wa.me/qr/662WHCMGINO3J1">Contact me in Whatsapp</a>
        </p>
      </div>
    </div>
  </div>

  <footer>
    <div class="copyright">
      <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img loading="lazy" alt="Creative Commons License" style="border-width: 0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /><br /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">All contents in DEV.PLANET</span>
      are licensed under a
      <a rel="license" target="_blank" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons License</a>.
      <div class="line-x"></div>
      <span>Website was made by:</span><a href="http://"> ii-46</a>
    </div>
  </footer>

  <script src="script/javascript/main.js"></script>
</body>

</html>