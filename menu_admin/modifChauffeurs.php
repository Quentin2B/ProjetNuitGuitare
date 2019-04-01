<!doctype html>
<html class="no-js" lang="fr">
 	<head>
 		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Modification Chauffeurs</title>
		<link rel="stylesheet" href="css/foundation.css" />
		<link rel="stylesheet" href="css/moncss.css" />
		<script src="js/vendor/jquery.js"></script>
		<script src="js/vendor/what-input.js"></script>
		<script src="js/vendor/foundation.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="StyleFormCrea.css" media="all"/>
		<script src="scripts.js"></script>
	</head>

 <body>

 <?php
	 //Connection avec la BDD.
    require("php/bdd.php");

    $sqlChauffeurs = 'SELECT * FROM chauffeur';
	$reponse = accesBdd()->query($sqlChauffeurs);

	if(!empty($_POST['valide'])) {
		if(!empty($_POST['nomChauffeur'])) {
			$nomChauffeur = $_POST['nomChauffeur'];
			$prenomChauffeur = $_POST['prenomChauffeur'];
			$telephoneChauffeur = $_POST['telephoneChauffeur'];
			$couleurChauffeur = $_POST['couleurChauffeur'];

			$sqlAjoutChauffeur = 'INSERT INTO chauffeur SET Nom="'. $nomChauffeur . '", Prenom="' . $prenomChauffeur .'", Telephone="' . $telephoneChauffeur . '", Couleur = "' . $couleurChauffeur . '"';
			accesBdd()->query($sqlAjoutChauffeur);
			header('Location: modifChauffeurs.php');
  			exit;
		}
	}
 ?>

 
 <h3>Modification des Chauffeurs enregistrés dans la base de données</h3> <a href='../menu_admin.php' title='Retour au Menu'><img src='img/home.png' alt='Retour au menu' /></a><br>

 <div class="grid-x grid-padding-x">
      <div class="medium-6 cell">
				<table class="responsive-card-table unstriped" border=4>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Couleur</th>
                    <th>Supprimer</th>
                </tr>

                <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
		            while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
		            {
		            ?>
		                <tr>
		                    <td data-label="Id"><?php echo $donnees['Id'];?></td>
		                    <td data-label="Nom"><?php echo $donnees['Nom'];?></td>
		                    <td data-label="Prénom"><?php echo $donnees['Prenom'];?></td>
		                    <td data-label="Téléphone"><?php echo $donnees['Telephone'];?></td>
		                    <td data-label="Couleur"><?php echo $donnees['Couleur'];?></td>
		                    <td data-label="Supprimer"> 
		                    	<a href='php/supprimerChauffeurs.php?Action=Suppression&id=<?php echo $donnees["Id"];?>' title='Supprimer'><img src='img/croix.png' alt='Supprimer' /></a>		                    
		                    </td>
		                </tr>
		            <?php
		            } //fin de la boucle, le tableau contient toute la BDD
		         ?>
		        </table>
		</div>

		<div class="medium-6 cell" id="PageDroite">
			<h2> Ajout d'un nouveau chauffeur </h2>
					<form name="AjoutChauffeur" action="modifChauffeurs.php" method="post">

						<label>Nom (obligatoire)</label>
						<input type="text" name="nomChauffeur" id="nomChauffeur" placeholder="Nom du Chauffeur" size="4"/><br>
						
						<label>Prénom</label>
						<input type="text" name="prenomChauffeur" id="prenomChauffeur" placeholder="Prénom du Chauffeur" size="4"/><br>

						<label>Téléphone</label>
						<input type="text" name="telephoneChauffeur" id="telephoneChauffeur" placeholder="Numéro de téléphone du chauffeur" size="4"/><br>

						<label>Couleur</label>
						<input type="color" name="couleurChauffeur" id="couleurChauffeur" value="#ffffff" size="4"/><br>


						<input type="submit" value="Ajouter" name="valide">

					</form>
			
		</div>

	</div>

 </body>

</html>
