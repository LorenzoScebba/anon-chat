<?php
/**
 * Created by PhpStorm.
 * User: l.scebba
 * Date: 26/06/2018
 * Time: 15:36
 */


if(file_exists('../vendor/autoload.php'))
    include '../vendor/autoload.php';
else
    include 'vendor/autoload.php';

define("PATHINIFILE", "C:\\xampp\\cgi-bin\\");
define("INIFILENAME","anon-config.ini");



$ini = parse_ini_file(PATHINIFILE.INIFILENAME);
session_start();
