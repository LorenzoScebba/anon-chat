<?php

session_start();
session_unset();
session_destroy();

header("Location: " . $ini["url"] . "index.php");