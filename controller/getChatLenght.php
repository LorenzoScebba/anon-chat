<?php

include 'FirebaseController.php';
include 'checkLoggedIn.php';

$firebase = new FirebaseController();
if (!isset($_SESSION["user"])) die();
if (!isset($_GET["chatid"])) die();
$user = $_SESSION["user"];

$messages = ($firebase->getChat($user["uid"], $_GET["chatid"]));

if ($messages != null) {
    echo sizeof($messages);
} else {
    echo 0;
}