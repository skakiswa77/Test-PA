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
require_once '../../config/database.php';

require_once '../../composants/nav.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("UPDATE providers SET archived = 1 WHERE id = ?");
$stmt->execute([$id]);
header("Location: index.php");
exit();
?>