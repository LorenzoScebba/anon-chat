<?php
/**
 * Created by PhpStorm.
 * User: l.scebba
 * Date: 27/06/2018
 * Time: 10:13
 */

include 'FirebaseController.php';

$firebase = new FirebaseController();
if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["nickname"])) die();
if ($_POST["email"] == null || $_POST["password"] == null || $_POST["nickname"] == null) die();
if ($_POST["email"] == "" || $_POST["password"] == "" || $_POST["nickname"] == "") die();

$email = $_POST["email"];
$password = $_POST["password"];
$nickname = $_POST["nickname"];

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("(.{6,})", $password)) {
    $_SESSION["registerFailed"] = true;
    header("Location: " . $ini["url"] . "index.php");
    exit;
}

$user = $firebase->registerNewUser($email, $password, $nickname);

$_SESSION["user"] = $user->toArray();
$_SESSION["isLoggedIn"] = true;

header("Location: " . $ini["url"] . "index.php");