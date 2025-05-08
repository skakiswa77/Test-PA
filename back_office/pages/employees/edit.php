<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Employés</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body></body>
</html>

<?php
require_once '../../composants/nav.php';

require_once '../../config/database.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE employees SET first_name = :first_name, last_name = :last_name, 
                          email = :email WHERE id = :id");
    $stmt->execute([
        ':first_name' => $_POST['first_name'],
        ':last_name' => $_POST['last_name'],
        ':email' => $_POST['email'],
        ':id' => $id
    ]);
    header("Location: index.php");
    exit();
}
$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->execute([$id]);
$employe = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h2>Modifier les employés</h2>
<form method="POST">
    <input type="text" name="first_name" value="<?php echo htmlspecialchars($employe['first_name']); ?>" required><br>
    <input type="text" name="last_name" value="<?php echo htmlspecialchars($employe['last_name']); ?>" required><br>
    <input type="text" name="email" value="<?php echo htmlspecialchars($employe['email']); ?>" required><br>
    <button type="submit">Mettre à jour</button>
</form>