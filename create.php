<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/Randon-e/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<div>
			<label for="available">Available</label>
			<input type="text" name="available" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>


	<?php
include 'dbConnect.php';

  if (	isset($_POST['name']) AND
  		isset($_POST['difficulty']) AND
  		isset($_POST['distance']) AND
  		isset($_POST['duration']) AND
  		isset($_POST['height_difference']) AND
		  isset($_POST['available'])) {

			try {
			$request = $db->prepare("INSERT INTO hiking (`name`, `difficulty`, `distance`, `duration`, `height_difference`, `available`)
						VALUES ( ?, ?, ?, ?, ?, ?)");
			$request->execute(array(
				$_POST['name'],
				$_POST['difficulty'],
				$_POST['distance'],
				$_POST['duration'],
				$_POST['height_difference'],
				$_POST['available']));

			echo "La randonnée a été ajoutée avec succès.";
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
?>


</body>
</html>