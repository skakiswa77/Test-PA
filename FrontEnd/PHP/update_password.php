<?php
session_start();
require_once '../../../utils/database.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
    } else {
       
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

     
        if (password_verify($current_password, $user['password'])) {
         
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
            $stmt->execute([$hashed_password, $id]);

            echo "Mot de passe mis à jour avec succès.";
        } else {
            echo "Le mot de passe actuel est incorrect.";
        }
    }
}
?>

