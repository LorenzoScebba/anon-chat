<?php

include 'FirebaseController.php';
include 'checkLoggedIn.php';

function sortChatbyDate($chat)
{
    usort($chat, function ($message1, $message2) {

        $message1d = new DateTime($message1['datetime']['date']);
        $message2d = new DateTime($message2['datetime']['date']);

        if ($message1d == $message2d) {
            return 0;
        }

        return $message1d < $message2d ? -1 : 1;
    });
    return $chat;
}

$firebase = new FirebaseController();
if (!isset($_SESSION["user"])) die();
if (!isset($_GET["chatid"])) die();
$user = $_SESSION["user"];

$messages = ($firebase->getChat($user["uid"], $_GET["chatid"]));
$messages = sortChatbyDate($messages);

if($messages != null)
    echo sizeof($messages);
else
    echo 0;