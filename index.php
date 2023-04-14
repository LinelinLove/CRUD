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
    <div id="container">
        <h1>Liste de personnes :</h1>

        <div class="form">
            <form method="post" action="create.php">
                <input type="submit" name="created" value="Ajouter une personne" />
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>E-mail</th>
                    <th>Téléphone</th>
                    <th>Édition</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "read.php"
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>