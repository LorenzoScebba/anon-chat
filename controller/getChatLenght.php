<?php

include 'FirebaseController.php';
include 'checkLoggedIn.php';

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
$messages = sortChatbyDate($messages);


echo sizeof($messages);