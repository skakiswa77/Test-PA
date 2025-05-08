<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Employés</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body></body>
</html>

<?php
require_once '../../composants/nav.php';

require_once '../../config/database.php';
$stmt = $pdo->query("SELECT * FROM employees WHERE archived = 0");
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Gestion des Employés</h2>
<a href="add.php">Ajouter un employé</a>
<table>
    <tr>
        <th>ID</th><th>Prénom</th><th>Nom</th><th>Email</th><th>Actions</th>
    </tr>
    <?php foreach ($employees as $employe): ?>
    <tr>
        <td><?php echo $employe['id']; ?></td>
        <td><?php echo htmlspecialchars($employe['first_name']); ?></td>
        <td><?php echo htmlspecialchars($employe['last_name']); ?></td>
        <td><?php echo htmlspecialchars($employe['email']); ?></td>
        <td>
            <a href="edit.php?id=<?php echo $employe['id']; ?>">Modifier</a>
            <a href="archive.php?id=<?php echo $employe['id']; ?>" 
               onclick="return confirm('Voulez-vous vraiment archiver?')">Archiver</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>