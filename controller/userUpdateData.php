<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 28/06/2018
 * Time: 13:09
 */

include 'FirebaseController.php';
include 'checkLoggedIn.php';

$firebase = new FirebaseController();
if (!isset($_POST["nickname"])) die();
if ($_POST["nickname"] == null) die();
if (!isset($_SESSION["user"])) die();
$user = $_SESSION["user"];

$userUpdated = $firebase->updateNickname($user["uid"], $_POST["nickname"]);

$_SESSION["user"] = $userUpdated->toArray();
$_SESSION["userUpdatedData"] = true;
header("Location: " . $ini["url"] . "index.php");