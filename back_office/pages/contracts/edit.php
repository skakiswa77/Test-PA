<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Contrat</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>

<body>

<?php
require_once '../../composants/nav.php';
require_once '../../config/database.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $pdo->prepare("UPDATE contracts SET company_id = :company_id, start_date = :start_date, 
                          end_date = :end_date, total_price = :total_price, payment_status = :payment_status 
                          WHERE id = :id");

    $stmt->execute([
        ':company_id' => $_POST['company_id'],
        ':start_date' => $_POST['start_date'],
        ':end_date' => $_POST['end_date'],
        ':total_price' => $_POST['total_price'],
        ':payment_status' => $_POST['payment_status'],
        ':id' => $id
    ]);

    header("Location: index.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM contracts WHERE id = ?");
$stmt->execute([$id]);
$contract = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h2>Modifier le Contrat</h2>
<form method="POST">
    <input type="number" name="company_id" value="<?php echo $contract['company_id']; ?>" placeholder="ID de la société cliente" required><br>
    <input type="date" name="start_date" value="<?php echo $contract['start_date']; ?>" required><br>
    <input type="date" name="end_date" value="<?php echo $contract['end_date']; ?>"><br> 
    <input type="number" name="total_price" step="0.01" value="<?php echo $contract['total_price']; ?>" placeholder="Prix total" required><br>
    
    <label>Statut du paiement :</label><br>
    <select name="payment_status" required>
        <option value="Pending" <?php echo $contract['payment_status'] == 'Pending' ? 'selected' : ''; ?>>En attente</option>
        <option value="Paid" <?php echo $contract['payment_status'] == 'Paid' ? 'selected' : ''; ?>>Payé</option>
        <option value="Cancelled" <?php echo $contract['payment_status'] == 'Cancelled' ? 'selected' : ''; ?>>Annulé</option>
    </select><br>

    <button type="submit">Mettre à jour le contrat</button>
</form>

</body>
</html>
