<?php
require_once './connect.php';

$sql = "SELECT * FROM `appointments`
JOIN patients ON appointments.idPatients = patients.id";

try {
    $stmt = $pdo->query($sql);
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

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
    <div class="btn-a">
        <a href="./ajout-rendezVous.php" class="glass-link">Ajoutez un rendez-vous</a>
    </div>

    <ol>
        <h1>Liste des Rendez-vous:</h1>

        <?php
        foreach ($appointments as $appointment) {
        ?>
            <li>Heure du rendez-vous : <?= $appointment['dateHour'] ?> | Nom du client : <?= $appointment['lastname'] ?> | Prénom du client :  <?= $appointment['firstname'] ?> 
            <a href="./infoRdv.php?rdv=<?= $appointment['id'] ?>">Voir rendez vous</a> 
        </li>
                 
           
        <?php
        }
        ?>
    </ol>
</body>

</html>
