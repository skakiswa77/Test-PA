<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>

<body>

<?php
require_once '../../config/database.php';
require_once '../../composants/nav.php';

$id = $_GET['id']; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE utilisateurs SET 
                          last_name = :last_name, 
                          first_name = :first_name, 
                          date_naissance = :date_naissance, 
                          genre = :genre, 
                          lieu_naissance = :lieu_naissance, 
                          adresse = :adresse, 
                          code_postal = :code_postal, 
                          ville = :ville, 
                          telephone = :telephone, 
                          email = :email, 
                          password = :password, 
                          niveau = :niveau, 
                          archived = :archived
                          WHERE id = :id");

    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $activity['password'];
    $archived = isset($_POST['archived']) ? 1 : 0;

    $stmt->execute([
        ':last_name' => $_POST['last_name'],
        ':first_name' => $_POST['first_name'],
        ':date_naissance' => $_POST['date_naissance'],
        ':genre' => $_POST['genre'],
        ':lieu_naissance' => $_POST['lieu_naissance'],
        ':adresse' => $_POST['adresse'],
        ':code_postal' => $_POST['code_postal'],
        ':ville' => $_POST['ville'],
        ':telephone' => $_POST['telephone'],
        ':email' => $_POST['email'],
        ':password' => $password,
        ':niveau' => $_POST['niveau'],
        ':archived' => $archived,
        ':id' => $id
    ]);
    
    header("Location: index.php");
    exit();
}


$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->execute([$id]);
$activity = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<h2>Modifier l'utilisateur</h2>
<form method="POST">
    <label for="last_name">Nom</label>
    <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($activity['last_name']); ?>" required><br>

    <label for="first_name">Prénom</label>
    <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($activity['first_name']); ?>" required><br>

    <label for="date_naissance">Date de naissance</label>
    <input type="date" name="date_naissance" id="date_naissance" value="<?php echo $activity['date_naissance']; ?>" required><br>

    <label for="genre">Genre</label>
    <select name="genre" id="genre" required>
        <option value="homme" <?php echo $activity['genre'] == 'homme' ? 'selected' : ''; ?>>Homme</option>
        <option value="femme" <?php echo $activity['genre'] == 'femme' ? 'selected' : ''; ?>>Femme</option>
        <option value="autre" <?php echo $activity['genre'] == 'autre' ? 'selected' : ''; ?>>Autre</option>
    </select><br>

    <label for="lieu_naissance">Lieu de naissance</label>
    <input type="text" name="lieu_naissance" id="lieu_naissance" value="<?php echo htmlspecialchars($activity['lieu_naissance']); ?>" required><br>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse" value="<?php echo htmlspecialchars($activity['adresse']); ?>" required><br>

    <label for="code_postal">Code postal</label>
    <input type="text" name="code_postal" id="code_postal" value="<?php echo htmlspecialchars($activity['code_postal']); ?>" required><br>

    <label for="ville">Ville</label>
    <input type="text" name="ville" id="ville" value="<?php echo htmlspecialchars($activity['ville']); ?>" required><br>

    <label for="telephone">Téléphone</label>
    <input type="text" name="telephone" id="telephone" value="<?php echo htmlspecialchars($activity['telephone']); ?>" required><br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($activity['email']); ?>" required><br>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Laisser vide pour ne pas changer"><br>

    <label for="niveau">Niveau</label>
    <select name="niveau" id="niveau" required>
        <option value="CLIENT" <?php echo $activity['niveau'] == 'CLIENT' ? 'selected' : ''; ?>>Client</option>
        <option value="FOURNISSEUR" <?php echo $activity['niveau'] == 'FOURNISSEUR' ? 'selected' : ''; ?>>Fournisseur</option>
        <option value="EMPLOYÉ" <?php echo $activity['niveau'] == 'EMPLOYÉ' ? 'selected' : ''; ?>>Employé</option>
        <option value="ADMIN" <?php echo $activity['niveau'] == 'ADMIN' ? 'selected' : ''; ?>>Administrateur</option>
    </select><br>

    <label for="archived">Archiver cet utilisateur</label>
    <input type="checkbox" name="archived" id="archived" value="1" <?php echo $activity['archived'] == 1 ? 'checked' : ''; ?>><br>

    <button type="submit">Mettre à jour</button>
</form>

</body>
</html>
