<?php
require '../vendor/autoload.php';
use Classes\User;

session_start();
if(!isset($_SESSION['username'])){header("location:index.php");}
echo "Hello ".$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>

<body>
/*TODO: logout in more oop way*/
<a href="Logout.php"> Log out! </a>
<?php
$user = new User;

$id = $user->getUserId($_SESSION['username']);
$accountList = $user->getAccountList($id);
$loginAttemptList = $user->getLoginAttemptList();


?>
</body>
</html>