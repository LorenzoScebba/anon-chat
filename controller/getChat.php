<?php

include 'FirebaseController.php';
include 'checkLoggedIn.php'; ?>

<h4 class="my-4 text-center">Chat with <span
            id="name"><?php echo($_GET["name"] != null ? $_GET["name"] : "<s>Error fetching name</s>") ?></span></h4>
<div class="card">
    <div class="card-body" id="cardbody">
        <?php include 'getChatMessages.php' ?>
    </div>

    <div class="row">
        <?php include 'getChatButtons.php' ?>
    </div>
</div>

<script>

    var isRefreshing = false;
    var isChecking = false;

    function deleteMessage(withUser, messageId) {
        $.ajax({
            url: "controller/deleteMessage.php",
            data: {
                with: withUser,
                messageId: messageId
            },
            beforeSend: function () {
                console.log($("#" + messageId).text());
                $("#" + messageId).remove();
                if (parseInt($("p.message").length) === 0) {
                    location.reload();
                }
            },
            error: function (result) {
                alert("Error deleting message");
            }
        });
    }

    function handleKeyPress(event) {
        if (event.keyCode === 13) {
            sendMessage();
        }
    }

    function sendMessage() {
        $.ajax({
            url: "controller/sendMessage.php",
            data: {
                chatid: "<?php echo($_GET["chatid"] != null ? $_GET["chatid"] : "") ?>",
                content: $("#sendText").val()
            },
            beforeSend: function () {
                $("#sendButton").prop('disabled', true);
            },
            success: function (result) {
                $("#cardbody").append("<p class=\"text-right\">" + $("#sendText").val() + " <a href='#' onclick='alert('Not ready yet')'>X</a>" + "</p>");
                $("#sendText").val("");
            },
            error: function (result) {
                $("#chat").html("<p class=\"text-center mt-5\">Error</p>");
            },
            complete: function () {
                $("#sendButton").prop('disabled', false);
                $("#sendText").focus();
            }
        });
    }

    var checkNewMessages = setInterval(function () {
        if (!isChecking) {
            isChecking = true;
            $.ajax({
                url: "controller/getChatLenght.php",
                data: {
                    chatid: "<?php echo($_GET["chatid"] != null ? $_GET["chatid"] : "") ?>",
                },
                success: function (result) {
                    if (parseInt(result) !== parseInt($("p.message").length) && !isRefreshing) {

                        if(parseInt($("p.message").length) === 0){
                            location.reload();
                        }

                        isRefreshing = true;
                        $.ajax({
                            url: "controller/getChatMessages.php",
                            data: {
                                chatid: "<?php echo $_GET["chatid"] ?>",
                                name: $("#name").html(),
                            },
                            success: function (result) {
                                $("#cardbody").html(result);

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

    function stopTimer() {
        clearInterval(checkNewMessages);
    }

</script>