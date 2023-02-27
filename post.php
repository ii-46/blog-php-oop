<?php
require_once("./module/post.module.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/icon/icon.css" />

  <link rel="stylesheet" href="./style/style.css" />
  <link rel="icon" type="image/png" href="./assets/images/webElement/favicon.png" />
  <script src="https://kit.fontawesome.com/c554a97971.js" crossorigin="anonymous"></script>
  <title><?php
          if (isset($_GET["id"])) {
            $id = $db->escape_string($_GET["id"]);
            $title = $db->fatch_assoc($db->query("SELECT post_title FROM posts WHERE post_id = $id AND post_status = 'public'"));
            echo $title["post_title"];
          } else {
            echo "Post";
          }

          ?></title>
</head>

<body>
  <?php
  include_once("./components/navbar.php");
  ?>
  <div class="content__container">
    <?php
    $post->display_post_content();
    ?>
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