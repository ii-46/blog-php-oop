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
                <input type="text" name="search" placeholder="search" autocomplete="off" />
                <button><span class="icon-search"></span></button>
            </form>
        </div>
        <div class="signup">
            <?php
            session_start();
            if (isset($_SESSION["user_id"])) {
                echo "
                <a href='dashboard.php' class='register'>Dashboard
                <div class='icon'>
                    <span class='icon-pencil-square-o'></span>
                </div>
            </a>
                <a href='logout.php' class='login'>Logout</a>";
            } else {
                echo "<a href='login.php' class='login'>Login</a>
            <a href='register.php' class='register'>Sign up
                <div class='icon'>
                    <span class='icon-pencil-square-o'></span>
                </div>
            </a>";
            }
            ?>
        </div>
    </nav>
</div>