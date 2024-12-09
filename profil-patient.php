<?php
require_once './connect.php';

$id = $_GET['id'] ?? null;  // sa ?? c'es l'opérateur null je fait sa pour verif  si la variable que je recup pour voir si elle existe

if ($id && is_numeric($id)) {   //ici je met is_numeric pr voir si la variable c'est un nombre ou du text
    
    $sql = "SELECT * FROM patients WHERE id = :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $error) {
        echo "Erreur lors de la requête : " . $error->getMessage();
    }
} else {
    echo "ID invalide ou non spécifié.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="./css/profil-patient.css">
</head>
<body>
    <div style="display:flex; flex-direction:column; gap:15px;">
    <a href="./createUser.php" class="glass-link">Ajoutez une autre personne</a>
    <a href="./index.php" class="glass-link">List utilisateur</a>
    </div>


    <div class="container">
<?php if (isset($user)): ?>  <!-- si sa existe il ce passe saaa -->
    <h1>Profil de <?= $user['firstname'] ?> <?= $user['lastname'] ?></h1>
    <ul>
        <li>Nom : <?= $user['firstname'] ?></li>
        <li>Prénom : <?= $user['lastname'] ?></li>
        <li>Date de naissance : <?= $user['birthdate'] ?></li>
        <li>Téléphone : <?=$user['phone'] ?></li>
        <li>Adresse Mail : <?= $user['mail'] ?></li>
    </ul>
<?php else: ?>  <!-- si la condit exste pas il ce passe sa  -->
    <p>Aucun patient trouvé avec cet ID.</p>
<?php endif; ?>  <!-- d'apres de ce que j'ai compris endif sert  a fermer le bloc if-else -->
</div>




</body>
</html>
