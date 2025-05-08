<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Factures</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>

<body>

<?php
require_once '../../config/database.php';

$stmt = $pdo->query("SELECT * FROM invoices WHERE archived = 0");
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require_once '../../composants/nav.php';
?>

<h2>Gestion des Factures</h2>
<a href="add.php">Ajouter une facture</a>
<table>
    <tr>
        <th>ID</th>
        <th>ID du Contrat</th>
        <th>Date de Facture</th>
        <th>Date Limite de Paiement</th>
        <th>Montant Total</th>
        <th>Statut du Paiement</th>
        <th>Date de Création</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($invoices as $invoice): ?>
        <tr>
            <td><?php echo $invoice['id']; ?></td>
            <td><?php echo $invoice['contract_id']; ?></td>
            <td><?php echo $invoice['invoice_date']; ?></td>
            <td><?php echo $invoice['due_date']; ?></td>
            <td><?php echo $invoice['total_amount']; ?></td>
            <td><?php echo htmlspecialchars($invoice['payment_status']); ?></td>
            <td><?php echo $invoice['created_at']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $invoice['id']; ?>">Modifier</a>
                <a href="archive.php?id=<?php echo $invoice['id']; ?>"
                    onclick="return confirm('Voulez-vous vraiment archiver cette facture?')">Archiver</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
