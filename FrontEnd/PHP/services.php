<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découverte des Services - Business Care</title>

    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

header {
    background-color: #4b9ce2;
    padding: 10px 20px;
    text-align: center;
}

header .logo-section img {
    width: 150px;
}

main {
    padding: 20px;
}

h1, h2 {
    color: #4b9ce2;
    text-align: center;
    margin-bottom: 20px;
}

.intro p {
    font-size: 18px;
    text-align: center;
    margin-bottom: 40px;
}

.team {
    margin-bottom: 40px;
}

.team .team-members {
    display: flex;
    justify-content: space-around;
    gap: 20px;
}

.team-member {
    text-align: center;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 30%;
}

.team-member img {
    width: 100%;
    height: auto;
    border-radius: 50%;
    margin-bottom: 10px;
}

.team-member h3 {
    color: #4b9ce2;
    margin-bottom: 10px;
}

.team-member p {
    font-size: 14px;
}


.services {
    margin-bottom: 40px;
}

.services .service {
    background-color: white;
    padding: 20px;
    margin: 20px 0;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.services .service h3 {
    color: #4b9ce2;
    margin-bottom: 10px;
}

.services .service p {
    font-size: 16px;
    line-height: 1.6;
}


footer {
    text-align: center;
    background-color: #4b9ce2;
    padding: 20px;
    color: white;
    margin-top: 40px;
}

    </style>

</head>
<body>
    <header>
        <div class="logo-section">
            <a href="index.php"><img src="../IMAGES/Logo2.png" alt="Logo"></a>
        </div>

        <div class="left-section">
        <a href="index.php" class="back-button">Retour</a>
    </div>
    </header>

    <main>
        <section class="intro">
            <h1>Bienvenue sur la page de découverte des services</h1>
            <p>Découvrez nos services et nos experts qui vous accompagnent dans la gestion de vos besoins professionnels.</p>
        </section>

        <section class="team">
            <h2>Rencontrez notre équipe</h2>
            <div class="team-members">
                <div class="team-member">
                    <img src="../../../uploads/AT.png" alt="Personne 1">
                    <h3>Adil Touati</h3>
                    <p>Chef réseau de notre projet annuel, un atout majeur pour le développement de notre application.</p>
                </div>
                <div class="team-member">
                    <img src="../../../uploads/SK.png" alt="Personne 2">
                    <h3>Samuel Kakiswa</h3>
                    <p>S'occupe des deux parties du projet annuel Businness Care, la persévérance est la clé pour la réussite.</p>
                </div>
                <div class="team-member">
                    <img src="../../../uploads/MD.png" alt="Personne 3">
                    <h3>Maimounatou Diallo</h3>
                    <p>Chef de la partie web de notre projet annuel, l'innovation va nous permettre de nous épanouir.</p>
                </div>
            </div>
        </section>

        <section class="services">
            <h2>Nos Services</h2>

            <div class="service">
                <h3>Gestion des Clients, Abonnements et Demandes</h3>
                <p>Nous simplifions la gestion de vos clients, leurs abonnements et leurs demandes. Grâce à notre interface intuitive, vous pouvez gérer vos relations clients en toute simplicité.</p>
            </div>

            <div class="service">
                <h3>Accès aux Plannings et Activités des Employés</h3>
                <p>Nos employés peuvent accéder à leurs plannings, évaluer leurs performances et participer aux différentes activités proposées pour améliorer leur bien-être et leur productivité.</p>
            </div>

            <div class="service">
                <h3>Gestion des Prestataires et Partenaires</h3>
                <p>Nous gérons vos prestataires et partenaires pour assurer une relation optimale et coordonner les services externes afin de vous offrir un soutien de qualité.</p>
            </div>

            <div class="service">
                <h3>Planification des Événements et Activités</h3>
                <p>Nous organisons des événements bien-être et des activités pour renforcer la cohésion d’équipe et améliorer la motivation de vos employés.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Business Care. Tous droits réservés.</p>
    </footer>
</body>
</html>
