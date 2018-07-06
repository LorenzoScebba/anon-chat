<?php

include 'FirebaseController.php';

$firebase = new FirebaseController();
if (!isset($_GET["uid"])) die();
if ($firebase->isUserVerified($_GET["uid"])) {
    echo 1;
} else {
    echo 0;
}

if (isset($_SESSION["user"]))
    $_SESSION["user"] = $firebase->getUser($_GET["uid"])->toArray();