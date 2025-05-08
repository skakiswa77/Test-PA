<?php
session_start();
require_once '../../../utils/database.php'; 


$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$niveau = $_POST['niveau'] ?? '';
$secret_code = $_POST['secret_code'] ?? '';


if (empty($email) || empty($password) || empty($niveau)) {
    header('Location: login.php?error=1');
    exit;
}


$request = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email AND niveau = :niveau");
$request->bindParam(':email', $email);
$request->bindParam(':niveau', $niveau);
$request->execute();
$user = $request->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {

    if ($niveau === 'ADMINISTRATEUR') {
        if ($secret_code !== '54892') { 
            echo "<p style='color:red;'>Code secret incorrect pour l'administrateur.</p>";
            echo "<a href='login.php'>Retour</a>";
            exit;
        }
    }


    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['nom'] = $user['last_name'] ?? '';
    $_SESSION['niveau'] = $user['niveau'];

    $message = "Bienvenue, " . htmlspecialchars($_SESSION['nom']) . " !";


    switch ($niveau) {
        case 'CLIENT':
            $_SESSION['welcome_message'] = $message . " Vous êtes connecté en tant que client.";
            header("Location: client.php");
            break;
        case 'EMPLOYÉ':
            $_SESSION['welcome_message'] = $message . " Vous êtes connecté en tant qu’employé.";
            header("Location: employee.php");
            break;
        case 'FOURNISSEURS':
            $_SESSION['welcome_message'] = $message . " Bienvenue fournisseur.";
            header("Location: provider.php");
            break;
        case 'ADMINISTRATEUR':
            $_SESSION['welcome_message'] = $message . " Accès au panneau d’administration.";
            header("Location: ../../../back_office/pages/dashboard.php");
            break;
        default:
            echo "Rôle non reconnu.";
            break;
    }

    exit;

} else {
    echo "<p style='color:red;'>Email ou mot de passe incorrect.</p>";
    echo "<a href='login.php'>Réessayer</a>";
    exit;
}
?>
