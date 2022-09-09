<?php
header('Location: read.php');
/**** Supprimer une randonnée ****/
include 'dbConnect.php';
  $sqlQuery = 'SELECT * FROM hiking WHERE id='.$_GET['id'];
  $GetHiking = $db->prepare($sqlQuery);
  $GetHiking->execute();
  $data = $GetHiking->fetchAll();
  
  echo '<pre>';
  print_r($data[0][id]);
  echo '</pre>';

try {
    $request = $db->prepare("DELETE FROM hiking WHERE id =".$data[0][id].";");
    $request->execute(array(
                  $_POST['name'],
                  $_POST['difficulty'],
                  $_POST['distance'],
                  $_POST['duration'],
                  $_POST['height_difference'],
                  $_POST['available']
                  ));
  
              echo "La randonnée a été supprimé avec succès.";
          } catch (Exception $e) {
              echo $e->getMessage();
          }
exit();
?>