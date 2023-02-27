<div class="accout-card">
    <div class="accout-detail">
        <h2>Your Accout</h2>
        <br />
        <p><b>Username</b></p>
        <p><?php echo $_SESSION["username"]; ?></p>
        <br />
        <p><b>fullname</b></p>
        <p><?php echo $_SESSION["fullname"]; ?></p>
        <br />

        <p><b>Email</b></p>
        <p><?php echo $_SESSION["email"] ?></p>
        <br />

        <p><b>Work</b></p>
        <p><?php echo $_SESSION["work"] ?></p>
    </div>
    <div class="accout-operation">
        <a href="delete.php?accout_id=<?php echo $_SESSION["user_id"] ?>">Delete Accout</a>
    </div>
</div>