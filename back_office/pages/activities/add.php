<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Activités</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body></body>
</html>

<?php

require_once '../../composants/nav.php';


require_once '../../config/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO activities (name, description, date, location, created_at) 
                          VALUES (:name, :description, :date, :location, NOW())");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':description' => $_POST['description'],
        ':date' => $_POST['date'],
        ':location' => $_POST['location']
    ]);
    header("Location: index.php");
    exit();
}
?>
<h2>Ajouter une Activité</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Nom" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input type="date" name="date" required><br>
    <input type="text" name="location" placeholder="Lieu" required><br>
    <button type="submit">Ajouter</button>
</form>