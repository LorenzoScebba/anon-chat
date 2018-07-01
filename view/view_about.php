<h3 class="my-5 text-center">What is this?</h3>

<main class="container">
    <div class="row">
        <div class="card text-center col-5 mr-auto">
            <div class="card-body">
                <img style="width: 100px"
                     src="https://firebasestorage.googleapis.com/v0/b/anon-chat-984be.appspot.com/o/img%2Fimg_76927.png?alt=media&token=3c3a5af1-f75e-4840-8df3-5402b689de45"
                     alt="Anonymous" class="card-img">
                <hr>
                <h5 class="card-title">Anonymous chat</h5>
                <p class="card-text">We only require your mail to log in, no additional data is required.</p>
            </div>
        </div>
        <div class="card text-center col-5 ml-auto">
            <div class="card-body">
                <img style="width: 100px"
                     src="https://firebasestorage.googleapis.com/v0/b/anon-chat-984be.appspot.com/o/img%2FEarth_Globe_Americas_Emoji.png?alt=media&token=dbe9dd50-7c76-492d-82d2-912e16d6a85a"
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
                 src="https://firebasestorage.googleapis.com/v0/b/anon-chat-984be.appspot.com/o/img%2Fblack-check-mark-png-md.png?alt=media&token=1cd39ac7-a581-4226-817a-a9a00194670c">
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