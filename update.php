<?php


$prenom = filter_input(INPUT_POST, "prenom");
$nom = filter_input(INPUT_POST, "nom");
$email = filter_input(INPUT_POST, "email");
$tel = filter_input(INPUT_POST, "tel");

$prenom_update = filter_input(INPUT_POST, "prenom_update");
$nom_update = filter_input(INPUT_POST, "nom_update");
$email_update = filter_input(INPUT_POST, "email_update");
$tel_update = filter_input(INPUT_POST, "tel_update");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["updated"])) {
        update($prenom, $nom, $email, $tel, $prenom_update, $nom_update, $email_update, $tel_update);
    }
}

function update($prenom, $nom, $email, $tel, $prenom_update, $nom_update, $email_update, $tel_update)
{

    $personne = [
        'prenom' => $prenom,
        'nom' => $nom,
        'email' => $email,
        'tel' => $tel,
    ];

    // Etape 1 : Récupérer le JSON dans le fichier JSON avec file_get_contents
    $personnes = file_get_contents("personnes.json");

    // Etape 2 : Transformer le JSON en un tableau PHP : 
    $tab = json_decode($personnes, true);

    $key = array_search($personne, $tab);
    echo "key = $key";
    if ($key !== false) {
        $tab[$key]['prenom'] = $prenom_update;
        $tab[$key]['nom'] = $nom_update;
        $tab[$key]['email'] = $email_update;
        $tab[$key]['tel'] = $tel_update;
    }

    // Etape 4 : On réécrit complètement le fichier JSON :
    // 4-A : Transformer en string avec json_encode
    $data =  json_encode($tab);
    // 4-B : Ecrire dans le fichier avec file_put_contents
    file_put_contents("personnes.json", $data);

    // echo "<p>$prenom $nom a bien été modifié en $prenom_update $nom_update ! (après)</p>";

    // Ajout d'une redirection vers index.php
    header("Location: index.php");
    exit; // Important pour arrêter l'exécution du script après la redirection
}

?>
<div class="form">
    <h2>Modifier une personne</h2>
    <form method="post" action="update.php">
        <div class="create">
            <div class="inputForm">
                <div class="inputCreate">
                    <label for="prenom_update">Prénom : </label><input type="text" name="prenom_update" id="prenom_update" value="<?= $prenom ?>" required minlength="3">
                </div>
                <div class="inputCreate">
                    <label for="nom_update">Nom : </label><input type="text" name="nom_update" id="nom_update" value="<?= $nom ?>" required minlength="3">
                </div>

                <div class="inputCreate">
                    <label for="email_update">E-mail : </label><input type="email" name="email_update" id="email_update" value="<?= $email ?>" required minlength="3">
                </div>

                <div class="inputCreate">
                    <label for="tel_update">Téléphone : </label><input type="phone" name="tel_update" id="tel_update" value="<?= $tel ?>" required minlength="3">
                </div>
            </div>

            <input type="hidden" name="prenom" value="<?= $prenom ?>" />
            <input type="hidden" name="nom" value="<?= $nom ?>" />
            <input type="hidden" name="email" value="<?= $email ?>" />
            <input type="hidden" name="tel" value="<?= $tel ?>" />

            <div>
                <button><a class="btn" href="index.php">Retour</a></button>
                <input type="submit" name="updated" value="Mettre à jour" />
            </div>
        </div>
    </form>
</div>


<link rel="stylesheet" href="style.css">