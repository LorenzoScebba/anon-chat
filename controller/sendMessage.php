<?php
/**
 * Created by PhpStorm.
 * User: l.scebba
 * Date: 27/06/2018
 * Time: 10:13
 */

include 'FirebaseController.php';
include 'checkLoggedIn.php';

$firebase = new FirebaseController();
if(!isset($_GET["uid"]) || !isset($_GET["chatid"]) || !isset($_GET["content"])) die();
if($_GET["uid"] == "" || $_GET["chatid"] == "" || $_GET["content"] == "") die();
if($_GET["uid"] == null || $_GET["chatid"] == null || $_GET["content"] == null) die();

$firebase->addMessage($_GET["uid"],$_GET["chatid"],true,$_GET["content"]);