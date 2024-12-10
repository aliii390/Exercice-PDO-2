<?php

require_once '../connect.php';


// INSERER ICI validation du formulaire





$sql = "INSERT INTO appointments (dateHour, idPatients)
 VALUES (:dateHour, :idPatients )";

try {
    $stmt = $pdo->prepare($sql);
    $users = $stmt->execute([
        ':dateHour' => $_POST["dateHour"],
        ':idPatients' => $_POST["idPatients"]
    ]); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat




} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


header("Location: ../listeRdv.php");
// exit;

?>

