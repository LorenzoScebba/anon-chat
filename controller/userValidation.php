<?php
/**
 * Created by PhpStorm.
 * User: l.scebba
 * Date: 27/06/2018
 * Time: 10:13
 */

include 'FirebaseController.php';

$firebase = new FirebaseController();
if(!isset($_POST["email"]) || !isset($_POST["password"])) die();
$user = $firebase->logUserIn($_POST["email"],$_POST["password"]);
if($user !== null){
    $_SESSION["isLoggedIn"] = true;
    $_SESSION["user"] = $user->toArray();
}
header("Location: " . $ini["url"] . "index.php");