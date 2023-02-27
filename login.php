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
  <title>Login to your accout</title>
</head>

<body>
  <div class="nav__container">
    <nav class="nav">
      <div class="logo">
        <a href="index.php"><span class="text-green">DEV</span><span>.PLANET</span></a>
        <div class="menu">
          <span class="icon-bars" id="openIcon"></span>
          <span class="icon-close display-none" id="closeIcon"></span>
        </div>
      </div>
      <div class="searchbar">
        <form action="" method="get">
          <input type="text" name="serach" placeholder="search" autocomplete="off" />
          <button><span class="icon-search"></span></button>
        </form>
      </div>
      <div class="signup">
        <a href="register.php" class="register">Sign up
          <div class="icon">
            <span class="icon-pencil-square-o"></span>
          </div>
        </a>
      </div>
    </nav>
  </div>
  <div class="login__container">
    <div class="login-form">
      <div class="form__detail">
        <h3>Login to your accout</h3>
      </div>
      <div class="line-x"></div>

      <form action="" method="post">
        <div class="input__container">
          <label for="username">username</label>
          <input type="text" name="username" <?php
                                              session_start();
                                              if (isset($_SESSION["preuser"])) {
                                                echo "value='{$_SESSION["preuser"]}'";
                                              }
                                              ?> autocomplete="off" required />
        </div>
        <div class="input__container">
          <label for="password">password</label>
          <input type="password" name="password" required />
        </div>
        <div class="input__checkbox">
          <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" />
          <p>
            I Agree
            <span style="text-decoration: underline">Terms & Coditions</span>
          </p>
        </div>
        <div class="input__submit">
          <input type="submit" value="Login" name="login" id="submit" disabled />
        </div>
      </form>
      <?php
      require_once("./module/db.php");
      if (isset($_POST["login"])) {
        $username = $db->escape_string($_POST["username"]);
        $password = $db->escape_string($_POST["password"]);
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $db->query($sql);
        if ($result->num_rows == 0) {
          echo '<p style="color: orange; font-size: 12px;">The username or password is incorrect, Please try again</p>';
        } else {
          session_start();
          $val = $db->fatch_assoc($result);
          $_SESSION["user_id"] = $val["user_id"];
          $_SESSION["username"] = $val["username"];
          $_SESSION["fullname"] = $val["firstname"] . " " . $val["lastname"];

          $_SESSION["email"] = $val["email"];
          $_SESSION["bio"] = $val["bio"];
          $_SESSION["work"] = $val["work"];
          $_SESSION["birthdate"] = $val["birthdate"];
          header("Location: ./dashboard.php");
        }
      }
      ?>
      <div class="register-link">
        <p>
          Don't have an accout? <a href="./register.php">Create one now.</a>
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