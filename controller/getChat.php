<?php

include 'FirebaseController.php';
include 'checkLoggedIn.php'; ?>

<h4 class="my-4 text-center">Chat with <span id="name"><?php echo $_GET["name"] ?></span></h4>
<div class="card">
    <div class="card-body" id="cardbody">

        <?php

        function sortChatbyDate($chat)
        {
            usort($chat, function ($a, $b) {

                $ad = new DateTime($a['datetime']['date']);
                $bd = new DateTime($b['datetime']['date']);

                if ($ad == $bd) {
                    return 0;
                }

                return $ad < $bd ? -1 : 1;
            });
            return $chat;
        }

        $firebase = new FirebaseController();
        if (!isset($_SESSION["user"])) die();
        if (!isset($_GET["chatid"])) die();
        $user = $_SESSION["user"];

        $messages = ($firebase->getChat($user["uid"], $_GET["chatid"]));
        $messageBackup = $messages;
        $messages = sortChatbyDate($messages);


        foreach ($messages as $key => $message) {

            ?>

            <p <?php echo ($message["isSender"] == true ? "class='text-right message'" : "class='message'") ?>><?php echo $message["content"] ?> </p>

        <?php } ?>


    </div>

    <div class="row">
        <div class="col-9 my-2 mx-2"><input type="text" class="form-control" id="sendText"></div>
        <div class="col-2 my-2 mx-2">
            <button id="sendButton" class="btn btn-success" style="width: 100%;" onclick="sendMessage()">Send</button>
        </div>
    </div>

</div>

<script>
    function sendMessage() {
        $.ajax({
            url: "controller/sendMessage.php",
            data: {
                uid: "<?php echo $user["uid"] ?>",
                chatid: "<?php echo $_GET["chatid"] ?>",
                content: $("#sendText").val()
            },
            beforeSend: function () {
                $("#sendButton").prop('disabled', true);
            },
            success: function (result) {
                $("#cardbody").append("<p class=\"text-right\">" + $("#sendText").val() + "</p>");
                $("#sendText").val("");
            },
            error: function (result) {
                $("#chat").html("<p class=\"text-center mt-5\">Error</p>");
            },
            complete: function () {
                $("#sendButton").prop('disabled', false);
            }
        });
    }
</script>

<script>

    var isRefreshing = false;
    var isChecking = false;

    var checkNewMessages = setInterval(function () {
        if (!isChecking) {
            isChecking = true;
            $.ajax({
                url: "controller/getChatLenght.php",
                data: {
                    uid: "<?php echo $user["uid"] ?>",
                    chatid: "<?php echo $_GET["chatid"] ?>"
                },
                success: function (result) {
                    if (parseInt(result) !== parseInt($("p.message").length) && !isRefreshing && parseInt($("p.message").length) > 0) {
                        console.log("refreshing");
                        isRefreshing = true;
                        $.ajax({
                            url: "controller/getChat.php",
                            data: {
                                chatid: "<?php echo $_GET["chatid"] ?>",
                                name: $("#name").html(),
                            },
                            success: function (result) {
                                $("#chat").html(result);

                            },
                            error: function (result) {
                                console.log(result);
                            },
                            complete: function () {
                                isRefreshing = false;
                            },
                        });
                    }
                },
                complete: function () {
                    isChecking = false;
                }
            });
        }
    }, 5000);

</script>