<?php
require_once("db.php");

if (!isset($_GET['Action'])) $_GET['Action']="";
  $Action=$_GET['Action'];
  if ($Action=="Ajouter")
  {

		if(!empty($_GET['nomChauffeur'])) {
			$nomChauffeur = $_GET['nomChauffeur'];
			$prenomChauffeur = $_GET['prenomChauffeur'];
			$telephoneChauffeur = $_GET['telephoneChauffeur'];
			//$couleurChauffeur = $_GET['couleurChauffeur'];

			$sqlAjoutChauffeur = 'INSERT INTO chauffeur SET Nom="'. $nomChauffeur . '", Prenom="' . $prenomChauffeur .'", Telephone="' . $telephoneChauffeur . '"';
			accesBdd()->query($sqlAjoutChauffeur);
      exit;
		}
	}
  }

  exit;
?>
