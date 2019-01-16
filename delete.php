<?php
/**** Supprimer une randonnée ****/

include 'connection.php';

$identifiant = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM hiking WHERE id='$identifiant'";
if ($connection->query($sql) === TRUE) {
    header("Location: http://localhost:63342/php-training-mysql/read.php");
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}