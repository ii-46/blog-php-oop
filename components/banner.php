<div class="banner">
    <h2><?php
        if (isset($_GET["search"])) {
            echo "Search for: \"" . $_GET["search"] . '"';
        } elseif (isset($_GET["tag"])) {
            echo "Tag: \"" . $_GET["tag"] . '"';
        } elseif (isset($_GET["category"])) {
            echo "Category: \"" . $_GET["category"] . '"';
        } else {
            echo "All posts: ";
        }
        ?></h2>
</div>