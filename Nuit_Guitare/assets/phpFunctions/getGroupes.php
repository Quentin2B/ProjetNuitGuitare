<?php

require("db.php");

$sqlGroupes = 'SELECT * FROM groupes';
$reponse = accesBdd()->query($sqlGroupes);

while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
{
?>
    <tr>
        <td data-label="Id"><?php echo $donnees['Id'];?></td>
        <td data-label="Nom"><?php echo $donnees['Nom'];?></td>
        <td data-label="NbPersonne"><?php echo $donnees['NbPersonne'];?></td>
        <td data-label="Date Concert"><?php echo $donnees['DateConcert'];?></td>
        <td data-label="Lieu"><?php echo $donnees['LieuArrivee'];?></td>
    </tr>
<?php
} //fin de la boucle, le tableau contient toute la BDD

 ?>
