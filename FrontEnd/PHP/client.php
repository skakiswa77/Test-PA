<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Care - Clients</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
            background-color: #f1eded;
            background-position: center center;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.5);
            position: fixed;
            width: 100%;
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

        a {
            text-decoration: none;
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
            font-size: 20px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .Contenaire ul li a:hover,
        .Contenaire ul li a.active {
            color: #767777;
        }

        main {
            padding: 40px 20px;
        }

        .image-container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 120px auto 20px;
        }

        .image-container img {
            width: 60%;
            height: 260px;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
        }

        .image-container h1 {
            margin-top: 15px;
            font-size: 24px;
        }

        .image-container p {
            font-size: 16px;
            margin: 10px 0;
        }

        .client-cards {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
        }

        .client-cards .image-container {
            max-width: 500px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .client-cards .image-container img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .client-cards .client-actions {
            margin-top: 10px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 10px;
        }

        .client-cards .action-button {
            padding: 10px 20px;
            text-align: center;
            margin: 5px 0;
        }

        .client-section {
            text-align: center;
            padding: 10px 20px;
            background-color: #d2d7e0;
            background-position: center;
            border-radius: 8px;
            margin-left: 220px;
            margin-right: 220px;
        }

        .client-section h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .client-section p {
            font-size: 18px;
            color: #131212;
        }

        .action-button,
        .contract-link,
        .invoice-link,
        .submit-button {
            background-color: #4b9ce2;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease;
            margin: 10px 5px;
        }

        .action-button:hover,
        .contract-link:hover,
        .invoice-link:hover,
        .submit-button:hover {
            background-color: #0a80f5;
        }

        .client-contracts,
        .client-invoices,
        .client-contact {
            margin-top: 40px;
            background-color: white;
            padding: 30px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .client-contracts h2,
        .client-invoices h2,
        .client-contact h2 {
            font-size: 24px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .contract-list,
        .invoice-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .contract-item,
        .invoice-item {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            width: 290px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(14, 170, 231, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contract-item:hover,
        .invoice-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .client-contact form {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .client-contact form label {
            font-weight: bold;
        }

        .client-contact form input,
        .client-contact form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .client-contact form button {
            align-self: center;
            padding: 10px 20px;
        }

        footer {
            text-align: center;
            background-color: #4698eb;
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
            <img src="../IMAGES/Logo2.png" alt="Logo de Business Care">
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
                <li><a href="client.php" class="active" data-lang="client">Client</a></li>
            </ul>
        </div>


        <div class="auth-search-container">
        <div class="header-right">
            <a href="settings.php">
                <div class="profile-circle">
                    <img src="../../uploads/<?php echo htmlspecialchars($photo); ?>" alt="Profil" class="circle-img">
                </div>
            </a>
            
        </div>
            <div class="auth-buttons">
                <a href="logout.php" class="auth-button" data-lang="logout">Deconnexion</a>
            </div>
    </header>

    <main>
        <section class="client-cards">
            <div class="image-container">
                <img src="../IMAGES/Client.jpg" alt="Business care accueil">
                <h1 data-lang="clientSpaceTitle">Espace Clients</h1>
                <p data-lang="clientSpaceDescription">Bienvenue dans votre espace dédié. Gérez vos contrats, consultez
                    vos factures et bien plus encore.</p>
                <div class="client-actions">
                    <a href="#contrats" class="action-button" data-lang="viewContracts">Voir mes contrats</a>
                    <a href="#factures" class="action-button" data-lang="viewInvoices">Consulter mes factures</a>
                    <a href="#contact" class="action-button" data-lang="contactSupport">Contacter le support</a>
                </div>
            </div>
        </section>

        <section id="contrats" class="client-contracts">
            <h2 data-lang="myContracts">Mes Contrats</h2>
            <div class="contract-list">
                <div class="contract-item">
                    <h3 data-lang="contractTechCorp">Contrat TechCorp</h3>
                    <p><strong data-lang="duration">Durée :</strong> 01/01/2025 - 31/12/2025</p>
                    <p><strong data-lang="status">Statut :</strong> <span data-lang="paid">Payé</span></p>
                    <a href="#" class="contract-link" data-lang="details">Détails</a>
                </div>
                <div class="contract-item">
                    <h3 data-lang="contractHealthPlus">Contrat HealthPlus</h3>
                    <p><strong data-lang="duration">Durée :</strong> 01/01/2025 - 30/06/2025</p>
                    <p><strong data-lang="status">Statut :</strong> <span data-lang="pending">En attente</span></p>
                    <a href="#" class="contract-link" data-lang="details">Détails</a>
                </div>
            </div>
        </section>

        <section id="factures" class="client-invoices">
            <h2 data-lang="myInvoices">Mes Factures</h2>
            <div class="invoice-list">
                <div class="invoice-item">
                    <h3 data-lang="invoiceTechCorp">Facture TechCorp</h3>
                    <p data-lang="amount">Montant : 5000 €</p>
                    <a href="#" class="invoice-link" data-lang="download">Télécharger</a>
                </div>
                <div class="invoice-item">
                    <h3 data-lang="invoiceHealthPlus">Facture HealthPlus</h3>
                    <p data-lang="amount">Montant : 2500 €</p>
                    <a href="#" class="invoice-link" data-lang="download">Télécharger</a>
                </div>
            </div>
        </section>

        <section id="contact" class="client-contact">
            <h2 data-lang="contactSupport">Messagerie</h2>
            <form action="submit-form.php" method="post">
                <label for="name" data-lang="nameLabel">Nom :</label>
                <input type="text" id="name" name="name" required>

                <label for="email" data-lang="emailLabel">Email :</label>
                <input type="email" id="email" name="email" required>

                <label for="message" data-lang="messageLabel">Message :</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit" class="submit-button" data-lang="sendButton">Envoyer</button>
            </form>
            <?php if (isset($_GET['message']) && $_GET['message'] === 'sent'): ?>
                <p class="success">Votre message a bien été envoyé.</p>
            <?php endif; ?>

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
                clientSpaceTitle: "Espace Clients",
                clientSpaceDescription: "Bienvenue dans votre espace dédié. Gérez vos contrats, consultez vos factures et bien plus encore.",
                viewContracts: "Voir mes contrats",
                viewInvoices: "Consulter mes factures",
                contactSupport: "Contacter le support",
                myContracts: "Mes Contrats",
                contractTechCorp: "Contrat TechCorp",
                contractHealthPlus: "Contrat HealthPlus",
                duration: "Durée :",
                status: "Statut :",
                paid: "Payé",
                pending: "En attente",
                details: "Détails",
                myInvoices: "Mes Factures",
                invoiceTechCorp: "Facture TechCorp",
                invoiceHealthPlus: "Facture HealthPlus",
                amount: "Montant :",
                download: "Télécharger",
                contactSupport: "Contactez le support",
                nameLabel: "Nom :",
                emailLabel: "Email :",
                messageLabel: "Message :",
                sendButton: "Envoyer",
                copyright: "&copy; 2025 Business Care. Tous droits réservés.",
            },
            en: {
                home: "Home",
                client: "Client",
                employee: "Employee",
                provider: "Provider",
                admin: "Admin",
                clientSpaceTitle: "Client Space",
                clientSpaceDescription: "Welcome to your dedicated space. Manage your contracts, view your invoices, and more.",
                viewContracts: "View my contracts",
                viewInvoices: "View my invoices",
                contactSupport: "Contact support",
                myContracts: "My Contracts",
                contractTechCorp: "TechCorp Contract",
                contractHealthPlus: "HealthPlus Contract",
                duration: "Duration:",
                status: "Status:",
                paid: "Paid",
                pending: "Pending",
                details: "Details",
                myInvoices: "My Invoices",
                invoiceTechCorp: "TechCorp Invoice",
                invoiceHealthPlus: "HealthPlus Invoice",
                amount: "Amount:",
                download: "Download",
                contactSupport: "Contact Support",
                nameLabel: "Name:",
                emailLabel: "Email:",
                messageLabel: "Message:",
                sendButton: "Send",
                copyright: "&copy; 2025 Business Care. All rights reserved.",
            },
            ar: {
                home: "الصفحة الرئيسية",
                client: "عميل",
                employee: "موظف",
                provider: "مزود",
                admin: "مدير",
                clientSpaceTitle: "مساحة العميل",
                clientSpaceDescription: "مرحبًا بكم في مساحتك المخصصة. قم بإدارة عقودك، وعرض فواتيرك، والمزيد.",
                viewContracts: "عرض عقودي",
                viewInvoices: "عرض فواتيري",
                contactSupport: "اتصل بالدعم",
                myContracts: "عقودي",
                contractTechCorp: "عقد TechCorp",
                contractHealthPlus: "عقد HealthPlus",
                duration: "المدة:",
                status: "الحالة:",
                paid: "مدفوع",
                pending: "قيد الانتظار",
                details: "تفاصيل",
                myInvoices: "فواتيري",
                invoiceTechCorp: "فاتورة TechCorp",
                invoiceHealthPlus: "فاتورة HealthPlus",
                amount: "المبلغ:",
                download: "تحميل",
                contactSupport: "اتصل بالدعم",
                nameLabel: "الاسم:",
                emailLabel: "البريد الإلكتروني:",
                messageLabel: "الرسالة:",
                sendButton: "إرسال",
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