<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
</head>
<body>

<?php

require '../vendor/autoload.php';
use Classes\User;

session_start();

$user = new User;

if (isset($_POST['username_'])&&isset($_POST['password_'])):

    $name = $user->clearInput(($_POST['username_']));
    $password = $user->clearInput(($_POST['password_']));

    if ($name != "" && $password != "") {
        $encryptedPass = $user->encryptPass($password);
        $user->login($name,$encryptedPass);

    }

?>
    <a href="account.php">go to account</a>

<?php else:?>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input name="username_" placeholder="enter username" autofocus required>
        <label for="password">Password:</label>
        <input type="password" name="password_" placeholder="enter password" required>
        <input type="submit" value="Log in">
    </form>
<?php endif;?>
</body>
</html>