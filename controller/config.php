<?php
/**
 * Created by PhpStorm.
 * User: l.scebba
 * Date: 26/06/2018
 * Time: 15:36
 */


if (file_exists('../vendor/autoload.php'))
    include '../vendor/autoload.php';
else
    include 'vendor/autoload.php';


define("INIFILENAME", "anon-config.ini");


if(file_exists("C:\\xampp\\cgi-bin\\" . INIFILENAME))
    $ini = parse_ini_file("C:\\xampp\\cgi-bin\\" . INIFILENAME);
else
    $ini = parse_ini_file("/var/www/cgi-bin/" . INIFILENAME);

session_start();