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
  <link rel="stylesheet" href="./style/login.css" />



  <link rel="icon" type="image/png" href="./assets/images/webElement/favicon.png" />
  <script src="https://kit.fontawesome.com/c554a97971.js" crossorigin="anonymous"></script>
  <title>Create new post</title>
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
        <h2 style="text-align: center">New Post</h2>
        <div class="line-x"></div>

        <div class='form-container'>
          <?php
          require_once("./module/db.php");
          if (isset($_POST["post"])) {
            $title = $db->escape_string($_POST["title"]);
            $category = $db->escape_string($_POST["category"]);
            $tag = $db->escape_string($_POST["tag"]);
            $summary = $db->escape_string($_POST["summary"]);
            $content = $db->escape_string($_POST["content"]);
            $author = $_SESSION["username"];
            $sql = "INSERT INTO `posts`( `post_public_date`, `post_modify_date`, `post_title`, `post_author`, `post_category`, `post_tag`, `post_summary`, `post_status`, `post_content`) VALUES (NOW(), NOW(), '$title', '$author', '$category', '$tag', '$summary', 'public', '$content')";
            $query = $db->query($sql);
            if ($query) {
              echo "<p style='text-align: center; color: #99ffbd;'>Your content has been post. You'll be redirected to dashboard in few seconds</p>
              <script>
               setTimeout(()=>{
                window.location.href = 'dashboard.php';
               }, 3000)
              </script>
              ";
            }
          }
          ?>
          <form action='' method='post'>
            <div class='input__container'>
              <label for='title'>title</label>
              <input type='text' name='title' autocomplete='off' required />
            </div>
            <div class='input__container'>
              <label for='category'>category</label>


              <select class="selectpicker" name="category">
                <option value="general">-- choose category --</option>
                <option value="frontend">frontend</option>
                <option value="backend">backend</option>
                <option value="beginner">beginner</option>
                <option value="programming">programming</option>
                <option value="network">network</option>
                <option value="cyber">cyber</option>
                <option value="security">security</option>
                <option value="javascript">javascript</option>
                <option value="php">php</option>
                <option value="sql">sql</option>

                <option value="ພາສາອັງກິດ">ພາສາອັງກິດ</option>
                <option value="ganeral">ganeral</option>
              </select>


            </div>
            <div class='input__container'>
              <label for='tag'>tag</label>
              <input type='text' name='tag' autocomplete='off' placeholder="EX: tag1, tag2, tag3..." required />
            </div>
            <div class='input__container'>
              <label for='summary'>Description</label>
              <input type='text' name='summary' autocomplete='off' placeholder="content summary" required />
            </div>

            <div class='input__container'>
              <label for='content'>Content</label>
              <textarea id='textarea' name='content' rows='8' cols='8'></textarea>
            </div>

            <div class='input__submit'>
              <input type='submit' value='Post' name='post' id="submit" />
            </div>
          </form>
        </div>
        <?php
        require_once("./module/user.module.php");
        $authorName = $_SESSION["fullname"];
        ?>
        <script src="./plugin/ckeditor/ckeditor.js"></script>

        <script>
          CKEDITOR.replace("textarea");
        </script>
      </div>
    </div>
  </div>

  <?php
  include("./components/footer.php");
  ?>