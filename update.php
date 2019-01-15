<?php
session_start();
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

$identifiant = $_GET['id'];

$sql = "SELECT * FROM hiking WHERE id = $identifiant";
$result = $connection -> query($sql);
while($row = $result -> fetch_assoc()){
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

$sql = 'UPDATE hiking set name = "$n", difficulty = "$diff", distance = "$dist", height_difference = "$hDiff"  WHERE id = "$id"';
if ($connection -> query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $nom ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
                <option value="<?php echo $difficulte ?>"><?php echo $difficulte ?></option>
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>

			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $distance ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="text" name="duration" value="<?php echo $duration ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $denivele ?>">
		</div>
		<button type="button" name="button">Envoyer</button>
	</form>
</body>
</html>

<?php

