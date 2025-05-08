<?php
require_once '../config/database.php';

try {
    $stmt_activities = $pdo->query("SELECT COUNT(*) as total FROM activities WHERE archived = 0");
    $activities_count = $stmt_activities->fetch(PDO::FETCH_ASSOC)['total'];

    $stmt_companies = $pdo->query("SELECT COUNT(*) as total FROM companies WHERE archived = 0");
    $companies_count = $stmt_companies->fetch(PDO::FETCH_ASSOC)['total'];

    $stmt_employees = $pdo->query("SELECT COUNT(*) as total FROM employees WHERE archived = 0");
    $employees_count = $stmt_employees->fetch(PDO::FETCH_ASSOC)['total'];

    $stmt_providers = $pdo->query("SELECT COUNT(*) as total FROM providers WHERE archived = 0");
    $providers_count = $stmt_providers->fetch(PDO::FETCH_ASSOC)['total'];

    $stmt_users = $pdo->query("SELECT COUNT(*) as total FROM utilisateurs WHERE archived = 0");
    $users_count = $stmt_users->fetch(PDO::FETCH_ASSOC)['total'];

    $stmt_contracts = $pdo->query("SELECT COUNT(*) as total FROM contracts WHERE archived = 0");
    $users_contracts = $stmt_contracts->fetch(PDO::FETCH_ASSOC)['total'];

    $stmt_invoices = $pdo->query("SELECT COUNT(*) as total FROM invoices WHERE archived = 0");
    $users_invoices = $stmt_invoices->fetch(PDO::FETCH_ASSOC)['total'];

    $stmt_recent_activities = $pdo->query("SELECT name, date FROM activities WHERE archived = 0 ORDER BY date DESC LIMIT 3");
    $recent_activities = $stmt_recent_activities->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Back Office - Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <h1>Back Office - Gestion de Businness Care</h1>
    <nav>
        <a href="activities/index.php">Gestion des Activités</a> |
        <a href="companies/index.php">Gestion des Entreprises</a> |
        <a href="employees/index.php">Gestion des Employés</a> |
        <a href="providers/index.php">Gestion des Fournisseurs</a> |
        <a href="users/index.php">Gestion des Administrateurs</a> |
        <a href="contracts/index.php">Gestion des Contrats</a> |
        <a href="invoices/index.php">Gestion des Factures</a> 

    </nav>
    <div>
        <h2>Bienvenue dans le Back Office</h2>
        <p>Utilisez le menu pour gérer les différentes sections.</p>
    </div>

    <main>
    
        <section class="dashboard-stats">
            <div class="stats-container">
                <div class="stat-card">
                    <h3>Activités Actives</h3>
                    <p><?php echo $activities_count; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Entreprises Actives</h3>
                    <p><?php echo $companies_count; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Salariés Actifs</h3>
                    <p><?php echo $employees_count; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Fournisseurs Actifs</h3>
                    <p><?php echo $providers_count; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Utilisateurs Actifs</h3>
                    <p><?php echo $users_count; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Contrats Actifs</h3>
                    <p><?php echo $users_count; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Factures Actifs</h3>
                    <p><?php echo $users_count; ?></p>
                </div>
            </div>
        </section>


        <section class="recent-activities">
            <h2>Dernières Activités Ajoutées</h2>
            <?php if (empty($recent_activities)): ?>
                <p>Aucune activité récente à afficher.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($recent_activities as $activity): ?>
                        <li>
                            <?php echo htmlspecialchars($activity['name']); ?> 
                            - <?php echo date('d/m/Y', strtotime($activity['date'])); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>


        <section class="quick-actions">
            <h2>Actions Rapides</h2>
            <div class="actions-container">
                <a href="activities/add.php" class="action-btn">Ajouter une Activité</a>
                <a href="companies/add.php" class="action-btn">Ajouter une Entreprise</a>
                <a href="employees/add.php" class="action-btn">Ajouter un Salarié</a>
                <a href="providers/add.php" class="action-btn">Ajouter un Fournisseur</a>
                <a href="users/add.php" class="action-btn">Ajouter un Utilisateur</a>
                <a href="contracts/add.php" class="action-btn">Ajouter un Contrat</a>
                <a href="invoices/add.php" class="action-btn">Ajouter une Facture</a>

            </div>
        </section>
    </main>
</body>
</html>
</body>
</html>