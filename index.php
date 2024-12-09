<?php
require_once './connect.php';

$sql = "SELECT * FROM `patients`";

try {
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Utilisateur</title>
    <link rel="stylesheet" href="./css/listeUser.css">
</head>

<body>
    <ol>
        <h1>Liste des utilisateurs :</h1>

        <?php
        foreach ($users as $user) {
           
        ?>
            <li>Nom : <?= $user['firstname'] ?> | Prénom : <?= $user['lastname']  ?>   | Date Anniversaire :  <?= $user['birthdate']  ?>  |  Numéro de téléphone : <?= $user['phone']  ?>  | Adresse Mail :  <?= $user['mail']  ?>  </li>

        <?php
        }

        ?>

    </ol>

</body>

</html>