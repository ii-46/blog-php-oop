<?php
require_once("./module/db.php");
class User {
    function display_user_posts($author)
    {
        global $db;
        $author = $db->escape_string($author);
        $sql = "SELECT post_id, post_title, post_modify_date, post_status FROM posts WHERE post_author ='$author'";
        $result = $db->query($sql);
        if ($result->num_rows == 0) {
            echo "<p style='color: var(--primary); font-size: 14px; text-align: center;'>You don't have any post. click \"new post\" above to create post</p>";
        } else {
    
            while ($val = $db->fatch_assoc($result)) {
    
                echo "
            <div class='user-content'>
                <h3>{$val["post_title"]}</h3>
                <div>
                    <div>
                        <span>{$val["post_modify_date"]}</span>
                        <span> • </span>
                        <span>{$val["post_status"]}</span>
                    </div>
                    <div>
                        <a href='editpost.php?post_id={$val["post_id"]}' class='register'>EDIT
                            <div class='icon'>
                                <span class='icon-pencil-square-o'></span>
                            </div>
                        </a>
                        &nbsp;
                        <a href='delete.php?post_id={$val["post_id"]}' class='delete-btn'>Delete
                <span class='icon-warning'></span>
                           
                        </a>
                    </div>
                </div>
            </div>";
            }
        }
    }
}
$user = new User();