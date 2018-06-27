<?php
/**
 * Created by PhpStorm.
 * User: l.scebba
 * Date: 26/06/2018
 * Time: 15:36
 */

session_start();

define("PATHINIFILE", "C:\\xampp\\cgi-bin\\");
define("INIFILENAME","anonchat-config.ini");

$ini = parse_ini_file(PATHINIFILE.INIFILENAME);
