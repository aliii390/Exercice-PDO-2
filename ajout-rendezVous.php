<?php
require_once './connect.php';

$sql = "SELECT * FROM patients";

try {

  $stmt = $pdo->query($sql);
  $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
  echo 'ERREUR lors de la requete : ' . $error->getMessage();
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire Rendez-vous</title>
  <link rel="stylesheet" href="./css/ajoutRdv.css">
</head>

<body>
  <div class="form-container">
    <form class="appointment-form" action="./process/processCreateRdv.php" method="post">
      <h2>Ajouter un Rendez-vous</h2>

      <div class="form-group">
        <label for="idPatients">Nom</label>
        <select name="idPatients" id="idPatients">
          <?php
          foreach ($patients as $patient) {
          ?>
            <option value="<?= $patient['id'] ?>"><?= $patient['lastname'] ?> <?= $patient['firstname'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>

      <!-- <div class="form-group">
        <label for="email">Prénom</label>
        <input type="email" name="idPatients" id="email" placeholder="Votre email" required>
      </div> -->

      <div class="form-group">
        <label for="date">Date</label>
        <input type="datetime-local" name="dateHour" id="date" required>
      </div>

      <!-- <div class="form-group">
        <label for="time">Heure</label>
        <input type="time" id="time" required>
      </div>

      <div class="form-group">
        <label for="details">Détails</label>
        <textarea id="details" rows="4" placeholder="Détails supplémentaires..."></textarea>
      </div> -->

      <button type="submit">Ajouter</button>
    </form>
  </div>
</body>

</html>