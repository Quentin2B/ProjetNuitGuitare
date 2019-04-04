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
	</head>

 <body>

 <?php
	 //Connection avec la BDD.
    require("php/bdd.php");

    $sqlChauffeurs = "SELECT course.Id, Date, Heure, chauffeur.Nom as cNom, chauffeur.Prenom as cPre, groupe.Nom as gNom, structure.Nom as sNom, Remarque
                                FROM `course`
                                JOIN chauffeur ON NomChauffeur = chauffeur.Id
                                JOIN groupe ON NomGroupe = groupe.Id
                                JOIN structure ON NomStructure = structure.Id
                                ORDER BY Date, SUBSTRING_INDEX(Heure, '', -1), SUBSTRING_INDEX(Heure, ' ', 1)";
    $formChauffeurs = "SELECT Id, Nom, Prenom FROM chauffeur";
    $formGroupes = "SELECT Id, Nom FROM groupe";
    $formStructures = "SELECT Id, Nom FROM structure";
    $formChauffeurs = accesBdd()->query($formChauffeurs);
    $formGroupes = accesBdd()->query($formGroupes);
    $formStructures = accesBdd()->query($formStructures);
	$reponse = accesBdd()->query($sqlChauffeurs);

	if(!empty($_POST['valide'])) {
		if(!empty($_POST['nomChauffeur']) && !empty($_POST['date']) && !empty($_POST['heure']) && !empty($_POST['chauffeur']) && !empty($_POST['groupe']) && !empty($_POST['structure'])) {
      $date = $_POST["date"];
      $heure = $_POST["heure"];
      $chauffeur = $_POST["chauffeur"];
      $groupe = $_POST["groupe"];
      $structure = $_POST["structure"];
      $remarque = $_POST["remarque"];

			$sqlAjoutChauffeur = "INSERT INTO `course` (`Id`, `Date`, `Heure`, `NomChauffeur`, `NomGroupe`, `NomStructure`, `Remarque`) VALUES (NULL, '".$date."', '".$heure."', '".$chauffeur."', '".$groupe."', '".$structure."', '".$remarque."');";
      echo ($sqlAjoutChauffeur);
      accesBdd()->query($sqlAjoutChauffeur);
			header('Location: modifCourses.php');
      exit;
		}
	}
 ?>


 <h3>Modification des Courses enregistrées dans la base de données</h3> <a href='../menu_admin.php' title='Retour au Menu'><img src='img/home.png' alt='Retour au menu' /></a><br>

 <div class="grid-x grid-padding-x">
      <div class="medium-6 cell">
				<table class="responsive-card-table unstriped" border=4>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Chauffeur</th>
                    <th>Groupe</th>
                    <th>Structure</th>
                    <th>Remarque</th>
                    <th>Supprimer</th>
                </tr>
                <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
		            while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
		            {
		            ?>
		                <tr>
                      <td data-label="Date"><?php echo $donnees['Date'];?></td>
                      <td data-label="Heure"><?php echo $donnees['Heure'];?></td>
                      <td data-label="Nom du chauffer"><?php echo ($donnees['cPre'] . " " . $donnees['cNom']);?></td>
                      <td data-label="Groupe"><?php echo $donnees['gNom'];?></td>
                      <td data-label="Structure"><?php echo $donnees['sNom'];?></td>
                      <td data-label="Remarque"><?php echo $donnees['Remarque'];?></td>
                       <td data-label="Supprimer">
                         <a onclick="actionDelete(<?php echo $donnees["Id"];?>);" title='Supprimer'><img src='img/croix.png' alt='Supprimer' /></a>
                       </td>
		                </tr>
		            <?php
		            } //fin de la boucle, le tableau contient toute la BDD
		         ?>
		        </table>
		</div>

		<div class="medium-6 cell" id="PageDroite">
			<h2> Ajout/Modification d'une course </h2>
					<form name="AjoutCourse" action="modifCourses.php" method="post">

						<label>Date</label>
						<input type="date" name="date" id="date" placeholder="Date de la course" value="2019-01-01" size="4"/><br>
						<label>Heure</label>
						<input type="time" name="heure" id="heure" placeholder="Heure de la course" value="10:00:00" size="4"/><br>
						<label>Chauffeur</label>
            <select name = "chauffeur">
              <?php
              while($donnees = $formChauffeurs->fetch(PDO::FETCH_ASSOC))
              {
               echo "<option value = '".$donnees['Id']."'>". $donnees["Prenom"] . " " . $donnees["Nom"] ."</option>";
             } ?>
            </select>
            <label>Groupe</label>
            <select name = "groupe">
              <?php
              while($donnees = $formGroupes->fetch(PDO::FETCH_ASSOC))
              {
               echo "<option value = '".$donnees['Id']."'>". $donnees["Nom"] ."</option>";
             } ?>
             </select>
            <label>Structure</label>
            <select name = "structure">
              <?php
              while($donnees = $formStructures->fetch(PDO::FETCH_ASSOC))
              {
               echo "<option value = '".$donnees['Id']."'>". $donnees["Nom"] ."</option>";
             } ?>
             </select>
            <label>Remarque</label>
            <input type="text" name="remarque" id="remarque" placeholder="Remarque" size="4"/><br>

						<input type="submit" value="Ajouter" name="valide">

					</form>

		</div>

	</div>
  <script type="text/javascript" src="mainScript.js"></script>
 </body>

</html>
