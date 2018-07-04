<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 04/07/2018
 * Time: 19:27
 */

include 'FirebaseController.php';
include 'checkLoggedIn.php';

$firebase = new FirebaseController();
if (!isset($_SESSION["user"])) die();
if (!isset($_GET["with"])) die();
if (!isset($_GET["messageId"])) die();

$with = $_GET["with"];
$messageId = $_GET["messageId"];
$user = $_SESSION["user"];

$firebase->deleteMessage($user["uid"],$with,$messageId);