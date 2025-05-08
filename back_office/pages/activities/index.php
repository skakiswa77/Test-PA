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
require_once '../../config/database.php';
$stmt = $pdo->query("SELECT * FROM activities WHERE archived = 0");
$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require_once '../../composants/nav.php';
?>

<h2>Gestion des Activités</h2>
<a href="add.php">Ajouter une activité</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Date</th>
        <th>Lieu</th>
        <th>Date de création</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($activities as $activity): ?>
        <tr>
            <td><?php echo $activity['id']; ?></td>
            <td><?php echo htmlspecialchars($activity['name']); ?></td>
            <td><?php echo $activity['date']; ?></td>
            <td><?php echo htmlspecialchars($activity['location']); ?></td>
            <td><?php echo $activity['created_at']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $activity['id']; ?>">Modifier</a>
                <a href="archive.php?id=<?php echo $activity['id']; ?>"
                    onclick="return confirm('Voulez-vous vraiment archiver?')">Archiver</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>