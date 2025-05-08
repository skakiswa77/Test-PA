<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement Sécurisé - Business Care</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        main {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1, h2 {
            color: #2c3e50;
        }
        
        li {
            color: #333;
            line-height: 1.6;
        }
        .logos {
            margin-top: 20px;
        }
        .logos img {
            height: 40px;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <header>
    <?php include '../../composants/header.php' ?>
    </header>

    <main>
        <h1>Paiement Sécurisé</h1>

        <p>Business Care vous garantit une sécurité maximale pour vos paiements en ligne. Nous utilisons les protocoles SSL/TLS pour chiffrer vos données bancaires.</p>

        <h2>Moyens de paiement acceptés</h2>
        <ul>
            <li><strong>PayPal :</strong> Paiement rapide et sécurisé via votre compte PayPal.</li>
            <li><strong>Carte Visa :</strong> Transactions sécurisées via votre banque.</li>
            <li><strong>MasterCard :</strong> Paiement protégé avec les standards de sécurité internationaux.</li>
        </ul>

        <h2>Protection des données</h2>
        <p>Vos informations bancaires ne sont jamais stockées sur nos serveurs. Tous les paiements sont traités par des prestataires de confiance agréés.</p>
    </main>

    <footer>
    <?php include '../../composants/footer.php' ?>
    </footer>
</body>
</html>
