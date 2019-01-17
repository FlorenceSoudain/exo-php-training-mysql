<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 16/01/2019
 * Time: 10:06
 */


session_start();

if($_SESSION['id'] !== NULL) {

    include 'connection.php';

    $identifiant = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM hiking WHERE id = $identifiant";
    $result = $connection->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nom = $row['name'];
        $difficulte = $row['difficulty'];
        $distance = $row['distance'];
        $duration = $row['duration'];
        $denivele = $row['height_difference'];
        $id = $row['id'];
    }

    global $nom, $difficulte, $distance, $duration, $denivele, $id;

    $n = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $diff = filter_var($_POST['difficulty'], FILTER_SANITIZE_STRING);
    $dist = filter_var($_POST['distance'], FILTER_SANITIZE_NUMBER_INT);
    $durat = filter_var($_POST['duration'], FILTER_SANITIZE_STRING);
    $hDiff = filter_var($_POST['height_difference'], FILTER_SANITIZE_NUMBER_INT);
    $available = filter_var($_POST['available'], FILTER_SANITIZE_STRING);

//requête préparée
    $stmt = $connection->prepare("UPDATE hiking SET id = ?,
   `name` = ?,
   `difficulty` = ?,
   `distance` = ?,
   `duration` = ?,
   `height_difference` = ?,
   `available` = ?
   WHERE `id` = $id");
    $stmt->bind_param('issiiis',
        $id,
        $n,
        $diff,
        $dist,
        $durat,
        $hDiff,
        $available);
    $stmt->execute();
    echo "Mise à jour effectué";
    $stmt->close();
} else {
    echo "Vous n'étes pas connecté. <a href='login.php'>Vous connecter ?</a>";
}