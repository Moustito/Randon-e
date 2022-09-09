<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>

  <?php
include 'dbConnect.php';

// On récupère tout le contenu de la table
$sqlQuery = 'SELECT * FROM hiking';
$GetHiking = $db->prepare($sqlQuery);
$GetHiking->execute();
$data = $GetHiking->fetchAll();

?>

  <body>
    <h1>Liste des randonnées</h1>
    <a href="/Randon-e/create.php">Nouvelle randonnée</a>
    

    <table>
      <tr>
          <th>Name</th>
          <th>Dificulty</th>
          <th>Distance</th>
          <th>Duration</th>
          <th>Height Difference</th>
          <th>Available</th>
          <th>Delete</th>
      </tr>
        <?php
          foreach ($data as $data) {
            ?><tr>
              <td><?php echo "<a href='update.php?id=".$data[0]."'>$data[name]</a>"?></td>
              <td><?php echo $data[difficulty] ?></td>
              <td><?php echo $data[distance] ?></td>
              <td><?php echo $data[duration] ?></td>
              <td><?php echo $data[height_difference] ?></td>
              <td><?php echo $data[available] ?></td>
              <td><?php echo "<a href='delete.php?id=".$data[0]."'>"?>X</a></td>
            </tr>
        <?php
          }
        ?>
    </table>
  </body>
</html>

<?php

?>