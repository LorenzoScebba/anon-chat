<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 28/06/2018
 * Time: 17:54
 */

include 'FirebaseController.php';
include 'checkLoggedIn.php';

$firebase = new FirebaseController();
if (!isset($_SESSION["user"])) die();
$user = $_SESSION["user"];

$chats = $firebase->getChats($user["uid"]);
$uidnames = array();

if($chats!=null) {
    foreach ($chats as $uid => $value) {
        $uidnames[$uid] = $firebase->getUser($uid)->displayName;
    }
    uasort($chats,function ($a,$b){
        $v1 = strtotime(end($a)['datetime']['date']);
        $v2 = strtotime(end($b)['datetime']['date']);
        return $v2 - $v1;
    });
}

?>
