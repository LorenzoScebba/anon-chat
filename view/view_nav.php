<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        Anon-Chat
    </a>
    <div class="text-right">
        <?php if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true) { ?>

            <span class="mx-2">Welcome back
                <?php
                $user = $_SESSION["user"];
                echo($user["displayName"] != null ? $user["displayName"] : "User");
                echo " - " . ($user["emailVerified"] == 1 ? "Verified" : "Not verified");

                ?>
    </span>
            <a href="logout.php" class="btn btn-danger">Logout</a>

        <?php } else { ?>

            <a href="login.php" class="mx-2">Login</a>
            <a href="register.php" class="btn btn-primary">Register</a>

        <?php } ?>
    </div>
</nav>


<?php if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true) { ?>

    <?php if ($user["emailVerified"] == 0) { ?>

        <div class="alert alert-danger" role="alert">
            Email not verified, click <a onclick="sendVerification()" href="#" >here</a> for a verification link
        </div>

    <?php } ?>

<?php } ?>