<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CRUD</title>
</head>

<body>
    <!-- <div id="container"></div> -->
    <?php include "create.php" ?>

    <div id="list">
        <h1>Liste de personnes :</h1>
        <ol>
            <?php include "read.php" ?>
        </ol>
    </div>

    <div id="form">
    <h2>Ajouter une personne : </h2>
        <form method="post">
            <div id="create">
                <div class="inputCreate">
                    <label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" required minlength="3">
                </div>
                <div class="inputCreate">
                    <label for="nom">Nom : </label><input type="text" name="nom" id="nom" required minlength="3">
                </div>
                <input type="submit" name="button" value="Create" id="button" />
            </div>
        </form>
    </div>
</body>
<script src="script.js"></script>

</html>