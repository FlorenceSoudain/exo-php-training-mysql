<?php

include 'connection.php';

session_start();

if($_SESSION['id'] == NULL) {


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

<form action="check_login.php" method="post">
    <div>
        <label for="username">Identifiant</label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
    </div>
    <div>
        <input type="submit" name="button" value="Se connecter">
    </div>
</form>
</body>
</html>
<?php

} else {
    echo "Vous étes déjà connecté";
}