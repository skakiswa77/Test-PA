<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Entreprises</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body></body>
</html>

<?php
require_once '../../composants/nav.php';

require_once '../../config/database.php';
$stmt = $pdo->query("SELECT * FROM companies WHERE archived = 0");
$companies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Gestion des Entreprises</h2>
<a href="add.php">Ajouter une Entreprise</a>
<table>
    <tr>
        <th>ID</th><th>Nom</th><th>Addresse</th><th>Numéro</th><th>Email</th><th>Plan d'abonnement</th><th>Actions</th>
    </tr>
    <?php foreach ($companies as $company): ?>
    <tr>
        <td><?php echo $company['id']; ?></td>
        <td><?php echo htmlspecialchars($company['name']); ?></td>
        <td><?php echo htmlspecialchars($company['address']); ?></td>
        <td><?php echo $company['phone_number']; ?></td>
        <td><?php echo htmlspecialchars($company['email']); ?></td>
        <td><?php echo htmlspecialchars($company['subscription_plan']); ?></td>
        <td>
            <a href="edit.php?id=<?php echo $company['id']; ?>">Modifier</a>
            <a href="archive.php?id=<?php echo $company['id']; ?>" 
               onclick="return confirm('Voulez-vous vraiment archiver?')">Archiver</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>