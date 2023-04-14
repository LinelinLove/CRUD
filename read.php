<?php
function read($file)
{
    // Etape 1 : Récupérer le JSON dans le fichier JSON avec file_get_contents
    $personnes = file_get_contents($file);

    // Etape 2 : Transformer le JSON en un tableau PHP : 
    // -> json_decode($contenuFichier, true)
    $tab = json_decode($personnes, true);

    foreach ($tab as $personne) {

        echo "<tr>";

        echo '<td>';
        echo '</span> <span class="nom" value="', $personne["nom"], '">', $personne['nom'], '</span>';
        echo '</td>';

        echo '<td>';
        echo '<span class="prenom" value="', $personne["prenom"], '">', $personne['prenom'];
        echo '</td>';

        echo '<td>';
        echo '<div class="UD">';
        echo '<form method="post" action="update.php">';
        echo '<input type="hidden" name="prenom" value="', $personne["prenom"], '" />';
        echo '<input type="hidden" name="nom" value="', $personne["nom"], '" />';
        echo '<input type="submit" name="Update" value="Modifier" />';
        echo '</form>';

        echo '<form method="post" action="delete.php">';
        echo '<input type="hidden" name="prenom" value="', $personne["prenom"], '" />';
        echo '<input type="hidden" name="nom" value="', $personne["nom"], '" />';
        echo '<input type="submit" name="Delete" value="Supprimer" />';
        echo '</form>';
        echo '</div>';
        echo '</td>';

        echo "</tr>";
    }
}

read('personnes.json');

?>