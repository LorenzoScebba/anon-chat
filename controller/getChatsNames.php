<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 28/06/2018
 * Time: 17:54
 */

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
if(!isset($_SESSION["user"])) die();
$user = $_SESSION["user"];

$chats = $firebase->getChats($user["uid"]);
$uidnames = array();

foreach($chats as $uid => $value){
    $uidnames[$uid] =  $firebase->getUser($uid)->displayName;
}

?>
