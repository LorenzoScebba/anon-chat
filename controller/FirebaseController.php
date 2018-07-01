<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 26/06/2018
 * Time: 16:09
 */

include_once 'config.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;

class FirebaseController
{
    private $auth;
    private $database;

    /**
     * FirebaseController constructor.
     */
    public function __construct()
    {
        $ini = parse_ini_file(PATHINIFILE . INIFILENAME);
        $serviceAccount = ServiceAccount::fromJsonFile(PATHINIFILE . $ini["firebase-service-account-file"]);
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $this->auth = $firebase->getAuth();
        $this->database = $firebase->getDatabase();
    }

    public function getUserList()
    {
        return $this->auth->listUsers();
    }

    public function getUser($uid)
    {
        return $this->auth->getUser($uid);
    }

    public function logUserIn($email, $password)
    {
        try {
            $user = $this->auth->verifyPassword($email, $password);
        } catch (Exception $ex) {
            $user = null;
        }
        return $user;
    }

    public function isUserActive($uid)
    {
        if ($this->auth->getUser($uid)->metadata->lastLoginAt->diff(new DateTime("now"))->d > 3) {
            return false;
        }
        return true;
    }

    public function getUserLastActivityInDays($uid)
    {
        return $this->auth->getUser($uid)->metadata->lastLoginAt->diff(new DateTime("now"))->d;
    }

    public function registerNewUser($email, $password, $nickname)
    {
        $userProperties = [
            'email' => $email,
            'displayName' => $nickname,
            'emailVerified' => false,
            'password' => $password,
            'disabled' => false,
        ];
        $user = $this->auth->createUser($userProperties);
        $this->auth->sendEmailVerification($user->uid);
        return $user;
    }

    public function sendVerificationLink($uid)
    {
        $this->auth->sendEmailVerification($uid);
    }

    public function isUserVerified($uid)
    {
        return $this->auth->getUser($uid)->emailVerified;
    }

    public function updateData($uid, $nickname, $password)
    {
        $userProperties = [
            'displayName' => $nickname,
            'password' => $password,
        ];
        $user = $this->auth->updateUser($uid, $userProperties);
        return $user;
    }

    public function getChats($uid)
    {
        $chats = $this->database->getReference("messages/$uid/")
            ->getSnapshot()
            ->getValue();

        return ($chats);

    }

    public function getChat($uid,$with)
    {
        $chats = $this->database->getReference("messages/$uid/")
            ->getSnapshot()
            ->getValue();

        return $chats[$with];

    }

    public function addMessage($uid,$with,$isSender,$content)
    {
        $this->database->getReference('messages/' . "$uid/$with/" . uniqid())
            ->set([
                'datetime' => new DateTime("now"),
                'content' => $content,
                'isSender' => $isSender
            ]);

        $this->database->getReference('messages/' . "$with/$uid/" . uniqid())
            ->set([
                'datetime' => new DateTime("now"),
                'content' => $content,
                'isSender' => !$isSender
            ]);
    }
}

