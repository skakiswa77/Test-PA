<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Fournisseurs</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body></body>
</html>

<?php

require_once '../../composants/nav.php';


require_once '../../config/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO providers (name, email, phone_number, service_type, hourly_rate, created_at) 
                          VALUES (:name, :email, :phone_number, :hourly_rate, NOW())");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':phone_number' => $_POST['phone_number'],
        ':service_type' => $_POST['service_type'],
        ':hourly_rate' => $_POST['hourly_rate']

    ]);
    header("Location: index.php");
    exit();
}
?>
<h2>Ajouter un fournisseur</h2>
<form method="POST">
    <input type="text" name="name" placeholder="name" required><br>
    <input type="tel" name="phone_number" placeholder="phone_number" required><br>
    <input type="text" name="service_type" placeholder="service_type" required><br>
    <input type="number" name="hourly_rate" placeholder="hourly_rate" required><br>
    <button type="submit">Ajouter</button>
</form>