<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 28/06/2018
 * Time: 11:24
 */

if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== true) {
    header("Location: " . $ini["url"] . "index.php");
    exit();
}
