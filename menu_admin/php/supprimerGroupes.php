<?php
require("bdd.php");

if (!isset($_GET['Action'])) $_GET['Action']="";
  $Action=$_GET['Action'];
  if ($Action=="Suppression")
  {
    $id=$_GET['id'];
    echo $id;
    $sqlSupprGroupe = "DELETE FROM groupe WHERE Id='". $id . "'";
    accesBdd()->query($sqlSupprGroupe);
  }

  header('Location: ../modifGroupes.php');
  exit;
?>