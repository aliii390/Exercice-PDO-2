
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
    <title>Modifier le profil</title>
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
<form action="./process/finModifUser.php" method="post" class="container">

<label for="nom">Nom : </label>
<input type="text" name="lastname" id="nom" value=""<?= $user['lastname'] ?>>

<label for="prenom">Prenom : </label>
<input type="text" name="firstname" id="prenom"  value="<?= $user['firstname'] ?>">

<label for="birthdate">Date d'anniversaire : </label>
<input type="date" name="birthdate" id="anniv"  value="<?= $user['birthdate'] ?>">

<label for="phone">Numéro de téléphone : </label>
<input type="tel" name="phone" id="tel" value="<?= $user['phone'] ?>">

<label for="mail">Adresse mail : </label>
<input type="tel" name="mail" id="mail"  value="<?= $user['mail'] ?>">


<input type="submit" value="Enregistrez les modifications">
</form>
</body>
</html>