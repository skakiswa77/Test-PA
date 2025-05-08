<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Employés</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>

<body>
    <?php
    require_once '../../composants/nav.php';

    require_once '../../config/database.php';


    if (!$pdo) {
        die("Erreur de connexion à la base de données");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $stmt = $pdo->prepare("INSERT INTO employees (first_name, last_name, email, created_at) 
                              VALUES (:first_name, :last_name, :email, NOW())");

            $result = $stmt->execute([
                ':first_name' => $_POST['first_name'],
                ':last_name' => $_POST['last_name'],
                ':email' => $_POST['email']
            ]);

            if ($result) {
                header("Location: index.php");
                exit();
            } else {
                echo "<p style='color: red;'>Erreur lors de l'ajout de l'employé</p>";
            }
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Erreur: " . $e->getMessage() . "</p>";
        }
    }
    ?>

    <h2>Ajouter un Employé</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div>
            <input type="text" name="first_name" placeholder="Prénom" required>
        </div>
        <div>
            <input type="text" name="last_name" placeholder="Nom" required>
        </div>
        <div>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div>
            <button type="submit">Ajouter</button>
        </div>
    </form>

</body>

</html>