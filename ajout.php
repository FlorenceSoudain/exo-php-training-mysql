<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 15/01/2019
 * Time: 09:53
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reunion_island";

$connection = new mysqli($servername, $username, $password);

if ($connection->connect_error) {
    die("connection failed : " . $connection->connect_error);
} else {
    $connection->select_db($dbname);
}


//récupération de données avec filtre
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$difficulty = $_POST['difficulty'];
$distance = filter_var($_POST['distance'], FILTER_SANITIZE_STRING);
$duration = filter_var($_POST['duration'], FILTER_SANITIZE_STRING);
$heightDifference = filter_var($_POST['height_difference'], FILTER_SANITIZE_STRING);

//requête préparé
$stmt = $connection -> prepare("INSERT INTO hiking VALUES (?,?,?,?,?,?)");
$stmt -> bind_param("issisi", $id,$name, $difficulty, $distance, $duration, $heightDifference);
$stmt -> execute();
echo "La randonnée a été ajoutée avec succès.";
$stmt -> close();

