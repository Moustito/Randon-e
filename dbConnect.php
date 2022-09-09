<?php
$host = 'localhost';
$dbname = 'becode';
$username = 'moustito';
$password = 'Php_My_Admin007';
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$username","$password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (Exception $e) {
      echo $e->getMessage();
  }
?>