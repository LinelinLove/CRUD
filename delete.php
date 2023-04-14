<?php

$prenom = filter_input(INPUT_POST, "prenom");
$nom = filter_input(INPUT_POST, "nom");
$methode = filter_input(INPUT_SERVER, "REQUEST_METHOD");
delete($methode, $prenom, $nom);

// if (isset($_POST["prenom"]) && isset($_POST["nom"])) {
//     $prenom = $_POST["prenom"];
//     $nom = $_POST["nom"];
// }

function delete($methode, $prenom, $nom)
{

    if ($methode == "POST") {

        $personne = [
            'prenom' => $prenom,
            'nom' => $nom
        ];

        // Etape 1 : Récupérer le JSON dans le fichier JSON avec file_get_contents
        $personnes = file_get_contents("personnes.json");

        // Etape 2 : Transformer le JSON en un tableau PHP : 
        // -> json_decode($contenuFichier, true)
        $tab = json_decode($personnes, true);
        // $t = implode($tab);
        // echo $t;

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
        echo "<p>$prenom $nom a bien été supprimé !</p>";


        // Ajout d'une redirection vers index.php
        header("Location: index.php");
        exit; // Important pour arrêter l'exécution du script après la redirection
    }
}
?>

<!-- <link rel="stylesheet" href="style.css"> -->