<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        Anon-Chat
    </a>
    <div class="text-right">
        <?php if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true) { ?>

            <span id="welcomeback">Welcome back
                <?php
                $user = $_SESSION["user"];
                echo($user["displayName"] != null ? $user["displayName"] : "User");
                ?>
            </span>
            <span id="welcomebackStatus" class="mr-2">
                <?php echo " - " . ($user["emailVerified"] == 1 ? "Verified" : "Not verified"); ?>
            </span>
            <a href="account.php" class="btn btn-primary">My Account</a>
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
            Email not verified, click <a onclick="sendVerification()" href="#">here</a> for a verification link
        </div>

        <script>
            function sendVerification() {
                $.ajax({
                    url: "controller/sendVerificationLink.php",
                    data: {
                        uid: "<?php echo $user["uid"]; ?>"
                    },
                    success: function (result) {
                        $(".alert").hide(500);
                    }
                });
            }

            var id = setInterval(function () {
                console.log("Called");
                $.ajax({
                    url: "controller/userVerified.php",
                    data: {
                        uid: "<?php echo $user["uid"]; ?>"
                    },
                    success: function (result) {
                        console.log(result);
                        if (result === "1") {
                            console.log("Clear")
                            $("#welcomebackStatus").text(" - Verified")
                            $(".alert").hide(500);
                            clearInterval(id);
                        }
                    }
                });
            }, 5000);
        </script>

    <?php } ?>

<?php } ?>

<?php if (isset($_SESSION["lastLoginFailed"]) && $_SESSION["lastLoginFailed"] == true) { ?>

    <div class="alert alert-danger" role="alert">
        Failed to log in
    </div>

    <?php $_SESSION["lastLoginFailed"] = false;
} ?>
