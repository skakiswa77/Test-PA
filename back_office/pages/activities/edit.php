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


require_once '../../composants/nav.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE activities SET name = :name, description = :description, 
                          date = :date, location = :location WHERE id = :id");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':description' => $_POST['description'],
        ':date' => $_POST['date'],
        ':location' => $_POST['location'],
        ':id' => $id
    ]);
    header("Location: index.php");
    exit();
}
$stmt = $pdo->prepare("SELECT * FROM activities WHERE id = ?");
$stmt->execute([$id]);
$activity = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h2>Modifier l'Activité</h2>
<form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($activity['name']); ?>" required><br>
    <textarea name="description"><?php echo htmlspecialchars($activity['description']); ?></textarea><br>
    <input type="date" name="date" value="<?php echo $activity['date']; ?>" required><br>
    <input type="text" name="location" value="<?php echo htmlspecialchars($activity['location']); ?>" required><br>
    <button type="submit">Mettre à jour</button>
</form>