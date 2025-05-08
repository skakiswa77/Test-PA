<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Care - Fournisseurs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
            background-color: #f1eded;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.5);
            position: fixed;
            width: 95%;
            top: 0;
            z-index: 1000;
        }

        .profile-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            display: inline-block;
            border: 2px solid #ddd;
        }

        .profile-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        header .header-right a {
            margin-left: 70px;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-section img {
            width: 100px;
            height: auto;
        }

        .language-selector select {
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .notification-icon {
            background-color: #4b9ce2;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .notification-icon:hover {
            background-color: #3a7bb5;
        }

        .Contenaire {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1001;
        }

        .Contenaire ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
            background-color: rgba(240, 236, 236, 0.8);
            padding: 10px;
            border-radius: 10px;
        }

        .Contenaire ul li a {
            color: rgb(25, 25, 26);
            font-size: 18px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .Contenaire ul li a:hover, .Contenaire ul li a.active {
            color: #767777;
        }

        main {
            padding-top: 80px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .provider-section {
            text-align: center;
            padding: 20px;
            background-color: #f5f7fa;
            border-radius: 8px;
            margin: 60px auto 40px;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .provider-section img {
            width: 60%;
            height: 260px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .provider-section h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .provider-section p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #070707;
        }

        .provider-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .action-button {
            background-color: #62b1f7;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .action-button:hover {
            background-color: #495057;
        }

        .provider-interventions {
            margin-top: 40px;
            padding: 30px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .provider-interventions h2 {
            font-size: 24px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .intervention-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .intervention-item {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            width: calc(50% - 20px);
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .intervention-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .intervention-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .intervention-item p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #555;
        }

        .intervention-link {
            background-color: #459eec;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .intervention-link:hover {
            background-color: #495057;
        }

        .provider-availability {
            margin-top: 40px;
            padding: 30px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .provider-availability h2 {
            font-size: 24px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .availability-calendar table {
            width: 100%;
            border-collapse: collapse;
        }

        .availability-calendar th, .availability-calendar td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .availability-calendar th {
            background-color: #e9ecef;
        }

        .provider-invoices {
            margin-top: 40px;
            padding: 30px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .provider-invoices h2 {
            font-size: 24px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .invoice-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .invoice-item {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            width: calc(50% - 20px);
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .invoice-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .invoice-item p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #555;
        }

        .invoice-link {
            background-color: #58a9f0;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .invoice-link:hover {
            background-color: #495057;
        }

        footer {
            text-align: center;
            background-color: #62a5e7;
            color: white;
            padding: 15px 0;
            margin-top: 40px;
        }

        footer p {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-section">
            <img src="../IMAGES/Logo2.png" alt="Business Care Logo">
            <div class="language-selector">
                <select id="language">
                    <option value="fr">Français</option>
                    <option value="en">English</option>
                    <option value="ar">العربية</option>
                </select>
            </div>
        </div>
        
        <div class="Contenaire">
            <ul>
                <li><a href="provider.php" class="active" data-lang="provider">Fournisseur</a></li>
            </ul>
        </div>

        <div class="auth-search-container">
        <div class="header-right">
            <a href="settings.php">
                <div class="profile-circle">
                    <img src="../../uploads/<?php echo htmlspecialchars($photo); ?>" alt="Profil" class="circle-img">
                </div>
            </a>

        <div class="auth-search-container">
            <div class="auth-buttons">
                <a href="logout.php" class="auth-button" data-lang="logout">Deconnexion</a>
            </div>
    </header>

    <main>
        <section class="provider-section">
            <img src="../IMAGES/NoImage.jpeg" alt="Business care fournisseur">
            <h1 data-lang="providerSpaceTitle">Espace Fournisseurs</h1>
            <p data-lang="providerSpaceDescription">Bienvenue dans votre espace dédié. Gérez vos interventions, vos disponibilités et vos factures.</p>
            <div class="provider-actions">
                <a href="#interventions" class="action-button" data-lang="viewInterventions">Mes Interventions</a>
                <a href="#disponibilites" class="action-button" data-lang="viewAvailability">Gérer mes Disponibilités</a>
                <a href="#factures" class="action-button" data-lang="viewInvoices">Consulter mes Factures</a>
            </div>
        </section>

        <section id="interventions" class="provider-interventions">
            <h2 data-lang="myInterventions">Mes Interventions</h2>
            <div class="intervention-list">
                <div class="intervention-item">
                    <h3 data-lang="intervention1Title">Yoga Session</h3>
                    <p><strong data-lang="date">Date</strong> : 01/02/2025</p>
                    <p><strong data-lang="client">Client</strong> : TechCorp</p>
                    <p><strong data-lang="status">Statut</strong> : <span data-lang="completed">Terminé</span></p>
                    <a href="#" class="intervention-link" data-lang="details">Détails</a>
                </div>
                <div class="intervention-item">
                    <h3 data-lang="intervention2Title">Coaching Leadership</h3>
                    <p><strong data-lang="date">Date</strong> : 10/03/2025</p>
                    <p><strong data-lang="client">Client</strong> : HealthPlus</p>
                    <p><strong data-lang="status">Statut</strong> : <span data-lang="inProgress">En cours</span></p>
                    <a href="#" class="intervention-link" data-lang="details">Détails</a>
                </div>
            </div>
        </section>

        <section id="disponibilites" class="provider-availability">
            <h2 data-lang="myAvailability">Mes Disponibilités</h2>
            <div class="availability-calendar">
                <table>
                    <thead>
                        <tr>
                            <th data-lang="date">Date</th>
                            <th data-lang="time">Heure</th>
                            <th data-lang="status">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>05/02/2025</td>
                            <td>09:00 - 12:00</td>
                            <td data-lang="available">Disponible</td>
                        </tr>
                        <tr>
                            <td>12/03/2025</td>
                            <td>14:00 - 17:00</td>
                            <td data-lang="busy">Occupé</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="factures" class="provider-invoices">
            <h2 data-lang="myInvoices">Mes Factures</h2>
            <div class="invoice-list">
                <div class="invoice-item">
                    <h3 data-lang="invoice1Title">Facture YogaMaster</h3>
                    <p><strong data-lang="date">Date</strong> : 01/02/2025</p>
                    <p><strong data-lang="amount">Montant</strong> : 100 €</p>
                    <a href="#" class="invoice-link" data-lang="download">Télécharger</a>
                </div>
                <div class="invoice-item">
                    <h3 data-lang="invoice2Title">Facture CoachX</h3>
                    <p><strong data-lang="date">Date</strong> : 10/03/2025</p>
                    <p><strong data-lang="amount">Montant</strong> : 200 €</p>
                    <a href="#" class="invoice-link" data-lang="download">Télécharger</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p data-lang="copyright">&copy; 2025 Business Care. Tous droits réservés.</p>
    </footer>

    <script>
        const translations = {
            fr: {
                home: "Accueil",
                client: "Client",
                employee: "Employé",
                provider: "Fournisseur",
                admin: "Admin",
                providerSpaceTitle: "Espace Fournisseurs",
                providerSpaceDescription: "Bienvenue dans votre espace dédié. Gérez vos interventions, vos disponibilités et vos factures.",
                viewInterventions: "Mes Interventions",
                viewAvailability: "Gérer mes Disponibilités",
                viewInvoices: "Consulter mes Factures",
                myInterventions: "Mes Interventions",
                intervention1Title: "Yoga Session",
                intervention2Title: "Coaching Leadership",
                date: "Date",
                client: "Client",
                status: "Statut",
                completed: "Terminé",
                inProgress: "En cours",
                details: "Détails",
                myAvailability: "Mes Disponibilités",
                available: "Disponible",
                busy: "Occupé",
                myInvoices: "Mes Factures",
                invoice1Title: "Facture YogaMaster",
                invoice2Title: "Facture CoachX",
                amount: "Montant",
                download: "Télécharger",
                copyright: "&copy; 2025 Business Care. Tous droits réservés.",
            },
            en: {
                home: "Home",
                client: "Client",
                employee: "Employee",
                provider: "Provider",
                admin: "Admin",
                providerSpaceTitle: "Supplier Space",
                providerSpaceDescription: "Welcome to your dedicated space. Manage your interventions, availabilities, and invoices.",
                viewInterventions: "My Interventions",
                viewAvailability: "Manage My Availabilities",
                viewInvoices: "View My Invoices",
                myInterventions: "My Interventions",
                intervention1Title: "Yoga Session",
                intervention2Title: "Leadership Coaching",
                date: "Date",
                client: "Client",
                status: "Status",
                completed: "Completed",
                inProgress: "In Progress",
                details: "Details",
                myAvailability: "My Availabilities",
                available: "Available",
                busy: "Busy",
                myInvoices: "My Invoices",
                invoice1Title: "YogaMaster Invoice",
                invoice2Title: "CoachX Invoice",
                amount: "Amount",
                download: "Download",
                copyright: "&copy; 2025 Business Care. All rights reserved.",
            },
            ar: {
                home: "الصفحة الرئيسية",
                client: "عميل",
                employee: "موظف",
                provider: "مزود",
                admin: "مدير",
                providerSpaceTitle: "مساحة الموردين",
                providerSpaceDescription: "مرحبًا بكم في مساحتك المخصصة. قم بإدارة تدخلاتك وأوقات تواجدك وفواتيرك.",
                viewInterventions: "تدخلاتي",
                viewAvailability: "إدارة أوقات تواجدي",
                viewInvoices: "عرض فواتيري",
                myInterventions: "تدخلاتي",
                intervention1Title: "جلسة يوغا",
                intervention2Title: "تدريب القيادة",
                date: "التاريخ",
                client: "العميل",
                status: "الحالة",
                completed: "مكتمل",
                inProgress: "قيد التنفيذ",
                details: "تفاصيل",
                myAvailability: "أوقات تواجدي",
                available: "متاح",
                busy: "مشغول",
                myInvoices: "فواتيري",
                invoice1Title: "فاتورة YogaMaster",
                invoice2Title: "فاتورة CoachX",
                amount: "المبلغ",
                download: "تحميل",
                copyright: "&copy; 2025 Business Care. جميع الحقوق محفوظة.",
            },
        };

        function updateLanguage(lang) {
            const elements = document.querySelectorAll("[data-lang]");
            elements.forEach((element) => {
                const key = element.getAttribute("data-lang");
                if (translations[lang] && translations[lang][key]) {
                    element.textContent = translations[lang][key];
                }
            });

            if (lang === "ar") {
                document.body.setAttribute("dir", "rtl");
            } else {
                document.body.setAttribute("dir", "ltr");
            }
        }

        document.getElementById("language").addEventListener("change", (event) => {
            const selectedLang = event.target.value;
            updateLanguage(selectedLang);
        });

        document.addEventListener("DOMContentLoaded", () => {
            const defaultLang = "fr"; 
            updateLanguage(defaultLang);
        });
    </script>
</body>
</html>