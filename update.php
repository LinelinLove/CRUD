<?php


$prenom = filter_input(INPUT_POST, "prenom");
$nom = filter_input(INPUT_POST, "nom");

$prenom_update = filter_input(INPUT_POST, "prenom_update");
$nom_update = filter_input(INPUT_POST, "nom_update");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["updated"])) {
        update($prenom, $nom, $prenom_update, $nom_update);
    }
}


function update($prenom, $nom, $prenom_update, $nom_update)
{

    echo "coucou $prenom $nom (avant)";
    $personne = [
        'prenom' => $prenom,
        'nom' => $nom
    ];

    // Etape 1 : Récupérer le JSON dans le fichier JSON avec file_get_contents
    $personnes = file_get_contents("personnes.json");

    // Etape 2 : Transformer le JSON en un tableau PHP : 
    // -> json_decode($contenuFichier, true)
    $tab = json_decode($personnes, true);

    // Etape 3 : Maintenant qu'on a un tableau, on ajoute le produit à ce tableau :
    // $tableauQuiVientDuJson[] = $produit;
    // $tab[] = $personne;

    $key = array_search($personne, $tab);
    echo "key = $key";
    if ($key !== false) {
        $tab[$key]['prenom'] = $prenom_update;
        $tab[$key]['nom'] = $nom_update;
    }
    // $tab[$personne['prenom']] = $prenom_update;
    // $tab[$personne['nom']] = $nom_update;


    // echo var_dump($tab);

    // Etape 4 : On réécrit complètement le fichier JSON :
    // 4-A : Transformer en string avec json_encode
    $data =  json_encode($tab);
    // 4-B : Ecrire dans le fichier avec file_put_contents
    file_put_contents("personnes.json", $data);
    // http://php.net/file_put_contents
    // echo "<p>$prenom $nom a bien été modifié en $prenom_update $nom_update ! (après)</p>";

    // Ajout d'une redirection vers index.php
    header("Location: index.php");
    exit; // Important pour arrêter l'exécution du script après la redirection
}

?>
<div id="form">
    <h2>Mettre à jour <?= $prenom ?> <?= $nom ?> :</h2>
    <form method="post" action="update.php">
        <div id="create">
            <div class="inputCreate">
                <label for="prenom_update">Prénom : </label><input type="text" name="prenom_update" value="<?= $prenom ?>" required minlength="3">
            </div>
            <div class="inputCreate">
                <label for="nom_update">Nom : </label><input type="text" name="nom_update" value="<?= $nom ?>" required minlength="3">
            </div>


            <input type="hidden" name="prenom" value="<?= $prenom ?>" />
            <input type="hidden" name="nom" value="<?= $nom ?>" />


            <input type="submit" name="updated" value="Update" />
        </div>
    </form>
</div>
<link rel="stylesheet" href="style.css">