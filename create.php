<?php
// CRUD : C (Create)
// On ajouterait une personne dans la liste de personnes
// (Ajouter une case dans la liste personnes)

$prenom = filter_input(INPUT_POST, "prenom");
$nom = filter_input(INPUT_POST, "nom");
$methode = filter_input(INPUT_SERVER, "REQUEST_METHOD");

function create($methode, $prenom, $nom)
{

    if ($methode == "POST") {
        if (strlen($prenom) >= 3 and strlen($nom) >= 3) {

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


            // Etape 3 : Maintenant qu'on a un tableau, on ajoute le produit à ce tableau :
            // $tableauQuiVientDuJson[] = $produit;
            $tab[] = $personne;

            // echo var_dump($tab);


            // Etape 4 : On réécrit complètement le fichier JSON :
            // 4-A : Transformer en string avec json_encode
            $data =  json_encode($tab);
            // 4-B : Ecrire dans le fichier avec file_put_contents
            file_put_contents("personnes.json", $data);
            // http://php.net/file_put_contents
            // echo "<p>$prenom $nom a bien été ajouté !</p>";
        }
    }
}

create($methode, $prenom, $nom);
// $prenom = "";
// $nom = "";

?>

<link rel="stylesheet" href="style.css">

<!-- <form method="post" action="index.php">
    <input type="submit" name="button" value="Retour" id="button" />
</form> -->