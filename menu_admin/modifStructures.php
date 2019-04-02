<!doctype html>
<html class="no-js" lang="fr">
 	<head>
 		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Modification Structures</title>
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

    $sqlStructures = 'SELECT * FROM structure';
	$reponse = accesBdd()->query($sqlStructures);

	if(!empty($_POST['valide'])) {
		if(!empty($_POST['nomStruct'])) {
			$categorie = $_POST['categorie'];
			$nomStruct = $_POST['nomStruct'];
			$adresseStruct = $_POST['adresseStruct'];
			$telephoneStruct = $_POST['telephoneStruct'];
			//$mailStruct = $_POST['mailStruct'];

			$sqlAjoutStruct = 'INSERT INTO structure SET Categorie="'. $categorie . '", Nom="' . $nomStruct .'", Adresse="' . $adresseStruct . '", Telephone="' . $telephoneStruct . '"';
			accesBdd()->query($sqlAjoutStruct);
			header('Location: modifStructures');
  			exit;
		}
	}
 ?>

 
 <h3>Modification des Structures enregistrées dans la base de données</h3> <a href='../menu_admin.php' title='Retour au Menu'><img src='img/home.png' alt='Retour au menu' /></a><br>

 <div class="grid-x grid-padding-x">
      <div class="medium-6 cell">
				<table class="responsive-card-table unstriped" border=4>
                <tr>
                    <th>id</th>
                    <th>Catégorie</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <!--<th>Mail</th>-->
                    <th>Supprimer</th>
                </tr>

                <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
		            while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
		            {
		            ?>
		                <tr>
		                    <td data-label="Id"><?php echo $donnees['Id'];?></td>
		                    <td data-label="Catégorie"><?php echo $donnees['Categorie'];?></td>
		                    <td data-label="Nom"><?php echo $donnees['Nom'];?></td>
		                    <td data-label="Adresse"><?php echo $donnees['Adresse'];?></td>
		                    <td data-label="Téléphone"><?php echo $donnees['Telephone'];?></td>
		                    <!--<td data-label="Mail"><?php //echo $donnees['Mail'];?></td>-->
		                    <td data-label="Supprimer"> 
		                    	<a href='php/supprimerStructures.php?Action=Suppression&id=<?php echo $donnees["Id"];?>' title='Supprimer'><img src='img/croix.png' alt='Supprimer' /></a>		                    
		                    </td>
		                </tr>
		            <?php
		            } //fin de la boucle, le tableau contient toute la BDD
		         ?>
		        </table>
		</div>

		<div class="medium-6 cell" id="PageDroite">
			<h2> Ajout d'une nouvelle structure </h2>
					<form name="AjoutStructure" action="modifStructures.php" method="post">

						<label>Catégorie</label>
						<select name="categorie" id="categorie">
							<option value="scene"> Scène </option>
							<option value="aeroport"> Aéroport </option>
							<option value="hotel"> Hôtel </option>
							<option value="restaurant"> Restaurant </option>
							<option value="divers"> Divers </option>
						</select>

						<label>Nom (obligatoire)</label>
						<input type="text" name="nomStruct" id="nomStruct" placeholder="Nom de la Structure" size="4"/><br>
						
						<label>Adresse</label>
						<input type="text" name="adresseStruct" id="adresseStruct" placeholder="Adresse de la Structure" size="4"/><br>

						<label>Téléphone</label>
						<input type="text" name="telephoneStruct" id="telephoneStruct" placeholder="Téléphone de la Structure" size="4"/><br>

						<!--<label>Mail</label>
						<input type="text" name="mailStruct" id="mailStruct" placeholder="Mail de la Structure" size="4"/><br>-->

						<input type="submit" value="Ajouter" name="valide">

					</form>
			
		</div>

	</div>

 </body>

</html>

