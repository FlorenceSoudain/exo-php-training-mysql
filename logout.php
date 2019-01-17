<?php
//Logout 

include 'connection.php';

session_start();
if ($_SESSION['id'] !== NULL) {

    echo "Voulez-vous vous déconnecter, " . $_SESSION['username'] . " ?";

    $logout = filter_var($_REQUEST['button'], FILTER_SANITIZE_URL);
    if ($logout == TRUE) {
        session_destroy();

        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logout</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

<form action="" method="post">
    <div>
        <input type="submit" name="button" value="Se déconnecter">
    </div>
</form>
</body>
</html>

<?php
} else {
    echo "Vous n'étes pas connecté. <a href='login.php'>Vous connecter ?</a>";
}
