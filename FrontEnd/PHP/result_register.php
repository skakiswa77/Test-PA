<?php
require_once '../../../utils/database.php';

$success = false;
$message = '';
$message_color = 'red';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        $last_name = isset($_POST['last_name']) ? trim(htmlspecialchars($_POST['last_name'])) : '';
        $first_name = isset($_POST['first_name']) ? trim(htmlspecialchars($_POST['first_name'])) : '';

        $jour = isset($_POST['jour']) ? (int)$_POST['jour'] : 0;
        $mois = isset($_POST['mois']) ? (int)$_POST['mois'] : 0;
        $annee = isset($_POST['annee']) ? (int)$_POST['annee'] : 0;
        $date_naissance = ($jour && $mois && $annee) ? sprintf("%04d-%02d-%02d", $annee, $mois, $jour) : null;

        $genre = isset($_POST['genre']) ? trim(htmlspecialchars($_POST['genre'])) : '';
        $lieu_naissance = isset($_POST['lieu_naissance']) ? trim(htmlspecialchars($_POST['lieu_naissance'])) : '';
        $adresse = isset($_POST['adresse']) ? trim(htmlspecialchars($_POST['adresse'])): '';
        $code_postal = isset($_POST['code_postal']) ? trim(htmlspecialchars($_POST['code_postal'])) : '';
        $ville = isset($_POST['ville']) ? trim(htmlspecialchars($_POST['ville'])) : '';
        $telephone = isset($_POST['telephone']) ? trim(htmlspecialchars($_POST['telephone'])) : '';
        $email = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
        $password = isset($_POST['password']) ? password_hash(trim($_POST['password']), PASSWORD_DEFAULT) : '';
        $niveau = isset($_POST['niveau']) ? (is_array($_POST['niveau']) ? implode(',', $_POST['niveau']) : trim(htmlspecialchars($_POST['niveau']))) : '';

        if (empty($last_name) || empty($first_name) || empty($date_naissance) || empty($genre) || empty($lieu_naissance) || 
            empty($adresse) || empty($code_postal) || empty($ville) || empty($telephone) || 
            empty($email) || empty($password) || empty($niveau)
            ) {
            throw new Exception("Tous les champs obligatoires doivent être remplis.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Adresse email invalide.");
        }

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = :email");
        $stmt->execute([':email' => $email]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Cet email est déjà utilisé.");
        }

        $stmt = $pdo->prepare("
            INSERT INTO utilisateurs (
                last_name, first_name, date_naissance, genre, lieu_naissance, adresse, code_postal, ville, telephone, email, password, niveau, created_at
            ) VALUES (
                :last_name, :first_name, :date_naissance, :genre, :lieu_naissance, :adresse, :code_postal, :ville, :telephone, :email, :password, :niveau, NOW()
            )
        ");
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
            ':password' => $password,
            ':niveau' => $niveau
        ]);

        if ($pdo->lastInsertId() > 0) {
            $success = true;
            $message = "Inscription réussie ! Bienvenue, $first_name $last_name. Veuillez vous connecter avec votre compte.";
            $message_color = "green";
        } else {
            throw new Exception("Échec de l'insertion dans la base de données.");
        }
    } catch (Exception $e) {
        $message = "Erreur lors de l'inscription : " . $e->getMessage();
        $message_color = "red";
    }
} else {
    $message = "Aucune donnée soumise. Veuillez remplir le formulaire.";
    $message_color = "red";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de l'Inscription</title>
    <style>
        body {
            background-color: #d2d7e0;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 20px;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .result-container {
            max-width: 600px;
            width: 100%;
            background-color: #00CFFF;
            padding: 20px;
            border-radius: 35px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
        }
        .message {
            font-size: 18px;
            margin: 20px 0;
        }
        .back-button, .login-button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin: 10px;
        }
        .back-button:hover, .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a href="index.php" class="back-button">Retour</a>

    <div class="result-container">
        <h1>Résultat de l'Inscription</h1>
        <p class="message" style="color: <?php echo $message_color; ?>;">
            <?php echo $message; ?>
        </p>
        <?php if ($success): ?>
            <a href="login.php" class="login-button">Se connecter</a>
        <?php endif; ?>
    </div>
</body>
</html>