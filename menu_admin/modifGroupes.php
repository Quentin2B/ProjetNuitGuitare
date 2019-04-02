<!doctype html>
<html class="no-js" lang="fr">
 	<head>
 		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Modification Groupes</title>
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

    $sqlGroupes = 'SELECT * FROM groupe';
	$reponse = accesBdd()->query($sqlGroupes);

	if(!empty($_POST['valide'])) {
		if(!empty($_POST['nomGroupe'])) {
			$nomGroupe = $_POST['nomGroupe'];
			$nbPersGroupe = $_POST['nbPersGroupe'];
			$dateGroupe = $_POST['dateGroupe'];
			$lieuGroupe = $_POST['lieuGroupe'];

			$sqlAjoutGroupe = 'INSERT INTO groupe SET Nom="'. $nomGroupe . '", NbPersonne="' . $nbPersGroupe .'", DateConcert="' . $dateGroupe . '", LieuArrivee="' . $lieuGroupe .'"';
			accesBdd()->query($sqlAjoutGroupe);
			header('Location: modifGroupes.php');
  			exit;
		}
	}
 ?>

 

 
 <h3>Modification des Groupes enregistrés dans la base de données</h3> <a href='../menu_admin.php' title='Retour au Menu'><img src='img/home.png' alt='Retour au menu' /></a><br>

 <div class="grid-x grid-padding-x">
      <div class="medium-6 cell">
				<table class="responsive-card-table unstriped" border=4>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Nombre Personnes</th>
                    <th>Date de concert</th>
                    <th>Lieu d'arrivée</th>
                    <th>Supprimer</th>
                </tr>

                <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
		            while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
		            {
		            ?>
		                <tr>
		                    <td data-label="Id"><?php echo $donnees['Id'];?></td>
		                    <td data-label="Nom"><?php echo $donnees['Nom'];?></td>
		                    <td data-label="Nombre Personnes"><?php echo $donnees['NbPersonne'];?></td>
		                    <td data-label="Date de Concert"><?php echo $donnees['DateConcert'];?></td>
		                    <td data-label="Lieu d'arrivée"><?php echo $donnees['LieuArrivee'];?></td>
		                    <td data-label="Supprimer"> 
		                    	<a href='php/supprimerGroupes.php?Action=Suppression&id=<?php echo $donnees["Id"];?>' title='Supprimer'><img src='img/croix.png' alt='Supprimer' /></a>		                    
		                    </td>
		                </tr>
		            <?php
		            } //fin de la boucle, le tableau contient toute la BDD
		         ?>
		        </table>
		</div>

		<div class="medium-6 cell" id="PageDroite">
			<h2> Ajout d'un nouveau groupe </h2>
					<form name="AjoutGroupe" action="modifGroupes.php" method="post">

						<label>Nom (obligatoire)</label>
						<input type="text" name="nomGroupe" id="nomGroupe" placeholder="Nom du Groupe" size="4"/><br>
						
						<label>Nombre de personnes dans l'équipe</label>
						<input type="number" name="nbPersGroupe" id="nbPersGroupe" placeholder="Nombre de personnes dans le groupe et l'équipe" size="4"/><br>

						<label>Date du concert</label>
						<input type="date" name="dateGroupe" id="dateGroupe" value="2019-01-01" placeholder="Date de leur concert" size="4"/><br>

						<label>Lieu d'arrivée</label>
						<input type="text" name="lieuGroupe" id="lieuGroupe" placeholder="Lieu d'arrivée du Groupe" size="4"/><br>


						<input type="submit" value="Ajouter" name="valide">

					</form>
			
		</div>

	</div>

 </body>

</html>

