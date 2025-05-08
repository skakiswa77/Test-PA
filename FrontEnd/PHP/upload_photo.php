<?php
session_start();
require_once '../../../utils/database.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
    $photo = $_FILES['photo'];

    if (getimagesize($photo['tmp_name']) === false) {
        echo "Le fichier téléchargé n'est pas une image.";
        exit();
    }

    $target_dir = "../../../uploads/";
    $target_file = $target_dir . basename($photo['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_extensions)) {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        exit();
    }


    if (move_uploaded_file($photo['tmp_name'], $target_file)) {
        $stmt = $pdo->prepare("UPDATE utilisateurs SET photo = ? WHERE id = ?");
        $stmt->execute([basename($photo['name']), $id]);

        echo "Photo de profil mise à jour avec succès.";
    } else {
        echo "Désolé, une erreur est survenue lors du téléchargement de votre photo.";
    }
}
?>

