<?php
//Check if credentials are valid

include 'connection.php';

$username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
$password = filter_var(($_REQUEST['password']), FILTER_SANITIZE_STRING);

$sql = "SELECT id, username, password FROM user WHERE username = '$username'";
$result = $connection->query($sql);
while ($row = $result->fetch_assoc()) {
    $DBID = $row['id'];
    $DBusername = $row['username'];
    $DBpassword = $row['password'];
}

global $DBusername, $DBpassword;

if (isset($username) && isset($password)) {
    if ($DBusername == $username && $DBpassword == sha1($password)) {
        session_start();

        $_SESSION['id'] = $DBID;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header('Location: read.php');
    }
    else {
        echo "Mauvais identifiant ou mot de passe.";
    }
}