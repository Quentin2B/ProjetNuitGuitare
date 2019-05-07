<?php
require_once("db.php");

if (!isset($_GET['Action'])) $_GET['Action']="";
  $Action=$_GET['Action'];
  if ($Action=="Suppression")
  {
    $id=$_GET['id'];
    echo $id;
    $sqlSupprStruct = "DELETE FROM structure WHERE Id='". $id . "'";
    accesBdd()->query($sqlSupprStruct);
  }

  header('Location: ./index.php?page=DataBaseUpdate');
  exit;
?>
