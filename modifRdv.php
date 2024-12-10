<?php 

require_once './connect.php';


$dateHour = $_POST["dateHour"];
$idPatients = $_POST["idPatients"];





// $sql = "update patients set lastname ='$lastName', firstname ='$firstName', phone ='$phone', mail ='$mail', birthdate ='$birthdate' FROM WHERE id LIKE {$id};";

$stmt = $pdo->prepare("update appointments set dateHour ='$dateHour', idPatients ='$idPatients', WHERE id LIKE {$id};");
$stmt -> execute();

// $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");






// try {
//     $stmt = $pdo->query($sql);
//     $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch patient details

// } catch (PDOException $error) {
//     echo "Erreur lors de la requete : " . $error->getMessage();
// }

header('Location: ./listeRdv.php');



?>