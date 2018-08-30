<?php
namespace Classes;

use Config\Bootstrap;
use PDO;


class User
{
    //TODO: should I declare Bootstrap in __construct? if yes, how to do this to still have access to PDO functions?

    public function login($name, $password)
    {
        if (!empty($name) && !empty($password)) {
            $db = new Bootstrap;
            $query = $db->query(
                "SELECT * FROM user WHERE username='".$name."' AND password='".$password.
                "';INSERT INTO `test`.`attempt` (`userId`, `time`) VALUES ('1', now())");

            $count = count($query->fetchAll());
            if ($count == 1) {
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $_POST['username_'];
                header("location:account.php");

            } else {
                echo "Incorrect credentials";
            }
        }
        else {
            die('Data not passed');
        }

    }

    public function encryptPass($password)
    {
        return md5("FOaflFaD".$password);
    }

    public function clearInput($data)
    {
        if(!empty($data)){
            $data = trim(strip_tags(stripcslashes($data)));
            return $data;
        }
    }

    //TODO: connect 'delete' button to js function
    public function getAccountList($userId)
    {
        $db = new Bootstrap;
        $statement = $db->query("SELECT * FROM account WHERE userId='".$userId."'");
        echo "<table id=\"account-list\">
                <tr>
                    <th>Account</th> 
                  </tr>";
        while ($account = $statement->fetch(PDO::FETCH_OBJ)) {

            echo "<tr><td>".$account->name."</td><td><button>delete</button onclick=\"deleteAccount('{$account->id}')\"></td>";
        }
        echo "</table>";

    }

    //TODO: I am not sure if "create a new table for login attempts and display last 5 on the welcome page" refers to all 5 attempts or this users attempts
    public function getLoginAttemptList()
    {
        $db = new Bootstrap;
        $statement = $db->query("SELECT * FROM test.attempt ORDER BY id desc LIMIT 5");
        echo "<table>
                <tr>
                    <th>Login id</th>
                    <th>Login time</th> 
                  </tr>";
        while ($attempt = $statement->fetch(PDO::FETCH_OBJ)) {

            echo "<tr><td>".$attempt->userId."</td><td>".$attempt->time."</td>";
        }
        echo "</table>";

    }

    public function getUserId($userName)
    {
        $db = new Bootstrap;
        $statement = $db->query("SELECT id FROM user WHERE username='".$userName."'");
        while ($user = $statement->fetch(PDO::FETCH_OBJ)){
            $userId = $user->id;
            return $userId;
        }
    }

}