<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<h1>Liste des randonnées</h1>
<table>
    <!-- Afficher la liste des randonnées -->
</table>
</body>
</html>

<?php

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


$sql = "SELECT * FROM hiking WHERE 1";
$result = $connection->query($sql);
echo "<table><tr><th>ID</th><th>Name</th><th>Difficulty</th><th>Distance</th><th>Duration</th><th>Height Difference</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['id'] . "</td> <td> <a href='update.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td> <td>" . $row['difficulty'] . "</td> <td>" . $row['distance'] . " km </td> <td>" . $row['duration'] . "</td> <td>" . $row['height_difference'] . " m</td></tr>";
}
echo "</table>";

