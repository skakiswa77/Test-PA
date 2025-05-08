<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>

<?php
require_once '../../composants/nav.php';
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $date_naissance = $_POST['date_naissance'];
    $genre = $_POST['genre'];
    $lieu_naissance = $_POST['lieu_naissance'];
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $niveau = $_POST['niveau'];

  
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (last_name, first_name, date_naissance, genre, lieu_naissance, adresse, code_postal, ville, telephone, email, password, niveau, created_at) 
                          VALUES (:last_name, :first_name, :date_naissance, :genre, :lieu_naissance, :adresse, :code_postal, :ville, :telephone, :email, :password, :niveau, NOW())");


    $stmt->execute([
        ':last_name' => $last_name,
        ':first_name' => $first_name,
        ':date_naissance' => $date_naissance,
        ':genre' => $genre,
        ':lieu_naissance' => $lieu_naissance,
        ':adresse' => $adresse,
        ':code_postal' => $code_postal,
        ':ville' => $ville,
        ':telephone' => $telephone,
        ':email' => $email,
        ':password' => password_hash($password, PASSWORD_DEFAULT),  
        ':niveau' => $niveau
    ]);


    header("Location: index.php");
    exit();
}
?>

<h2>Ajouter un utilisateur</h2>
<form method="POST">
    <label for="last_name">Nom</label>
    <input type="text" name="last_name" id="last_name" placeholder="Nom" required><br>

    <label for="first_name">Prénom</label>
    <input type="text" name="first_name" id="first_name" placeholder="Prénom" required><br>

    <label for="date_naissance">Date de naissance</label>
    <input type="date" name="date_naissance" id="date_naissance" required><br>

    <label for="genre">Genre</label>
    <select name="genre" id="genre" required>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
        <option value="autre">Autre</option>
    </select><br>

    <label for="lieu_naissance">Lieu de naissance</label>
    <input type="text" name="lieu_naissance" id="lieu_naissance" placeholder="Lieu de naissance" required><br>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse" placeholder="Adresse" required><br>

    <label for="code_postal">Code postal</label>
    <input type="text" name="code_postal" id="code_postal" placeholder="Code postal" required><br>

    <label for="ville">Ville</label>
    <input type="text" name="ville" id="ville" placeholder="Ville" required><br>

    <label for="telephone">Téléphone</label>
    <input type="text" name="telephone" id="telephone" placeholder="Téléphone" required><br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Email" required><br>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Mot de passe" required><br>

    <label for="niveau">Niveau</label>
    <select name="niveau" id="niveau" required>
        <option value="CLIENT">Client</option>
        <option value="FOURNISSEUR">Fournisseur</option>
        <option value="EMPLOYÉ">Employé</option>
        <option value="ADMIN">Administrateur</option>
    </select><br>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>
