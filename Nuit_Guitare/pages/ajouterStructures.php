<?php
  //Connection avec la BDD.
  require_once("db.php");

  if (!isset($_GET['Action'])) $_GET['Action']="";
    $Action=$_GET['Action'];
    if ($Action=="Ajouter")
    {

   if(!empty($_GET['nomStruct'])) {
     $categorie = $_GET['categorie'];
     $nomStruct = $_GET['nomStruct'];
     $adresseStruct = $_GET['adresseStruct'];
     $telephoneStruct = $_GET['telephoneStruct'];
     //$mailStruct = $_POST['mailStruct'];

     $sqlAjoutStruct = 'INSERT INTO structure SET Categorie="'. $categorie . '", Nom="' . $nomStruct .'", Adresse="' . $adresseStruct . '", Telephone="' . $telephoneStruct . '"';
     accesBdd()->query($sqlAjoutStruct);
   }
 }
?>
