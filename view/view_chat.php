<?php include 'controller/checkLoggedIn.php' ?>
<?php include 'controller/getChatsNames.php' ?>

<main class="container-fluid">
    <div class="row">
        <div class="col-4">
            <h4 class="my-4 text-center">Contacts</h4>
            <?php
            foreach ($chats as $chatId => $chat) {

                ?>
                <div class="card flex-row flex-wrap mb-2 chat-highlightable" onclick="stopTimer();displayChat('<?php echo $chatId ?>','<?php echo $uidnames[$chatId]?>') ;">
                    <div class="card-header border-0">
                        <?php echo date_format(new DateTime(end($chat)["datetime"]["date"]),"Y-m-d H:i") ?>
                    </div>
                    <div class="card-body text-center">
                        <?php echo $uidnames[$chatId]?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-8" id="chat">

        </div>
    </div>

    </div>
</main>

<script>
    function displayChat(chatid,name){
        $.ajax({
            url: "controller/getChat.php",
            data: {
                chatid: chatid,
                name:name,
            },
            beforeSend : function () {
                $("#chat").html("<p class=\"text-center mt-5\">Loading...</p>");
            },
            success: function( result ) {
                $("#chat").html(result);
            },
            error: function (result) {
                alert("error");
                console.log(result);
            }
        });
    }
</script>