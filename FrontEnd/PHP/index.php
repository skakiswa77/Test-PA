<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Care - Accueil</title>
    <link rel="stylesheet" href="chatbot/chatbot.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
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
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .language-selector select {
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .logo-section img {
            width: 100px;
            height: auto;
        }

        .Contenaire {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .Contenaire ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
            background-color: rgba(240, 236, 236, 0.8);
            padding: 10px;
            border-radius: 10px;
        }

        .Contenaire ul li a {
            color: rgb(28, 28, 29);
            font-size: 18px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .Contenaire ul li a:hover,
        .Contenaire ul li a.active {
            color: #020202;
        }

        .auth-search-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input {
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
        }

        .search-bar button {
            padding: 5px 10px;
            font-size: 16px;
            border: 1px solid #ebf0f3;
            border-radius: 0 5px 5px 0;
            background-color: #08a4f1;
            color: white;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #0abeeb;
        }

        .auth-buttons {
            display: flex;
            gap: 10px;
        }

        .auth-button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .auth-button:hover {
            background-color: #0056b3;
        }

        .image-container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 140px auto 50px;
        }

        .image-container img {
            width: 60%;
            height: auto;
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

        .cta-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .services-description {
            background-color: #e2e9eb;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .services-description h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .services-description p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .services-description ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 10px;
        }

        .services-description ul li {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .feature {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            width: 300px;
            padding-bottom: 20px;
        }

        .feature img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .feature-info {
            padding: 15px;
        }

        .feature h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .feature p {
            font-size: 14px;
        }

        footer {
            background-color: #343a40;
            color: white;
            margin-top: 50px;
            padding: 20px 0;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
        }

        .footer-container div {
            flex: 1;
            min-width: 200px;
            text-align: center;
            margin: 10px 0;
        }

        .footer-container h3 {
            margin-bottom: 10px;
        }

        .footer-container input {
            padding: 5px;
            margin: 5px 0;
            border-radius: 5px;
            border: none;
        }

        .footer-container button {
            padding: 5px 10px;
            background-color: #08a4f1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .footer-container button:hover {
            background-color: #46c8e9;
        }

        .footer-container img {
            margin: 0 5px;
        }

        .footer-container a {
            color: white;
            text-decoration: none;
        }

        .footer-container a:hover {
            text-decoration: underline;
        }

        .footer-bottom {
            text-align: center;
            padding: 10px;
            background-color: #23272b;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['newsletter'])) {
        if ($_GET['newsletter'] === 'success') {
            echo "<script>alert('Merci pour votre inscription à la newsletter !');</script>";
        } elseif ($_GET['newsletter'] === 'invalid') {
            echo "<script>alert('Adresse email invalide.');</script>";
        } elseif ($_GET['newsletter'] === 'error') {
            echo "<script>alert(\"L'envoi de l'email a échoué. Veuillez réessayer plus tard.\");</script>";
        }
    }
    ?>

    <header>
        <div class="logo-section">
            <div class="logo">
                <img src="../IMAGES/Logo2.png" alt="Business Care Logo">
            </div>
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
                <li><a href="index.php" class="active" data-lang="home">Accueil</a></li>
            </ul>
        </div>

        <div class="auth-search-container">
            <div class="auth-buttons">
                <a href="register.php" class="auth-button" data-lang="signup">Inscription</a>
                <a href="login.php" class="auth-button" data-lang="login">Connexion</a>
            </div>
            
        </div>
    </header>

    <main>
        <section class="client-cards">
            <div class="image-container">
                <img src="../IMAGES/Accueil.jpg" alt="Business care accueil">
                <h1 data-lang="welcome">Bienvenue chez Business Care</h1>
                <p data-lang="description">Votre partenaire pour le bien-être en entreprise.</p>
                <a href="services.php" class="cta-button" data-lang="discover">Découvrir nos services</a>
            </div>
        </section>

        <div class="services-description">
            <h2 data-lang="servicesTitle">Nos Services</h2>
            <p data-lang="servicesIntro">
                Business Care propose une gamme variée de services pour améliorer le bien-être et la cohésion en
                entreprise.
                Parmi nos offres, vous trouverez :
            </p>
            <ul>
                <li><strong data-lang="service1">Séances individuelles avec des praticiens</strong> : <span
                        data-lang="service1Desc">En présentiel ou en visioconférence pour soutenir la santé mentale des
                        salariés.</span></li>
                <li><strong data-lang="service2">Formations et ateliers</strong> : <span
                        data-lang="service2Desc">Webinaires et ateliers sur site pour renforcer les compétences et la
                        cohésion d'équipe.</span></li>
                <li><strong data-lang="service3">Événements de team building</strong> : <span
                        data-lang="service3Desc">Défis sportifs, séances de yoga, et mobilisation autour d'objectifs
                        solidaires.</span></li>
                <li><strong data-lang="service4">Signalement anonyme</strong> : <span data-lang="service4Desc">Un
                        système pour signaler des situations critiques de manière confidentielle.</span></li>
                <li><strong data-lang="service5">Engagement solidaire</strong> : <span
                        data-lang="service5Desc">Possibilité pour les salariés de s'impliquer dans des associations
                        partenaires (dons financiers, matériels, ou bénévolat).</span></li>
            </ul>
            <p data-lang="servicesConclusion">
                Découvrez comment Business Care peut transformer votre environnement professionnel en un espace de
                bien-être et de productivité.
            </p>
        </div>

        <section class="features">
            <div class="feature">
                <img src="../IMAGES/Client.jpg" alt="Clients">
                <div class="feature-info">
                    <h2 data-lang="clientManagement">Clients</h2>
                    <p data-lang="clientManagementDesc">Suivez et gérez vos clients, leurs abonnements et leurs demandes
                        en toute simplicité.</p>
                    <a href="login.php" class="cta-button" data-lang="discover">Découvrir nos services</a>
                </div>
            </div>
            <div class="feature">
                <img src="../IMAGES/Employer1.jpg" alt="Employés">
                <div class="feature-info">
                    <h2 data-lang="employeeManagement">Employés</h2>
                    <p data-lang="employeeManagementDesc">Accédez aux plannings, aux évaluations et aux activités
                        proposées aux salariés.</p>
                    <a href="login.php" class="cta-button" data-lang="discover">Découvrir nos services</a>
                </div>
            </div>
            <div class="feature">
                <img src="../IMAGES/NoImage6.jpeg" alt="Prestataires">
                <div class="feature-info">
                    <h2 data-lang="providerManagement">Prestataires</h2>
                    <p data-lang="providerManagementDesc">Gérez vos partenaires et services externes pour assurer un
                        accompagnement optimal.</p>
                    <a href="login.php" class="cta-button" data-lang="discover">Découvrir nos services</a>
                </div>
            </div>
            <div class="feature">
                <img src="../IMAGES/NoImage.jpeg" alt="Événements et Activités">
                <div class="feature-info">
                    <h2 data-lang="eventsManagement">Événements et Activités</h2>
                    <p data-lang="eventsManagementDesc">Planifiez et organisez des événements bien-être pour renforcer
                        la cohésion d'équipe.</p>
                    <a href="login.php" class="cta-button" data-lang="discover">Découvrir nos services</a>
                </div>
            </div>
        </section>
    </main>

    <div class="chatbot-container">
    <div class="chatbot-icon" onclick="toggleChatbot()">
        💬
    </div>
    <div class="chatbot-window" id="chatbot">
        <div class="chatbot-header">
            <span>Assistant Business Care</span>
            <button onclick="toggleChatbot()">✖</button>
        </div>
        <div class="chatbot-messages" id="chatbotMessages"></div>
        <input type="text" id="chatbotInput" placeholder="Posez votre question..." onkeypress="handleKeyPress(event)">
    </div>
</div>

    <footer>
        <div class="footer-container">
            <div class="newsletter">
                <h3 data-lang="newsletterTitle">Inscription</h3>
                <p data-lang="newsletterDesc">
                    Restez informé des dernières actualités, conseils bien-être et événements organisés par Business
                    Care.
                </p>
                <form action="send_newsletter.php" method="POST">
                    <input type="email" name="newsletter_email" placeholder="Votre email..." required
                        data-lang="emailPlaceholder">
                    <button type="submit" data-lang="sendButton">Envoyer</button>
                </form>

            </div>
            <div class="payment-methods">
                <h3 data-lang="paymentMethodsTitle">Moyen de paiement</h3>
                <img src="../IMAGES/Paypal.jpeg" alt="PayPal" width="40">
                <img src="../IMAGES/MasterCard.jpeg" alt="MasterCard" width="20">
                <img src="../IMAGES/Visa.jpeg" alt="Visa" width="30">
                <p><a href="tarifs.php">Tarifs des abonnements</a></p>
            </div>
            <div class="contact">
                <h3 data-lang="contactTitle">Nous contacter</h3>
                <p>
                    📞 <strong data-lang="phoneLabel">Téléphone :</strong> 07 68 16 39 48<br>
                    📧 <strong data-lang="emailLabel">Email :</strong> businesscareams@gmail.com<br>
                    📍 <strong data-lang="addressLabel">Adresse :</strong><br>
                    - <span data-lang="parisAddress">Paris : 110 rue de Rivoli</span><br>
                    - <span data-lang="troyesAddress">Troyes : 13 rue Antoine Parmentier</span><br>
                </p>
            </div>
            <div class="services">
                <h3 data-lang="ourServicesTitle">Nos services</h3>
                <p data-lang="ourServicesDesc">Découvrez nos offres pour améliorer le bien-être en entreprise.</p>
            </div>
            <div class="info">
                <h3 data-lang="infoTitle">Informations</h3>
                <p><a href="legal_mentions.php" data-lang="legalNotice">Mentions Légales</a></p>
                <p><a href="secure_payment.php" data-lang="securePayment">Paiement Sécurisé</a></p>
                <p><a href="conditions.php" data-lang="terms">Conditions</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p data-lang="copyright">&copy; 2025 Business Care. Tous droits réservés.</p>
        </div>


    </footer>

    <script>

        const translations = {
            fr: {
                welcome: "Bienvenue chez Business Care",
                description: "Votre partenaire pour le bien-être en entreprise.",
                discover: "Découvrir nos services",
                home: "Accueil",
                client: "Client",
                employee: "Employé",
                provider: "Fournisseur",
                admin: "Admin",
                servicesTitle: "Nos Services",
                servicesIntro: "Business Care propose une gamme variée de services pour améliorer le bien-être et la cohésion en entreprise. Parmi nos offres, vous trouverez :",
                service1: "Séances individuelles avec des praticiens",
                service1Desc: "En présentiel ou en visioconférence pour soutenir la santé mentale des salariés.",
                service2: "Formations et ateliers",
                service2Desc: "Webinaires et ateliers sur site pour renforcer les compétences et la cohésion d'équipe.",
                service3: "Événements de team building",
                service3Desc: "Défis sportifs, séances de yoga, et mobilisation autour d'objectifs solidaires.",
                service4: "Signalement anonyme",
                service4Desc: "Un système pour signaler des situations critiques de manière confidentielle.",
                service5: "Engagement solidaire",
                service5Desc: "Possibilité pour les salariés de s'impliquer dans des associations partenaires (dons financiers, matériels, ou bénévolat).",
                servicesConclusion: "Découvrez comment Business Care peut transformer votre environnement professionnel en un espace de bien-être et de productivité.",
                clientManagement: "Clients",
                clientManagementDesc: "Suivez et gérez vos clients, leurs abonnements et leurs demandes en toute simplicité.",
                employeeManagement: "Employés",
                employeeManagementDesc: "Accédez aux plannings, aux évaluations et aux activités proposées aux salariés.",
                providerManagement: "Prestataires",
                providerManagementDesc: "Gérez vos partenaires et services externes pour assurer un accompagnement optimal.",
                eventsManagement: "Événements et Activités",
                eventsManagementDesc: "Planifiez et organisez des événements bien-être pour renforcer la cohésion d'équipe.",
                newsletterTitle: "Inscription",
                newsletterDesc: "Restez informé des dernières actualités, conseils bien-être et événements organisés par Business Care.",
                emailPlaceholder: "Votre email...",
                sendButton: "Envoyer",
                paymentMethodsTitle: "Moyen de paiement",
                contactTitle: "Nous contacter",
                phoneLabel: "Téléphone :",
                emailLabel: "Email :",
                addressLabel: "Adresse :",
                parisAddress: "Paris : 110 rue de Rivoli",
                troyesAddress: "Troyes : 13 rue Antoine Parmentier",
                ourServicesTitle: "Nos services",
                ourServicesDesc: "Découvrez nos offres pour améliorer le bien-être en entreprise.",
                infoTitle: "Informations",
                legalNotice: "Mentions Légales",
                securePayment: "Paiement Sécurisé",
                terms: "Conditions",
                copyright: "&copy; 2025 Business Care. Tous droits réservés.",
                signup: "Inscription",
                login: "Connexion",
                searchPlaceholder: "Rechercher...",
            },
            en: {
                welcome: "Welcome to Business Care",
                description: "Your partner for workplace well-being.",
                discover: "Discover our services",
                home: "Home",
                client: "Client",
                employee: "Employee",
                provider: "Provider",
                admin: "Admin",
                servicesTitle: "Our Services",
                servicesIntro: "Business Care offers a wide range of services to improve well-being and cohesion in the workplace. Among our offerings, you will find:",
                service1: "Individual sessions with practitioners",
                service1Desc: "In-person or via video conference to support employees' mental health.",
                service2: "Training and workshops",
                service2Desc: "Webinars and on-site workshops to strengthen skills and team cohesion.",
                service3: "Team building events",
                service3Desc: "Sports challenges, yoga sessions, and mobilization around solidarity goals.",
                service4: "Anonymous reporting",
                service4Desc: "A system to confidentially report critical situations.",
                service5: "Solidarity engagement",
                service5Desc: "Opportunity for employees to get involved with partner associations (financial donations, material donations, or volunteering).",
                servicesConclusion: "Discover how Business Care can transform your professional environment into a space of well-being and productivity.",
                clientManagement: "Client",
                clientManagementDesc: "Track and manage your clients, their subscriptions, and their requests with ease.",
                employeeManagement: "Employee",
                employeeManagementDesc: "Access schedules, evaluations, and activities offered to employees.",
                providerManagement: "Provider",
                providerManagementDesc: "Manage your partners and external services to ensure optimal support.",
                eventsManagement: "Events and Activities",
                eventsManagementDesc: "Plan and organize well-being events to strengthen team cohesion.",
                newsletterTitle: "Subscription",
                newsletterDesc: "Stay informed about the latest news, well-being tips, and events organized by Business Care.",
                emailPlaceholder: "Your email...",
                sendButton: "Send",
                paymentMethodsTitle: "Payment Methods",
                contactTitle: "Contact Us",
                phoneLabel: "Phone:",
                emailLabel: "Email:",
                addressLabel: "Address:",
                parisAddress: "Paris: 110 rue de Rivoli",
                troyesAddress: "Troyes: 13 rue Antoine Parmentier",
                ourServicesTitle: "Our Services",
                ourServicesDesc: "Discover our offers to improve well-being in the workplace.",
                infoTitle: "Information",
                legalNotice: "Legal Notice",
                securePayment: "Secure Payment",
                terms: "Terms",
                copyright: "&copy; 2025 Business Care. All rights reserved.",
                signup: "Sign Up",
                login: "Login",
                searchPlaceholder: "Search...",
            },
            ar: {
                welcome: "مرحبًا بكم في Business Care",
                description: "شريككم لتحقيق الرفاهية في مكان العمل.",
                discover: "اكتشف خدماتنا",
                home: "الصفحة الرئيسية",
                client: "عميل",
                employee: "موظف",
                provider: "مزود",
                admin: "مدير",
                servicesTitle: "خدماتنا",
                servicesIntro: "تقدم Business Care مجموعة واسعة من الخدمات لتحسين الرفاهية والتماسك في مكان العمل. من بين عروضنا، ستجد:",
                service1: "جلسات فردية مع ممارسين",
                service1Desc: "حضوريًا أو عبر مؤتمر فيديو لدعم الصحة العقلية للموظفين.",
                service2: "التدريب وورش العمل",
                service2Desc: "ندوات عبر الإنترنت وورش عمل في الموقع لتعزيز المهارات وتماسك الفريق.",
                service3: "فعاليات بناء الفريق",
                service3Desc: "تحديات رياضية، جلسات يوجا، وحشد حول أهداف التضامن.",
                service4: "الإبلاغ المجهول",
                service4Desc: "نظام للإبلاغ عن الحالات الحرجة بشكل سري.",
                service5: "التزام التضامن",
                service5Desc: "فرصة للموظفين للمشاركة مع الجمعيات الشريكة (تبرعات مالية، تبرعات عينية، أو تطوع).",
                servicesConclusion: "اكتشف كيف يمكن لـ Business Care تحويل بيئتك المهنية إلى مساحة من الرفاهية والإنتاجية.",
                clientManagement: "إدارة العملاء",
                clientManagementDesc: "تتبع وإدارة عملائك واشتراكاتهم وطلباتهم بسهولة.",
                employeeManagement: "إدارة الموظفين",
                employeeManagementDesc: "الوصول إلى الجداول الزمنية، التقييمات، والأنشطة المقدمة للموظفين.",
                providerManagement: "إدارة المزودين",
                providerManagementDesc: "إدارة شركائك والخدمات الخارجية لضمان الدعم الأمثل.",
                eventsManagement: "الفعاليات والأنشطة",
                eventsManagementDesc: "خطط ونظم فعاليات الرفاهية لتعزيز تماسك الفريق.",
                newsletterTitle: "التسجيل",
                newsletterDesc: "ابق على اطلاع بآخر الأخبار، نصائح الرفاهية، والفعاليات التي تنظمها Business Care.",
                emailPlaceholder: "بريدك الإلكتروني...",
                sendButton: "إرسال",
                paymentMethodsTitle: "طرق الدفع",
                contactTitle: "اتصل بنا",
                phoneLabel: "الهاتف:",
                emailLabel: "البريد الإلكتروني:",
                addressLabel: "العنوان:",
                parisAddress: "باريس: 110 شارع ريفولي",
                troyesAddress: "تروا: 13 شارع أنطوان بارمنتييه",
                ourServicesTitle: "خدماتنا",
                ourServicesDesc: "اكتشف عروضنا لتحسين الرفاهية في مكان العمل.",
                infoTitle: "معلومات",
                legalNotice: "الإشعار القانوني",
                securePayment: "الدفع الآمن",
                terms: "الشروط",
                copyright: "&copy; 2025 Business Care. جميع الحقوق محفوظة.",
                signup: "التسجيل",
                login: "تسجيل الدخول",
                searchPlaceholder: "بحث...",
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
    </div>



    <script>
    const questions = {
        "services": "Nous proposons la gestion des clients, abonnements, plannings, prestataires et événements.",
        "planning": "Les employés peuvent accéder à leur planning en étant connecté via leur tableau de bord.",
        "modifier mon mot de passe": "Vous pouvez modifier votre mot de passe dans les paramètres de votre compte.",
        "contacter un prestataire": "Oui, nos prestataires sont disponibles dans votre espace.",
        "abonnements": "Vos abonnements sont visibles en vous connectant sur notre site.",
        "une activité": "Les activités sont accessibles via votre tableau de bord.",
        "un événement": "Bien sûr ! Contactez un administrateur ou utilisez le module d'événements.",
        "ajouter un client": "Les admins peuvent ajouter un client depuis la section 'Gestion des clients'.",
        "évaluer un salarié": "Les évaluations se font depuis la fiche de chaque employé.",
        "business care": "Business Care simplifie la gestion RH, les plannings, les prestataires et le bien-être en entreprise."
    };

    function toggleChatbot() {
        const chatbot = document.getElementById('chatbot');
        chatbot.style.display = chatbot.style.display === 'flex' ? 'none' : 'flex';
    }

    function handleKeyPress(e) {
        if (e.key === 'Enter') {
            const input = document.getElementById('chatbotInput');
            const userMessage = input.value.toLowerCase().trim();
            const response = questions[userMessage] || "Je suis désolé, je ne connais pas la réponse à cette question.";
            displayMessage("Vous", input.value);
            displayMessage("Bot", response);
            input.value = "";
        }
    }

    function displayMessage(sender, text) {
        const messageBox = document.getElementById('chatbotMessages');
        const msg = document.createElement('div');
        msg.innerHTML = `<strong>${sender}:</strong> ${text}`;
        messageBox.appendChild(msg);
        messageBox.scrollTop = messageBox.scrollHeight;
    }
</script>
</body>
</html>