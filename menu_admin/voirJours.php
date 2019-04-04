<!doctype html>
<html class="no-js" lang="fr">
 	<head>
 		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Courses à Venir</title>
		<link rel="stylesheet" href="css/foundation.css" />
		<link rel="stylesheet" href="css/moncss.css" />
		<script src="js/vendor/jquery.js"></script>
		<script src="js/vendor/what-input.js"></script>
		<script src="js/vendor/foundation.min.js"></script>

		<link rel="stylesheet" type="text/css" href="StyleFormCrea.css" media="all"/>
	</head>

 <body>
   <p>
    <h1><b>Jours à venir : pour chaque jour de la table jour, les courses associées</b></h1>
    <a href='../menu_admin.php' title='Retour au Menu'><img src='img/home.png' alt='Retour au menu' /></a>
   </p>
 </br>
   <table class="table table-striped table-dark">
     <thead>
       <tr>
         <th scope="col">Date</th>
         <th scope="col">Heure</th>
         <th scope="col">Chauffeur</th>
         <th scope="col">Artiste</th>
         <th scope="col">Lieu arrivee</th>
         <th scope="col">Remarques</th>
       </tr>
     </thead>
   <tbody id="filledTbody">

<?php

require("php/bdd.php");

$sqlGroupes = "SELECT  jour.Date, Heure, chauffeur.Nom as cNom, chauffeur.Prenom as cPre, groupe.Nom as gNom, structure.Nom as sNom, Remarque
                            FROM `course`
                            JOIN chauffeur ON NomChauffeur = chauffeur.Id
                            JOIN groupe ON NomGroupe = groupe.Id
                            JOIN structure ON NomStructure = structure.Id
                            JOIN jour ON course.Date = jour.Date
                            ORDER BY Date, SUBSTRING_INDEX(Heure, '', -1), SUBSTRING_INDEX(Heure, ' ', 1)";
$reponse = accesBdd()->query($sqlGroupes);

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
    </tr>
<?php
} //fin de la boucle, le tableau contient toute la BDD

 ?>
</tbody>
</table>
</body>

</html>
