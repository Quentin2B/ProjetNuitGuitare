<?php
require("bdd.php");

if (!isset($_GET['Action'])) $_GET['Action']="";
  $Action=$_GET['Action'];
  if ($Action=="Suppression")
  {
    $id=$_GET['id'];
    echo $id;
    $sqlSupprChauffeur = "DELETE FROM chauffeur WHERE Id='". $id . "'";
    accesBdd()->query($sqlSupprChauffeur);
  }

  header('Location: ../modifChauffeurs.php');
  exit;
?>