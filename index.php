<?php
require_once("./module/post.module.php");
?>
<!DOCTYPE html>
<html lang="lo">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/icon/icon.css" />

    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="./style/post.css" />
    <link rel="icon" type="./image/png" href="./assets/images/webElement/favicon.png" />
    <script src="https://kit.fontawesome.com/c554a97971.js" crossorigin="anonymous"></script>
    <title><?php
            if (isset($_GET["search"])) {
                echo 'Search for: "' . $_GET["search"] . '"';
            } elseif (isset($_GET["tag"])) {
                echo 'tag for: "' . $_GET["tag"] . '"';
            } elseif (isset($_GET["category"])) {
                echo 'category for: "' . $_GET["category"] . '"';
            } else {
                echo "Home";
            }

            ?></title>
</head>

<body>
    <?php

    include_once("./components/navbar.php");
    include_once("./components/banner.php");
    ?>
    <div class="content__container">

        <div class="content">
            <div class="post-items">
                <?php
                if (isset($_GET["search"])) {
                    $post->search_for($_GET["search"]);
                } elseif (isset($_GET["tag"])) {
                    $post->tag($_GET["tag"]);
                } elseif (isset($_GET["category"])) {
                    $post->category($_GET["category"]);
                } else {
                    $post->display_post_lists();
                }
                ?>
            </div>
        </div>
        <div class="sidebar">
            <div class="bg-card">
                <div class="category fs-12">
                    <h3>Category:</h3>

                    <p class="ind-5"><a href="index.php?category=ganeral">general</a></p>
                    <p class="ind-5"><a href="index.php?category=frontend">frontend</a></p>
                    <p class="ind-5"><a href="index.php?category=backend">backend</a></p>
                    <p class="ind-5"><a href="index.php?category=beginner">beginner</a></p>
                    <p class="ind-5"><a href="index.php?category=programming">programming</a></p>
                    <p class="ind-5"><a href="index.php?category=network">network</a></p>
                    <p class="ind-5"><a href="index.php?category=cyber">cyber</a></p>
                    <p class="ind-5"><a href="index.php?category=security">security</a></p>
                    <p class="ind-5"><a href="index.php?category=javascript">javascript</a></p>
                    <p class="ind-5"><a href="index.php?category=php">php</a></p>
                    <p class="ind-5"><a href="index.php?category=sql">sql</a></p>

                </div>
            </div>
            <div class="bg-card fs-12">
                <h3 class="mgb-5">Tag:</h3>

                <div class="tag">
                    <span><a href="index.php?tag=javascript">javascript</a></span>
                    <span><a href="index.php?tag=css">css</a></span>
                    <span><a href="index.php?tag=html">html</a></span>
                    <span><a href="index.php?tag=python">python</a></span>
                    <span><a href="index.php?tag=sql">sql</a></span>
                    <span><a href="index.php?tag=programming">programming</a></span>
                    <span><a href="index.php?tag=design">design</a></span>

                </div>
            </div>
        </div>
    </div>
    <?php include_once("./components/footer.php"); ?>