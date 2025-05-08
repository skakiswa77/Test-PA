<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Entreprises</title>
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
            $stmt = $pdo->prepare("INSERT INTO companies (name, address, phone_number, email, subscription_plan, created_at) 
                             VALUES (:name, :address, :phone_number, :email, :subscription_plan, NOW())");

            $result = $stmt->execute([
                ':name' => $_POST['name'],
                ':address' => $_POST['address'],
                ':phone_number' => $_POST['phone_number'],
                ':email' => $_POST['email'],
                ':subscription_plan' => $_POST['subscription_plan']
            ]);

            if ($result) {
                header("Location: index.php");
                exit();
            } else {
                echo "<p style='color: red;'>Erreur lors de l'ajout de l'entreprise</p>";
            }
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Erreur: " . $e->getMessage() . "</p>";
        }
    }

    try {
        $companies = $pdo->query("SELECT id, name FROM companies ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Erreur lors de la récupération des entreprises: " . $e->getMessage() . "</p>";
        $companies = [];
    }
    ?>

    <h2>Ajouter une Entreprise</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div>
            <input type="text" name="name" placeholder="Nom de l'Entreprise" required>
        </div>
        <div>
            <input type="text" name="address" placeholder="Adresse" required>
        </div>
        <div>
            <input type="tel" name="phone_number" placeholder="Numéro de téléphone" required>
        </div>
        <div>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div>
            <input type="text" name="subscription_plan" placeholder="Plan d'abonnement" required>
        </div>
        <div>
            <select name="company_id" required>
                <option value="">Sélectionner une entreprise</option>
                <?php foreach ($companies as $company): ?>
                    <option value="<?php echo $company['id']; ?>">
                        <?php echo htmlspecialchars($company['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <button type="submit">Ajouter</button>
        </div>
    </form>
</body>

</html>