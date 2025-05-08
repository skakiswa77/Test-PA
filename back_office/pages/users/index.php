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
require_once '../../config/database.php';

$stmt = $pdo->query("SELECT * FROM utilisateurs WHERE archived = 0");
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require_once '../../composants/nav.php';
?>

<h2>Gestion des Utilisateurs</h2>
<a href="add.php">Ajouter un utilisateur</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Genre</th>
        <th>Lieu de naissance</th>
        <th>Adresse</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Niveau</th>
        <th>Date de création</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($activities as $activity): ?>
        <tr>
            <td><?php echo $activity['id']; ?></td>
            <td><?php echo htmlspecialchars($activity['last_name']); ?></td>
            <td><?php echo htmlspecialchars($activity['first_name']); ?></td>
            <td><?php echo htmlspecialchars($activity['date_naissance']); ?></td>
            <td><?php echo htmlspecialchars($activity['genre']); ?></td>
            <td><?php echo htmlspecialchars($activity['lieu_naissance']); ?></td>
            <td><?php echo htmlspecialchars($activity['adresse']); ?></td>
            <td><?php echo htmlspecialchars($activity['email']); ?></td>
            <td><?php echo htmlspecialchars($activity['telephone']); ?></td>
            <td><?php echo htmlspecialchars($activity['niveau']); ?></td>
            <td><?php echo $activity['created_at']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $activity['id']; ?>">Modifier</a>
                <a href="archive.php?id=<?php echo $activity['id']; ?>"
                   onclick="return confirm('Voulez-vous vraiment archiver cet utilisateur ?')">Archiver</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
