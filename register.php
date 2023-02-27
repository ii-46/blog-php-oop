<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/icon/icon.css" />

  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="./style/login.css" />

  <link rel="icon" type="image/png" href="./assets/images/webElement/favicon.png" />
  <title>Create accout</title>
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
        <a href="login.php" class="register">login
        </a>
      </div>
    </nav>
  </div>
  <div class="login__container">
    <div class="login-form">
      <?php
      require_once("./module/db.php");
      if (isset($_POST["register"])) {
        $username = $db->escape_string($_POST["username"]);
        // check if username exists
        $results = $db->query("SELECT username FROM users WHERE username = '$username'");
        if ($results->num_rows != 0) {
          echo " <p style='text-align: center; color: #ff8698;'>This Username already exist please try another one</p>";
        } else {
          // check if email exists
          $email = $db->escape_string($_POST["email"]);
          $results = $db->query("SELECT username FROM users WHERE email = '$email'");
          if ($results->num_rows != 0) {
            echo "<p style='text-align: center; color: #ff8698;'>This Email already exist please try another one</p>";
          } else {
            // add user to tb_user
            $firstname = $db->escape_string($_POST["firstname"]);
            $lastname = $db->escape_string($_POST["lastname"]);
            $password = $db->escape_string($_POST["password"]);
            $bio = ($db->escape_string($_POST["bio"]) == "") ? NULL : $db->escape_string($_POST["bio"]);
            $work = ($db->escape_string($_POST["work"]) == "") ? NULL : $db->escape_string($_POST["work"]);
            $sql = "INSERT INTO `users` (`username`, `firstname`, `lastname`, `email`, `password`, `work`, `bio`) VALUES ('$username', '$firstname', '$lastname', '$email', '$password', '$work', '$bio')";
            $query = $db->query($sql);
            if ($query) {
              echo "<p style='text-align: center; color: #99ffbd;'>Your account has been created. You will be redirected to login page in few seconds</p>
              <script>
               setTimeout(()=>{
                window.location.href = 'login.php';
               }, 3000)
              </script>
              ";
              session_start();
              $_SESSION["preuser"] = $username;
            }
          }
        }
      }
      ?>




      <!-- <p style='text-align: center; color: #99ffbd;'>Your account has been created. You will be redirected to login page in few seconds</p>
     
      <p style='text-align: center; color: #ff8698;'>This Email already exist please try another one</p> -->
      <div class="form__detail">
        <h3>Create an Accout</h3>
      </div>
      <div class="line-x"></div>
      <form action="" method="post">
        <div class="input__container">
          <label for="first name">first name</label>
          <input type="text" name="firstname" autocomplete="off" placeholder="your firstname" required />
        </div>
        <div class="input__container">
          <label for="last name">last name</label>
          <input type="text" name="lastname" autocomplete="off" placeholder="your lastname" required />
        </div>
        <div class="input__container">
          <label for="username">username</label>
          <input type="text" name="username" autocomplete="off" placeholder="this use for login" required />
        </div>
        <div class="input__container">
          <label for="email">email</label>
          <input type="text" name="email" autocomplete="off" placeholder="your email" required />
        </div>
        <div class="input__container">
          <label for="work">Work - optional</label>
          <input type="text" name="work" placeholder="EX: student, teacher, profassprofessor..." />
        </div>
        <div class="input__container">
          <label for="bio">A Little Thing About You - optional</label>
          <input type="text" name="bio" placeholder="EX: I'm always learning, Homework is not my problem..." />
        </div>
        <div class="input__container">
          <label for="password">password</label>
          <input type="password" name="password" placeholder="your password" id="password" required />
        </div>
        <div class="input__container">
          <label for="confirm password">Confirm password</label>
          <input type="password" placeholder="Confirm Password" id="confirm_password" required />
        </div>
        <div class="input__checkbox">
          <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" />
          <p>
            I Agree
            <span style="text-decoration: underline">Terms & Coditions</span>
          </p>
        </div>
        <div class="input__submit">
          <input type="submit" name="register" value="Create accout" id="submit" disabled />
        </div>
      </form>
      <div class="register-link">
        <p>Already have accout? <a href="./login.php"> login here</a></p>
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
  <script>
    function disableSubmit() {
      document.getElementById("submit").disabled = true;
    }

    function activateButton(element) {
      if (element.checked) {
        document.getElementById("submit").disabled = false;
      } else {
        document.getElementById("submit").disabled = true;
      }
    }
    let password = document.getElementById("password"),
      confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity("");
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>
</body>

</html>