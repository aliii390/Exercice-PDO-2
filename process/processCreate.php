<?php

require_once '../connect.php';


// INSERER ICI validation du formulaire





$sql = "INSERT INTO patients (lastname, firstname, birthdate, phone , mail)
 VALUES (:lastname, :firstname, :birthdate , :phone, :mail  )";

try {
    $stmt = $pdo->prepare($sql);
    $users = $stmt->execute([
        ':lastname' => $_POST["lastname"],
        ':firstname' => $_POST["firstname"],
        ':birthdate' => $_POST["birthdate"],
        ':phone' => $_POST["birthdate"],
        ':mail' => $_POST["mail"]
    ]); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat




} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


header("Location: ../index.php");
// exit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/createUser.css">
</head>
<body>
    
</body>
</html>