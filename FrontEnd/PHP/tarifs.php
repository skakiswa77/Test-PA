<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tarifs des abonnements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #4b9ce2;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .pricing-section {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 40px 20px;
            flex-wrap: wrap;
        }

        .pricing-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
        }

        .pricing-card h2 {
            color: #4b9ce2;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .price {
            font-size: 32px;
            font-weight: bold;
            margin: 10px 0;
        }

        .features {
            text-align: left;
            margin: 20px 0;
        }

        .features li {
            margin-bottom: 10px;
        }

        .subscribe-btn {
            background-color: #4b9ce2;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .subscribe-btn:hover {
            background-color: #0a80f5;
        }

        footer {
            background-color: #4b9ce2;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<header>
    <h1>Choisissez votre abonnement</h1>
    <p>Découvrez nos formules adaptées à tous les besoins</p>
</header>

<section class="pricing-section">

    <div class="pricing-card">
        <h2>Basic</h2>
        <div class="price">5€/mois</div>
        <ul class="features">
            <li>Accès client limité</li>
            <li>Support par email</li>
            <li>Gestion simple des demandes</li>
        </ul>
        <a href="payment.php" class="subscribe-btn">S'abonner</a>
    </div>


    <div class="pricing-card">
        <h2>Standard</h2>
        <div class="price">10€/mois</div>
        <ul class="features">
            <li>Accès complet client</li>
            <li>Support prioritaire</li>
            <li>Gestion des plannings</li>
            <li>Suivi des activités</li>
        </ul>
        <a href="payment.php" class="subscribe-btn">S'abonner</a>
    </div>


    <div class="pricing-card">
        <h2>Premium</h2>
        <div class="price">20€/mois</div>
        <ul class="features">
            <li>Toutes les fonctionnalités Standard</li>
            <li>Support téléphonique</li>
            <li>Accès aux statistiques</li>
            <li>Gestion des partenaires & événements</li>
        </ul>
        <a href="payment.php" class="subscribe-btn">S'abonner</a>
    </div>
</section>

<footer>
    <p>&copy; 2025 Business Care — Tous droits réservés</p>
</footer>

</body>
</html>
