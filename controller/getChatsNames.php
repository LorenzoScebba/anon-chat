<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 28/06/2018
 * Time: 17:54
 */

include 'FirebaseController.php';
include 'checkLoggedIn.php';

function sortChatbyDate($chat){
    usort($chat, function($a, $b) {
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
if(!isset($_SESSION["user"])) die();
$user = $_SESSION["user"];

$chats = $firebase->getChats($user["uid"]);
$uidnames = array();

foreach($chats as $uid => $value){
    $uidnames[$uid] =  $firebase->getUser($uid)->displayName;
}

?>
