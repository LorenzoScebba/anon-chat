<?php
/**
 * Created by PhpStorm.
 * User: l.scebba
 * Date: 27/06/2018
 * Time: 10:13
 */

include 'FirebaseController.php';

$firebase = new FirebaseController();
    if(!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["nickname"])) die();
    if($_POST["email"] == null || $_POST["password"] == null || $_POST["nickname"] == null) die();
if($_POST["email"] == "" || $_POST["password"] == "" || $_POST["nickname"] == "") die();

$user = $firebase->registerNewUser($_POST["email"],$_POST["password"],$_POST["nickname"]);

$_SESSION["user"] = $user->toArray();
$_SESSION["isLoggedIn"] = true;

header("Location: " . $ini["url"] . "index.php");