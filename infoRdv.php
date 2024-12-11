<?php
require_once './connect.php';

if (isset($_GET['rdv'])) {

    $idRdv = $_GET['rdv'];

    $sql = "SELECT * FROM appointments WHERE id = :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $idRdv]);
        $rdv = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        echo "Erreur lors de la requête : " . $error->getMessage();
    }
} else {
    die('ID Invalide ou non spécifié');
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
        <?php if (isset($rdv) && !empty($rdv)): ?> <!-- si sa existe il ce passe saaa -->
            <ul>
                <li> Heure du rdv : <?= $rdv['dateHour'] ?></li>

            </ul>

        <?php else: ?> <!-- si la condit exste pas il ce passe sa  -->
            <p>Rendez-vous non trouvé avec cet ID.</p>
        <?php endif; ?> <!-- d'apres de ce que j'ai compris endif sert  a fermer le bloc if-else -->
    </div>


    <!-- Bouton pour afficher le formulaire -->
    <button onclick="showEditForm()">Modifiez les informations du rendez vous</button>

    <!-- Formulaire -->
    <div id="editForm" style="display: none;">
        <h2>Modifiez les informations du rendez-vous</h2>
        <form action="./modifRdv.php" method="POST">
            <input type="hidden" name="id" value="<?= $rdv['id'] ?>">

            <label for="dateHour"> Heure du rdv:</label>
            <input type="datetime-local" id="dateHour" name="dateHour" value="<?= $rdv['dateHour'] ?>" required><br>
            
            <label for="idPatients">ID Patient :</label>
            <input type="text" name="idPatients" id="idPatients" required >

            <!-- <label for="idPatients">Nom du client</label>
            <input type="text" id="idPatients" name="idPatients" value="" required><br> -->




            <button type="submit">Enregistrer les modifications</button>


        </form>
    </div>


    <script>
        // Function to show the edit form
        // Fonction pour afficher/masquer le formulaire
        function showEditForm() {
            var form = document.getElementById('editForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>








    <!-- style css pour le 2ème formulaire -->
    <style>
        /* Style pour le conteneur du formulaire */
        #editForm {
            display: none;
            /* Masqué par défaut */
            position: relative;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.2);
            /* Effet verre */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            /* Flou */
            -webkit-backdrop-filter: blur(10px);
            /* Flou pour Safari */
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            font-family: Arial, sans-serif;
        }

        /* Style des champs de formulaire */
        #editForm input,
        #editForm label,
        #editForm button {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }

        /* Style des labels */
        #editForm label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #fff;
        }

        /* Style des champs input */
        #editForm input {
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            outline: none;
        }

        /* Effet au focus sur les inputs */
        #editForm input:focus {
            border-color: #88d9e6;
        }

        /* Style du bouton */
        #editForm button {
            padding: 10px;
            background: linear-gradient(135deg, #88d9e6, #56cfe1);
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s, background-color 0.2s;
        }

        #editForm button:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #56cfe1, #48bfe3);
        }

        /* Style du bouton d'activation */
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            border-radius: 8px;
            background: linear-gradient(135deg, #88d9e6, #56cfe1);
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s, background-color 0.2s;
        }

        button:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #56cfe1, #48bfe3);
        }
    </style>

    <!-- fin du css -->

</body>

</html>