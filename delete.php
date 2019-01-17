<?php
/**** Supprimer une randonnée ****/

include 'connection.php';


session_start();

//cette condition empêche les utilisateurs non connecté de supprimer une randonnée de la BDD
if ($_SESSION['id'] !== NULL) {
    echo "Bonjour " . $_SESSION['username'];

    $identifiant = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "DELETE FROM hiking WHERE id='$identifiant'";
    if ($connection->query($sql) === TRUE) {
        header("Location: http://localhost:63342/php-training-mysql/read.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
} else {
    echo "Vous n'étes pas connecté";
}