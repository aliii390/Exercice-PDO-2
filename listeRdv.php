<?php
require_once './connect.php';

$sql = "SELECT * FROM `appointments`";

try {
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
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
    <div class="btn-a">
        <a href="./createUser.php" class="glass-link">Ajoutez une autre personne</a>
    </div>

    <ol>
        <h1>Liste des Rendez-vous:</h1>

        <?php
        foreach ($users as $user) {
        ?>
            <li>Heure du rendez-vous : <?= $user['dateHour'] ?> | Nom du client : <?= $user['idPatients'] ?> </li>
                <a href="profil-patient.php?id=<?= $user['id'] ?>">Voir Profil</a>  <!-- en gros quand je clique sur le lien sa me permet de cliquer sur profil de l'user car je recup l'id sa s'appelle une url dynamique -->
            </li>
        <?php
        }
        ?>
    </ol>
</body>

</html>
