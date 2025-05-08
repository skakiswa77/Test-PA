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
$stmt = $pdo->query("SELECT * FROM providers WHERE archived = 0");
$providers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require_once '../../composants/nav.php';
?>

<h2>Gestion des Fournisseurs</h2>
<a href="add.php">Ajouter un fournisseur</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Numéro de téléphone</th>
        <th>Type de service</th>
        <th>Tarif horaire</th>
        <th>Crée le</th>

    </tr>
    <?php foreach ($providers as $providy): ?>
        <tr>
            <td><?php echo $providy['id']; ?></td>
            <td><?php echo htmlspecialchars($providy['name']); ?></td>
            <td><?php echo ($providy['phone_number']); ?></td>
            <td><?php echo htmlspecialchars($providy['service_type']); ?></td>
            <td><?php echo ($providy['hourly_rate']); ?></td>
            <td><?php echo $providy['created_at']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $providy['id']; ?>">Modifier</a>
                <a href="archive.php?id=<?php echo $providy['id']; ?>"
                    onclick="return confirm('Voulez-vous vraiment archiver?')">Archiver</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>