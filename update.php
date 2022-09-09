<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<?php

if (isset($_GET['id'])) {
	
include 'dbConnect.php';

// On récupère tout le contenu de la table
$sqlQuery = 'SELECT * FROM hiking WHERE id='.$_GET['id'];
$GetHiking = $db->prepare($sqlQuery);
$GetHiking->execute();
$data = $GetHiking->fetchAll();
}
?>

<body>
	<a href="/Randon-e/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>	
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $data[0][name]; ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option selected="selected"><?php echo $data[0][difficulty]; ?></option>
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value=<?php echo $data[0][distance]; ?>>
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value=<?php echo $data[0][duration]; ?>>
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value=<?php echo $data[0][height_difference]; ?>>
		</div>
		<div>
			<label for="available">Available</label>
			<input type="text" name="available" value=<?php echo $data[0][available]; ?>>
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>

<?php

if (isset($_POST['name']) AND
isset($_POST['difficulty']) AND
isset($_POST['distance']) AND
isset($_POST['duration']) AND
isset($_POST['height_difference']) AND
isset($_POST['available'])) {

$name = $_POST['name'];
$difficulty = $_POST['difficulty'];
$distance = $_POST['distance'];
$duration = $_POST['duration'];
$height_difference = $_POST['height_difference'];
$available = $_POST['available'];

try {
	$request = $db->prepare("UPDATE hiking SET `name` = ?, `difficulty` = ?, `distance` = ?, `duration` = ?, `height_difference` = ?, `available` = ? WHERE id =".$_GET['id']);
	$request->execute(array(
	$name,
	$difficulty,
	$distance,
	$duration,
	$height_difference,
	$available ));

  echo "La randonnée a été modifiè avec succès.";
} catch (Exception $e) {
  echo $e->getMessage();
}
}

?>