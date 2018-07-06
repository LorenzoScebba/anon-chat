<h3 class="my-5 text-center">What is this?</h3>

<main class="container">
    <div class="row">
        <div class="card text-center col-5 mr-auto">
            <div class="card-body">
                <img style="width: 100px"
                     src="img/img_76927.png"
                     alt="Anonymous" class="card-img">
                <hr>
                <h5 class="card-title">Anonymous chat</h5>
                <p class="card-text">We only require your mail to log in, no additional data is required.</p>
            </div>
        </div>
        <div class="card text-center col-5 ml-auto">
            <div class="card-body">
                <img style="width: 100px"
                     src="img/Earth_Globe_Americas_Emoji.png"
                     alt="Earth">
                <hr>
                <h5 class="card-title">Chat with everyone!</h5>
                <p class="card-text">We'll get you in contact with someone around the globe, just start chatting!</p>
            </div>
        </div>
    </div>
    <div class="card text-center my-5">
        <div class="card-body">
            <img style="width: 100px" alt="Start" class="card-img"
                 src="img/black-check-mark-png-md.png">
            <hr>
            <h5 class="card-title">Start now!</h5>
            <?php if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true) { ?>
                <p class="card-text"><a href="chat.php" class="btn-success btn ">Chat</a></p>
            <?php } else { ?>
                <p class="card-text"><a href="register.php">Register</a> or <a href="login.php">Login</a></p>
            <?php } ?>
        </div>
    </div>
</main>