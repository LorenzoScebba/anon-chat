<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 26/06/2018
 * Time: 16:09
 */

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;



class FirebaseController
{
    private $auth;
    private $database;
    /**
     * FirebaseController constructor.
     */
    public function __construct()
    {
        $ini = parse_ini_file(PATHINIFILE.INIFILENAME);
        $serviceAccount = ServiceAccount::fromJsonFile(PATHINIFILE . $ini["firebase-service-account-file"]);
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $this->auth = $firebase->getAuth();
        $this->database = $firebase->getDatabase();
    }

    public function getUserList(){
        return $this->auth->listUsers();
    }

    public function logUserIn($email,$password){
        return $this->auth->verifyPassword($email,$password);
    }

    public function isUserActive($uid){
        if($this->auth->getUser($uid)->metadata->lastLoginAt->diff(new DateTime("now"))->d > 3)
        {
            return false;
        }else{
            return true;
        }
    }

    public function getUserLastActivityInDays($uid){
        return $this->auth->getUser($uid)->metadata->lastLoginAt->diff(new DateTime("now"))->d;
    }

}