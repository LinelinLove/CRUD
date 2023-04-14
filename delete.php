<?php

$prenom = filter_input(INPUT_POST, "prenom");
$nom = filter_input(INPUT_POST, "nom");
$email = filter_input(INPUT_POST, "email");
$tel = filter_input(INPUT_POST, "tel");
$methode = filter_input(INPUT_SERVER, "REQUEST_METHOD");
// delete($methode, $prenom, $nom, $email, $tel);

// if (isset($_POST["prenom"]) && isset($_POST["nom"])) {
//     $prenom = $_POST["prenom"];
//     $nom = $_POST["nom"];
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["deleted"])) {
        delete($methode, $prenom, $nom, $email, $tel);
    }
}

function delete($methode, $prenom, $nom, $email, $tel)
{

    if ($methode == "POST") {

        $personne = [
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'tel' => $tel
        ];

        // Etape 1 : Récupérer le JSON dans le fichier JSON avec file_get_contents
        $personnes = file_get_contents("personnes.json");

        // Etape 2 : Transformer le JSON en un tableau PHP : 
        // -> json_decode($contenuFichier, true)
        $tab = json_decode($personnes, true);

        // Etape 3 : Maintenant qu'on a un tableau, on supprime le produit à ce tableau :
        $key = array_search($personne, $tab);
        if ($key !== false) {
            unset($tab[$key]);
        }

        // Etape 4 : On réécrit complètement le fichier JSON :
        // 4-A : Transformer en string avec json_encode
        $data =  json_encode($tab);

        // 4-B : Ecrire dans le fichier avec file_put_contents
        file_put_contents("personnes.json", $data);
        // echo "<p>$prenom $nom a bien été supprimé !</p>";


        // Ajout d'une redirection vers index.php
        header("Location: index.php");
        exit; // Important pour arrêter l'exécution du script après la redirection
    }
}
?>

<div class="form">
    <h2>Supprimer une personne</h2>
    <div class="delete">
        <p class="text_delete">
            Êtes-vous sûr de vouloir supprimer cette personne ?
        </p>
    </div>

    <form method="post" action="delete.php">
        <input type="hidden" name="prenom" value="<?= $prenom ?>" />
        <input type="hidden" name="nom" value="<?= $nom ?>" />
        <input type="hidden" name="email" value="<?= $email ?>" />
        <input type="hidden" name="tel" value="<?= $tel ?>" />
        <div>
            <button>
                <!-- <div class="btn"> -->
                <a href="index.php">Retour</a>
                <!-- </div> -->
            </button>
            <input type="submit" name="deleted" value="Supprimer" />
        </div>
</div>

</form>
</div>

<link rel="stylesheet" href="style.css">