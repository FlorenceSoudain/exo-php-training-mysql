<?php
session_start();

if($_SESSION['username'] !== NULL){
    echo "Bonjour " . $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<h1>Liste des randonnées</h1>
<nav><a class="nav" href="login.php">Se connecter</a> <a class="nav" href="create.php">Ajouter</a> <a class="nav" href="logout.php">Se déconnecter</a></nav>
<table>
    <!-- Afficher la liste des randonnées -->
</table>

</body>
</html>

<?php

include 'connection.php';


$sql = "SELECT * FROM hiking WHERE 1";
$result = $connection->query($sql);
echo "<table><tr><th>ID</th><th>Name</th><th>Difficulty</th><th>Distance</th><th>Duration</th><th>Height Difference</th><th>Available</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['id'] . "</td> <td> <a href='update.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td> <td>" . $row['difficulty'] . "</td> <td>" . $row['distance'] . " km </td> <td>" . $row['duration'] . "</td> <td>" . $row['height_difference'] . " m</td>
<td>" . $row['available'] . "</td>
<td><a href='delete.php?id=" . $row['id'] . "'>Supprimer</a> </td></tr>";
}
echo "</table>";

