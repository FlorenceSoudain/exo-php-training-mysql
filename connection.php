<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 16/01/2019
 * Time: 14:17
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
