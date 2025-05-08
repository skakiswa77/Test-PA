<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Facture</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>

<body>

<?php
require_once '../../composants/nav.php';
require_once '../../config/database.php';


$id = $_GET['id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $pdo->prepare("UPDATE invoices SET contract_id = :contract_id, invoice_date = :invoice_date, 
                          due_date = :due_date, total_amount = :total_amount, payment_status = :payment_status
                          WHERE id = :id");
    $stmt->execute([
        ':contract_id' => $_POST['contract_id'],
        ':invoice_date' => $_POST['invoice_date'],
        ':due_date' => $_POST['due_date'],
        ':total_amount' => $_POST['total_amount'],
        ':payment_status' => $_POST['payment_status'],
        ':id' => $id
    ]);

    header("Location: index.php");
    exit();
}


$stmt = $pdo->prepare("SELECT * FROM invoices WHERE id = ?");
$stmt->execute([$id]);
$invoice = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h2>Modifier une Facture</h2>
<form method="POST">
    <label for="contract_id">ID du Contrat</label>
    <input type="number" name="contract_id" id="contract_id" value="<?php echo htmlspecialchars($invoice['contract_id']); ?>" required><br>

    <label for="invoice_date">Date de Facture</label>
    <input type="date" name="invoice_date" id="invoice_date" value="<?php echo $invoice['invoice_date']; ?>" required><br>

    <label for="due_date">Date Limite de Paiement</label>
    <input type="date" name="due_date" id="due_date" value="<?php echo $invoice['due_date']; ?>" required><br>

    <label for="total_amount">Montant Total</label>
    <input type="number" name="total_amount" id="total_amount" value="<?php echo $invoice['total_amount']; ?>" required><br>

    <label for="payment_status">Statut du Paiement</label>
    <select name="payment_status" id="payment_status" required>
        <option value="Pending" <?php if($invoice['payment_status'] == 'Pending') echo 'selected'; ?>>En attente</option>
        <option value="Paid" <?php if($invoice['payment_status'] == 'Paid') echo 'selected'; ?>>Payée</option>
        <option value="Cancelled" <?php if($invoice['payment_status'] == 'Cancelled') echo 'selected'; ?>>Annulée</option>
    </select><br>

    <button type="submit">Mettre à jour la Facture</button>
</form>

</body>
</html>
