<?php
/**
 * Created by PhpStorm.
 * User: Lorenzo
 * Date: 09/07/2018
 * Time: 10:47
 */

include_once 'FirebaseController.php';

$firebase = new FirebaseController();
if (!isset($_SESSION["user"])) die();
if (!isset($_GET["chatid"])) die();
$user = $_SESSION["user"];

$messages = ($firebase->getChat($user["uid"], $_GET["chatid"]));
if ($messages != null) {
    uasort($messages, function ($message1, $message2) {

        $message1d = new DateTime($message1['datetime']['date']);
        $message2d = new DateTime($message2['datetime']['date']);

        if ($message1d == $message2d) {
            return 0;
        }

        return $message1d < $message2d ? -1 : 1;
    });
} else {
    echo "<script>location.reload()</script>";
    exit;
}


foreach ($messages as $key => $message) {
    ?>

    <p id="<?php echo $key ?>" <?php echo($message["isSender"] == true ? "class='text-right message'" : "class='message'") ?>><?php echo($message["content"] != null ? $message["content"] : "Error fetching content") ?>
        <?php if ($message["isSender"] == true) { ?>
            <a href="#" onclick="deleteMessage('<?php echo $_GET["chatid"] ?>','<?php echo $key ?>')">X</a>
        <?php } ?>
    </p>
<?php } ?>