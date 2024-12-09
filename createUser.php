<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <form action="./process/processCreate.php" method="post" class="container">

        <label for="nom">Nom : </label>
        <input type="text" name="lastname" id="nom">

        <label for="prenom">Prenom : </label>
        <input type="text" name="firstname" id="prenom">

        <label for="birthdate">Date d'anniversaire : </label>
        <input type="date" name="birthdate" id="anniv">
        
        <label for="phone">Numéro de téléphone : </label>
        <input type="tel" name="phone" id="tel">

        <label for="mail">Adresse mail : </label>
        <input type="tel" name="mail" id="mail">


        <input type="submit" value="Creer utilisateur">
    </form>
</body>

</html>