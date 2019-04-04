<?php

require("db.php");

$sqlChauffeurs = 'SELECT * FROM chauffeur';
$reponse = accesBdd()->query($sqlChauffeurs);

while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
{
?>
    <tr>
        <td data-label="Id"><?php echo $donnees['Id'];?></td>
        <td data-label="Nom"><?php echo $donnees['Nom'];?></td>
        <td data-label="Prénom"><?php echo $donnees['Prenom'];?></td>
        <td data-label="Téléphone"><?php echo $donnees['Telephone'];?></td>
    </tr>
<?php
} //fin de la boucle, le tableau contient toute la BDD

 ?>
