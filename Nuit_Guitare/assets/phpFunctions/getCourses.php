<?php

require("db.php");

$sqlGroupes = "SELECT  Date, Heure, chauffeur.Nom as cNom, chauffeur.Prenom as cPre, groupe.Nom as gNom, structure.Nom as sNom, Remarque
                            FROM `course`
                            JOIN chauffeur ON NomChauffeur = chauffeur.Id
                            JOIN groupe ON NomGroupe = groupe.Id
                            JOIN structure ON NomStructure = structure.Id
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
