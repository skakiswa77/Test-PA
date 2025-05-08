<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <main>
        <?php
        session_start();
        
        $_SESSION = array();

        session_destroy();

        header('Location: index.php');
        ?>
    </main>
    <?php require_once ('composants/footer.php') ?>

</body>

</html>