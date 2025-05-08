<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Contrats</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>

<body>

<?php
require_once '../../composants/nav.php';
require_once '../../config/database.php';

$stmt = $pdo->query("SELECT * FROM contracts WHERE archived = 0");
$contracts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Gestion des Contrats</h2>
<a href="add.php">Ajouter un contrat</a>
<table>
    <tr>
        <th>ID</th>
        <th>Société</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Prix total</th>
        <th>Statut du paiement</th>
        <th>Date de création</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($contracts as $contract): ?>
        <tr>
            <td><?php echo $contract['id']; ?></td>
            <td><?php echo $contract['company_id']; ?></td> 
            <td><?php echo $contract['start_date']; ?></td>
            <td><?php echo $contract['end_date'] ? $contract['end_date'] : 'Non spécifiée'; ?></td> 
            <td><?php echo number_format($contract['total_price'], 2, ',', ' '); ?> €</td> 
            <td><?php echo $contract['payment_status']; ?></td>
            <td><?php echo $contract['created_at']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $contract['id']; ?>">Modifier</a>
                <a href="archive.php?id=<?php echo $contract['id']; ?>"
                    onclick="return confirm('Voulez-vous vraiment archiver?')">Archiver</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
