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

$firebase->startRandomChat($user["uid"]);

?>
