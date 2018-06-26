<?php

include 'vendor/autoload.php';
include 'model/config.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile($ini["firebase-service-account-file"]);
$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();
$auth = $firebase->getAuth();
$users = $auth->listUsers();
foreach ($users as $user) {
    var_dump($user);
}