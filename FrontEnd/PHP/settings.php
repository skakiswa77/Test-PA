<?php
session_start();
require_once '../../../utils/database.php';


$id = $_SESSION['id'];
$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres du Compte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .profil-settings {
            text-align: center;
            margin-bottom: 30px;
        }

        .profil-settings img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profil-settings p {
            font-size: 16px;
            margin: 5px 0;
        }

        form {
            background-color: white;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form h3 {
            color: #555;
            font-size: 18px;
            margin-bottom: 15px;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        form button {
            background-color:rgb(35, 126, 168);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        form button:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 20px;
        }
        
        @media (max-width: 600px) {
            .profil-settings img {
                width: 80px;
                height: 80px;
            }

            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<h2>Paramètres du Compte</h2>

<div class="profil-settings">
    <img src="<?php echo htmlspecialchars($user['photo'] ?? 'default.jpg'); ?>" alt="Photo de profil" style="width:100px; border-radius:50%;">
    <p><strong>Nom :</strong> <?php echo htmlspecialchars($user['last_name']); ?></p>
    <p><strong>Email :</strong> <?php echo htmlspecialchars($user['email']); ?></p>
</div>

<form method="POST" action="update_email.php">
    <h3>Changer l'email</h3>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
    <button type="submit">Mettre à jour l'email</button>
</form>

<form method="POST" action="update_password.php">
    <h3>Changer le mot de passe</h3>
    <input type="password" name="current_password" placeholder="Mot de passe actuel" required>
    <input type="password" name="new_password" placeholder="Nouveau mot de passe" required>
    <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
    <button type="submit">Changer le mot de passe</button>
</form>

<form method="POST" action="upload_photo.php" enctype="multipart/form-data">
    <h3>Mettre à jour la photo de profil</h3>
    <input type="file" name="photo" accept="image/*" required>
    <button type="submit">Envoyer</button>
</form>

</body>
</html>


