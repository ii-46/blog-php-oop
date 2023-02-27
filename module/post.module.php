<?php
require_once("./module/db.php");
class Post {
    function search_for($key)
    {
        global $db;
        $key = $db->escape_string($key);
        $query = $db->query("SELECT post_id, post_title, post_summary, post_public_date, post_category, post_tag FROM posts WHERE post_title LIKE '%$key' OR post_summary LIKE '%$key' OR post_content LIKE '%$key' OR post_author LIKE '%$key'");
        if ($query->num_rows != 0) {
            # code...
            while ($row = $db->fatch_assoc($query)) {
                $date = new DateTime($row["post_public_date"]);
                $dateStr = date_format($date, "D, d/m/Y");
                $tags = explode(",", $row["post_tag"]);
                echo "
            <div class='post-item'>
                <div description>
                    <h2>
                        <a href='post.php?id={$row["post_id"]}'>{$row["post_title"]}</a>
                    </h2>
        
                    <p>
                        <a href='post.php?id={$row["post_id"]}'>{$row["post_summary"]}</a>
                    </p>
                </div>
        
                <div categoryandtag>
                  
                    <div class='category'>
                        <p><a href='index.php?category={$row["post_category"]}'>{$row["post_category"]}</a></p>
                    </div>
        
                    <div class='tag'>";
                $maxRander = count($tags) > 3 ? 3 : count($tags);
                for ($i = 0; $i < $maxRander; $i++) {
                    if ($tags[$i]) {
    
                        echo "<span><a href='index.php?tag=" . trim($tags[$i]) . "'>" . trim($tags[$i]) . "</a></span>";
                    }
                }
    
    
                echo "        
                    </div>
                    <p>{$dateStr}</p>
                </div>
            </div>";
            }
        } else {
            echo "  <div class='post-item'><p style='text-align: center;'>found nothing, <a href='index.php'>return to hompage</a></p> </div>";
        }
    }
    function tag($key)
    {
        global $db;
        $key = $db->escape_string($key);
        $query = $db->query("SELECT post_id, post_title, post_summary, post_public_date, post_category, post_tag FROM posts WHERE post_tag LIKE '%$key'");
        if ($query->num_rows != 0) {
            # code...
            while ($row = $db->fatch_assoc($query)) {
                $date = new DateTime($row["post_public_date"]);
                $dateStr = date_format($date, "D, d/m/Y");
                $tags = explode(",", $row["post_tag"]);
                echo "
            <div class='post-item'>
                <div description>
                    <h2>
                        <a href='post.php?id={$row["post_id"]}'>{$row["post_title"]}</a>
                    </h2>
        
                    <p>
                        <a href='post.php?id={$row["post_id"]}'>{$row["post_summary"]}</a>
                    </p>
                </div>
        
                <div categoryandtag>
                  
                    <div class='category'>
                        <p><a href='index.php?category={$row["post_category"]}'>{$row["post_category"]}</a></p>
                    </div>
        
                    <div class='tag'>";
                $maxRander = count($tags) > 3 ? 3 : count($tags);
                for ($i = 0; $i < $maxRander; $i++) {
                    if ($tags[$i]) {
    
                        echo "<span><a href='index.php?tag=" . trim($tags[$i]) . "'>" . trim($tags[$i]) . "</a></span>";
                    }
                }
    
    
                echo "        
                    </div>
                    <p>{$dateStr}</p>
                </div>
            </div>";
            }
        } else {
            echo "  <div class='post-item'><p style='text-align: center;'>found nothing, <a href='index.php'>return to hompage</a></p> </div>";
        }
    }
    function category($key)
    {
        global $db;
        $key = $db->escape_string($key);
        $query = $db->query("SELECT post_id, post_title, post_summary, post_public_date, post_category, post_tag FROM posts WHERE post_category LIKE '%$key'");
        print_r($query);
        if ($query->num_rows != 0) {
            # code...
            while ($row = $db->fatch_assoc($query)) {
                $date = new DateTime($row["post_public_date"]);
                $dateStr = date_format($date, "D, d/m/Y");
                $tags = explode(",", $row["post_tag"]);
                echo "
            <div class='post-item'>
                <div description>
                    <h2>
                        <a href='post.php?id={$row["post_id"]}'>{$row["post_title"]}</a>
                    </h2>
        
                    <p>
                        <a href='post.php?id={$row["post_id"]}'>{$row["post_summary"]}</a>
                    </p>
                </div>
        
                <div categoryandtag>
                  
                    <div class='category'>
                        <p><a href='index.php?category={$row["post_category"]}'>{$row["post_category"]}</a></p>
                    </div>
        
                    <div class='tag'>";
                $maxRander = count($tags) > 3 ? 3 : count($tags);
                for ($i = 0; $i < $maxRander; $i++) {
                    if ($tags[$i]) {
                        echo "<span><a href='index.php?tag=" . trim($tags[$i]) . "'>" . trim($tags[$i]) . "</a></span>";
                    }
                }
    
    
                echo "        
                    </div>
                    <p>{$dateStr}</p>
                </div>
            </div>";
            }
        } else {
            echo "  <div class='post-item'><p style='text-align: center;'>found nothing, <a href='index.php'>return to hompage</a></p> </div>";
        }
    }
    function display_post_lists()
    {
        global $db;
        $query = $db->query('SELECT post_id, post_title, post_summary, post_public_date, post_category, post_tag FROM posts');
        while ($row = $db->fatch_assoc($query)) {
            $date = new DateTime($row["post_public_date"]);
            $dateStr = date_format($date, "D, d/m/Y");
            $tags = explode(",", $row["post_tag"]);
            echo "
        <div class='post-item'>
            <div description>
                <h2>
                    <a href='post.php?id={$row["post_id"]}'>{$row["post_title"]}</a>
                </h2>
    
                <p>
                    <a href='post.php?id={$row["post_id"]}'>{$row["post_summary"]}</a>
                </p>
            </div>
    
            <div categoryandtag>
              
                <div class='category'>
                    <p><a href='index.php?category={$row["post_category"]}'>{$row["post_category"]}</a></p>
                </div>
    
                <div class='tag'>";
            $maxRander = count($tags) > 3 ? 3 : count($tags);
            for ($i = 0; $i < $maxRander; $i++) {
                if ($tags[$i]) {
    
                    echo "<span><a href='index.php?tag=" . trim($tags[$i]) . "'>" . trim($tags[$i]) . "</a></span>";
                }
            }
    
    
            echo "        
                </div>
                <p>{$dateStr}</p>
            </div>
        </div>";
        }
    }
    function display_post_content()
    {
        if (isset($_GET["id"])) {
            global $db;
            $id = $_GET["id"];
            $query = $db->query("SELECT * FROM posts WHERE post_status='public' AND post_id =" . $id);
            if ($query->num_rows > 0) {
                $postVal = $db->fatch_assoc($query);
                $authorVal = $db->fatch_assoc($db->query("SELECT firstname, lastname, bio FROM users WHERE username = '" . $postVal["post_author"] . "'"));
                $publicDate = date_format(new DateTime($postVal["post_public_date"]), "D, d/m/Y");
                $lastMoDate = date_format(new DateTime($postVal["post_modify_date"]), "D, d/m/Y");
                echo "
                    <div class='content'>
                        <div class='main-content'>
                        <div class='caption'>
                            <h1>{$postVal["post_title"]}</h1>
                        </div>
                        {$postVal["post_content"]}
                        </div>
                        <div class='line-x'></div>
                        <div class='comment'>
                            <script src='https://utteranc.es/client.js' repo='ii-46/dev.planet' issue-term='pathname' theme='github-dark' label='ຄວາມຄິດເຫັນ' crossorigin='anonymous' async></script>
                        </div>
                        </div>
                        <div class='sidebar'>
                        <div class='profile'>
                            <h1>{$authorVal["firstname"]} {$authorVal["lastname"]}</h1>
                            <!-- <div>
                                <img
                                src='./assets/images/webElement/me.jpg'
                                alt='writer picture'
                                loading='lazy'
                                />
                            </div> -->
                            <p>
                            {$authorVal["bio"]}
                            </p>
                        </div>
                        <div class='post-detail'>
                            <p>DETAILS</p>
                            <ul>
                            <li>Published {$publicDate}</li>
                            <li>Last modified {$lastMoDate}</li>
                            </ul>
    
                            <p>CATEGORY</p>
                            <ul>
                            <li><a href='index.php?category={$postVal["post_category"]}'>{$postVal["post_category"]}</a></li>
                            </ul>
                            <p>TAGS</p>
                            <div class='tag'>
    
                            ";
    
                if (str_word_count($postVal["post_tag"]) > 0) {
                    $tags = str_contains($postVal["post_tag"], ',') ? explode(",", $postVal["post_tag"]) : $postVal["post_tag"];
                    if (is_array($tags)) {
                        foreach ($tags as $key => $value) {
                            $value = trim($value);
                            echo "<span><ma href='index.php?tag={$value}'>{$value}</a></span>";
                        }
                    } else {
                        echo "<span><ma href='index.php?tag={$tags}'>{$tags}</a></span>";
                    }
                }
    
    
                echo " 
                            </div>
                        </div>
                    </div>
                ";
                return $postVal["post_title"];
            } else {
    
                header("Loacation: index.php");
            }
        } else {
            header("Loacation: index.php");
        }
    }
}
$post = new Post();