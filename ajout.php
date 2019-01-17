<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 15/01/2019
 * Time: 09:53
 */

session_start();
include 'connection.php';

if($_SESSION['id'] !== NULL){
//récupération de données avec filtre
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$difficulty = filter_var($_POST['difficulty'], FILTER_SANITIZE_STRING);
$distance = filter_var($_POST['distance'], FILTER_SANITIZE_STRING);
$duration = filter_var($_POST['duration'], FILTER_SANITIZE_STRING);
$heightDifference = filter_var($_POST['height_difference'], FILTER_SANITIZE_STRING);
$available = filter_var($_POST['available'], FILTER_SANITIZE_STRING);

//requête préparé
$stmt = $connection -> prepare("INSERT INTO hiking VALUES (?,?,?,?,?,?,?)");
$stmt -> bind_param("issisis", $id,$name, $difficulty, $distance, $duration, $heightDifference, $available);
$stmt -> execute();
echo "La randonnée a été ajoutée avec succès.";
$stmt -> close();

} else {
    echo "Vous n'étes pas connecté";
}