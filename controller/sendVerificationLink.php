<?php
/**
 * Created by PhpStorm.
 * User: l.scebba
 * Date: 27/06/2018
 * Time: 12:27
 */

include 'FirebaseController.php';

$firebase = new FirebaseController();
$firebase->sendVerificationLink($_GET["uid"]);

header("Location: " . $ini["url"] . "index.php");