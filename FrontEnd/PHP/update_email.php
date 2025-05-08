<?php
session_start();
require_once '../../../utils/database.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_email = $_POST['email'];

    
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$new_email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "L'email est déjà utilisé par un autre utilisateur.";
    } else {
     
        $stmt = $pdo->prepare("UPDATE utilisateurs SET email = ? WHERE id = ?");
        $stmt->execute([$new_email, $id]);

    
        $_SESSION['email'] = $new_email;

        echo "Email mis à jour avec succès.";
    }
}
?>

