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
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE companies SET name = :name, address = :address, 
                          phone_number = :phone_number, email = :email, subscription_plan = :subscription_plan WHERE id = :id");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':address' => $_POST['address'],
        ':phone_number' => $_POST['phone_number'],
        ':email' => $_POST['email'],
        ':subscription_plan' => $_POST['subscription_plan'],
        ':id' => $id
    ]);
    header("Location: index.php");
    exit();
}
$stmt = $pdo->prepare("SELECT * FROM companies WHERE id = ?");
$stmt->execute([$id]);
$company = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h2>Modifier l'Entreprise</h2>
<form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($company['name']); ?>" required><br>
    <input type="text" name="address" value="<?php echo htmlspecialchars($company['address']); ?>" required><br>
    <input type="number" name="phone_number" value="<?php echo $company['phone_number']; ?>" required><br>
    <input type="text" name="email" value="<?php echo htmlspecialchars($company['email']); ?>" required><br>
    <input type="text" name="subscription_plan" value="<?php echo htmlspecialchars($company['subscription_plan']); ?>" required><br>
    <button type="submit">Mettre à jour</button>
</form>