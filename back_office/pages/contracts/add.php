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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $stmt = $pdo->prepare("INSERT INTO contracts (company_id, start_date, end_date, total_price, payment_status) 
                          VALUES (:company_id, :start_date, :end_date, :total_price, :payment_status)");

    $stmt->execute([
        ':company_id' => $_POST['company_id'],     
        ':start_date' => $_POST['start_date'],      
        ':end_date' => $_POST['end_date'],          
        ':total_price' => $_POST['total_price'],   
        ':payment_status' => $_POST['payment_status'] 
    ]);

   
    header("Location: index.php");
    exit();
}
?>

<h2>Ajouter un Contrat</h2>
<form method="POST">
    <input type="number" name="company_id" placeholder="ID de la société cliente" required><br>
    <input type="date" name="start_date" required><br>
    <input type="date" name="end_date"><br> 
    <input type="number" name="total_price" step="0.01" placeholder="Prix total" required><br>
    
    <label>Statut du paiement:</label><br>
    <select name="payment_status" required>
        <option value="Pending">En attente</option>
        <option value="Paid">Payé</option>
        <option value="Cancelled">Annulé</option>
    </select><br>
    
    <button type="submit">Ajouter le contrat</button>
</form>

</body>
</html>
