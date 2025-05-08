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


require_once '../../composants/nav.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE providers SET name = :name, phone_number = :phone_number,
                          service_type = :service_type, hourly_rate = :hourly_rate WHERE id = :id");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':phone_number' => $_POST['phone_number'],
        ':service_type' => $_POST['service_type'],
        ':hourly_rate' => $_POST['hourly_rate'],
        ':id' => $id
    ]);
    header("Location: index.php");
    exit();
}
$stmt = $pdo->prepare("SELECT * FROM providers WHERE id = ?");
$stmt->execute([$id]);
$providy = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h2>Modifier les Fournisseurs</h2>
<form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($providy['name']); ?>" required><br>
    <input type="tel" name="phone_number" value="<?php echo $providy['phone_number']; ?>" required><br>
    <input type="text" name="service_type" value="<?php echo htmlspecialchars($providy['service_type']); ?>" required><br>
    <input type="number" name="hourly_rate" value="<?php echo $providy['hourly_rate']; ?>" required><br>
    <button type="submit">Mettre à jour</button>
</form>