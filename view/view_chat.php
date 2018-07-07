<?php include 'controller/checkLoggedIn.php' ?>
<?php include 'controller/getChatsNames.php' ?>

<main class="container-fluid">
    <div class="row">
        <div class="col-4">
            <h4 class="my-4 text-center">Contacts</h4>
            <?php
            if ($chats != null) {
                foreach ($chats as $chatId => $chat) {

                    ?>
                    <div class="card flex-row flex-wrap mb-2 chat-highlightable"
                         onclick="displayChat('<?php echo $chatId ?>','<?php echo $uidnames[$chatId] ?>') ;stopTimer();">
                        <div class="card-header border-0">
                            <?php echo date_format(new DateTime(end($chat)["datetime"]["date"]), "Y-m-d H:i") ?>
                        </div>
                        <div class="card-body text-center">
                            <?php echo $uidnames[$chatId] ?>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center'>No chats present, start a random chat with someone!</p>";
            }
            ?>
            <div class="my-5 text-center">
                <button id="startChat" class="btn btn-primary" onclick="startRandomChat();">Start a random chat!
                </button>
            </div>
        </div>
        <div class="col-8" id="chat">

        </div>
    </div>

</main>

<script>

    var displayChatInProgress = false;

    function startRandomChat() {
        $.ajax({
            url: "controller/startRandomChat.php",
            beforeSend: function () {
                $("#startChat")
                    .prop("disabled", true)
                    .text("Starting a random chat...");
            },
            success: function (result) {
                if(!$.trim(result)){
                    $("#startChat")
                        .prop("disabled", false)
                        .text("Start a random chat!");
                    alert("No users found to start a chat with :(");
                }else {
                    location.reload();
                }
            },
            error: function (result) {
                console.log(result);
                alert("Something went wrong :(");
            }
        });
    }

    function displayChat(chatid, name) {
        if ($("#name").text() !== name && !displayChatInProgress) {
            displayChatInProgress = true;
            $.ajax({
                url: "controller/getChat.php",
                data: {
                    chatid: chatid,
                    name: name,
                },
                beforeSend: function () {
                    $("#chat").html("<p class=\"text-center mt-5\">Loading...</p>");
                },
                success: function (result) {
                    $("#chat").html(result);
                },
                error: function (result) {
                    alert("error");
                    console.log(result);
                },
                complete: function () {
                    displayChatInProgress = false;
                }
            });
        }
    }
</script>