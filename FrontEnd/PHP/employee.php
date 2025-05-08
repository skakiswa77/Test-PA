<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Care - Employés</title>
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

        .employee-section {
            text-align: center;
            padding: 20px;
            background-color: #f5f7fa;
            border-radius: 8px;
            margin: 60px auto 50px;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .employee-section img {
            width: 60%;
            height: 260px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .employee-section h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .employee-section p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #070707;
        }

        .employee-actions {
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

        .employee-tasks {
            margin-top: 40px;
            padding: 30px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .employee-tasks h2 {
            font-size: 24px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .task-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .task-item {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            width: calc(50% - 20px);
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .task-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .task-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .task-item p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #555;
        }

        .task-link {
            background-color: #459eec;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .task-link:hover {
            background-color: #495057;
        }

        .employee-schedule {
            margin-top: 40px;
            padding: 30px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .employee-schedule h2 {
            font-size: 24px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .schedule table {
            width: 100%;
            border-collapse: collapse;
        }

        .schedule th, .schedule td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .schedule th {
            background-color: #e9ecef;
        }

        .employee-documents {
            margin-top: 40px;
            padding: 30px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .employee-documents h2 {
            font-size: 24px;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .document-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .document-item {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            width: calc(50% - 20px);
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .document-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .document-item p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #555;
        }

        .document-link {
            background-color: #58a9f0;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .document-link:hover {
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
                <li><a href="employee.php" class="active" data-lang="employee">Employé</a></li>
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
        <section class="employee-section">
            <img src="../IMAGES/Employer1.jpg" alt="Business care employer">
            <h1 data-lang="employeeSpaceTitle">Espace Employés</h1>
            <p data-lang="employeeSpaceDescription">Bienvenue dans votre espace dédié. Consultez vos tâches, votre emploi du temps et bien plus encore.</p>
            <div class="employee-actions">
                <a href="#taches" class="action-button" data-lang="viewTasks">Voir mes tâches</a>
                <a href="#emploi-du-temps" class="action-button" data-lang="viewSchedule">Consulter mon emploi du temps</a>
                <a href="#documents" class="action-button" data-lang="viewDocuments">Accéder aux documents</a>
            </div>
        </section>

        <section id="taches" class="employee-tasks">
            <h2 data-lang="myTasks">Mes Tâches</h2>
            <div class="task-list">
                <div class="task-item">
                    <h3 data-lang="task1Title">Préparer le rapport d'activités</h3>
                    <p data-lang="task1Description">Analyser les sessions de yoga et coaching du mois.</p>
                    <p><strong data-lang="status">Statut :</strong> <span data-lang="toDo">A FAIRE</span></p>
                    <a href="#" class="task-link" data-lang="details">Détails</a>
                </div>
                <div class="task-item">
                    <h3 data-lang="task2Title">Organiser un événement bien-être</h3>
                    <p data-lang="task2Description">Planifier une session de team building avec les prestataires.</p>
                    <p><strong data-lang="status">Statut :</strong> <span data-lang="inProgress">EN COURS</span></p>
                    <a href="#" class="task-link" data-lang="details">Détails</a>
                </div>
            </div>
        </section>

        <section id="emploi-du-temps" class="employee-schedule">
            <h2 data-lang="mySchedule">Mon Emploi du Temps</h2>
            <div class="schedule">
                <table>
                    <thead>
                        <tr>
                            <th data-lang="time">Heure</th>
                            <th data-lang="monday">Lundi</th>
                            <th data-lang="tuesday">Mardi</th>
                            <th data-lang="wednesday">Mercredi</th>
                            <th data-lang="thursday">Jeudi</th>
                            <th data-lang="friday">Vendredi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>09:00 - 10:00</td>
                            <td data-lang="yogaSession">Yoga Session</td>
                            <td data-lang="internalTraining">Formation interne</td>
                            <td data-lang="individualCoaching">Coaching individuel</td>
                            <td data-lang="eventPlanning">Planification d'événements</td>
                            <td data-lang="clientMeeting">Réunion clients</td>
                        </tr>
                        <tr>
                            <td>10:00 - 12:00</td>
                            <td data-lang="contractManagement">Gestion des contrats</td>
                            <td data-lang="wellnessSession">Session bien-être</td>
                            <td data-lang="internalTraining">Formation interne</td>
                            <td data-lang="hrManagement">Gestion RH</td>
                            <td data-lang="fileClosure">Clôture des dossiers</td>
                        </tr>
                        <tr>
                            <td>14:00 - 16:00</td>
                            <td data-lang="clientOnboarding">Prise en main des clients</td>
                            <td data-lang="investorDiscussion">Discussion avec les investisseurs</td>
                            <td data-lang="externalTraining">Formation externes</td>
                            <td data-lang="employeeManagement">Gestion des employés</td>
                            <td data-lang="dailyReport">Rapport de la journée</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="documents" class="employee-documents">
            <h2 data-lang="documents">Documents</h2>
            <div class="document-list">
                <div class="document-item">
                    <h3 data-lang="employeeGuide">Guide des employés</h3>
                    <p data-lang="employeeGuideDescription">Consignes et procédures internes.</p>
                    <a href="#" class="document-link" data-lang="download">Télécharger</a>
                </div>
                <div class="document-item">
                    <h3 data-lang="monthlyReport">Rapport mensuel</h3>
                    <p data-lang="monthlyReportDescription">Analyse des prestations et activités.</p>
                    <a href="#" class="document-link" data-lang="download">Télécharger</a>
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
                employeeSpaceTitle: "Espace Employés",
                employeeSpaceDescription: "Bienvenue dans votre espace dédié. Consultez vos tâches, votre emploi du temps et bien plus encore.",
                viewTasks: "Voir mes tâches",
                viewSchedule: "Consulter mon emploi du temps",
                viewDocuments: "Accéder aux documents",
                myTasks: "Mes Tâches",
                task1Title: "Préparer le rapport d'activités",
                task1Description: "Analyser les sessions de yoga et coaching du mois.",
                status: "Statut :",
                toDo: "A FAIRE",
                task2Title: "Organiser un événement bien-être",
                task2Description: "Planifier une session de team building avec les prestataires.",
                inProgress: "EN COURS",
                details: "Détails",
                mySchedule: "Mon Emploi du Temps",
                time: "Heure",
                monday: "Lundi",
                tuesday: "Mardi",
                wednesday: "Mercredi",
                thursday: "Jeudi",
                friday: "Vendredi",
                yogaSession: "Yoga Session",
                internalTraining: "Formation interne",
                individualCoaching: "Coaching individuel",
                eventPlanning: "Planification d'événements",
                clientMeeting: "Réunion clients",
                contractManagement: "Gestion des contrats",
                wellnessSession: "Session bien-être",
                hrManagement: "Gestion RH",
                fileClosure: "Clôture des dossiers",
                clientOnboarding: "Prise en main des clients",
                investorDiscussion: "Discussion avec les investisseurs",
                externalTraining: "Formation externes",
                employeeManagement: "Gestion des employés",
                dailyReport: "Rapport de la journée",
                documents: "Documents",
                employeeGuide: "Guide des employés",
                employeeGuideDescription: "Consignes et procédures internes.",
                monthlyReport: "Rapport mensuel",
                monthlyReportDescription: "Analyse des prestations et activités.",
                download: "Télécharger",
                copyright: "&copy; 2025 Business Care. Tous droits réservés.",
            },
            en: {
                home: "Home",
                client: "Client",
                employee: "Employee",
                provider: "Provider",
                admin: "Admin",
                employeeSpaceTitle: "Employee Space",
                employeeSpaceDescription: "Welcome to your dedicated space. Check your tasks, schedule, and more.",
                viewTasks: "View my tasks",
                viewSchedule: "View my schedule",
                viewDocuments: "Access documents",
                myTasks: "My Tasks",
                task1Title: "Prepare the activity report",
                task1Description: "Analyze yoga and coaching sessions for the month.",
                status: "Status:",
                toDo: "TO DO",
                task2Title: "Organize a wellness event",
                task2Description: "Plan a team building session with providers.",
                inProgress: "IN PROGRESS",
                details: "Details",
                mySchedule: "My Schedule",
                time: "Time",
                monday: "Monday",
                tuesday: "Tuesday",
                wednesday: "Wednesday",
                thursday: "Thursday",
                friday: "Friday",
                yogaSession: "Yoga Session",
                internalTraining: "Internal Training",
                individualCoaching: "Individual Coaching",
                eventPlanning: "Event Planning",
                clientMeeting: "Client Meeting",
                contractManagement: "Contract Management",
                wellnessSession: "Wellness Session",
                hrManagement: "HR Management",
                fileClosure: "File Closure",
                clientOnboarding: "Client Onboarding",
                investorDiscussion: "Investor Discussion",
                externalTraining: "External Training",
                employeeManagement: "Employee Management",
                dailyReport: "Daily Report",
                documents: "Documents",
                employeeGuide: "Employee Guide",
                employeeGuideDescription: "Internal guidelines and procedures.",
                monthlyReport: "Monthly Report",
                monthlyReportDescription: "Analysis of services and activities.",
                download: "Download",
                copyright: "&copy; 2025 Business Care. All rights reserved.",
            },
            ar: {
                home: "الصفحة الرئيسية",
                client: "عميل",
                employee: "موظف",
                provider: "مزود",
                admin: "مدير",
                employeeSpaceTitle: "مساحة الموظف",
                employeeSpaceDescription: "مرحبًا بكم في مساحتك المخصصة. تحقق من مهامك وجدولك الزمني والمزيد.",
                viewTasks: "عرض مهامي",
                viewSchedule: "عرض جدولي الزمني",
                viewDocuments: "الوصول إلى المستندات",
                myTasks: "مهامي",
                task1Title: "إعداد تقرير الأنشطة",
                task1Description: "تحليل جلسات اليوجا والتدريب لهذا الشهر.",
                status: "الحالة:",
                toDo: "للقيام",
                task2Title: "تنظيم حدث للرفاهية",
                task2Description: "تخطيط جلسة بناء فريق مع المزودين.",
                inProgress: "قيد التنفيذ",
                details: "تفاصيل",
                mySchedule: "جدولي الزمني",
                time: "الوقت",
                monday: "الاثنين",
                tuesday: "الثلاثاء",
                wednesday: "الأربعاء",
                thursday: "الخميس",
                friday: "الجمعة",
                yogaSession: "جلسة يوجا",
                internalTraining: "تدريب داخلي",
                individualCoaching: "تدريب فردي",
                eventPlanning: "تخطيط الأحداث",
                clientMeeting: "اجتماع العملاء",
                contractManagement: "إدارة العقود",
                wellnessSession: "جلسة الرفاهية",
                hrManagement: "إدارة الموارد البشرية",
                fileClosure: "إغلاق الملفات",
                clientOnboarding: "استقبال العملاء",
                investorDiscussion: "مناقشة مع المستثمرين",
                externalTraining: "تدريب خارجي",
                employeeManagement: "إدارة الموظفين",
                dailyReport: "تقرير يومي",
                documents: "المستندات",
                employeeGuide: "دليل الموظف",
                employeeGuideDescription: "الإرشادات والإجراءات الداخلية.",
                monthlyReport: "تقرير شهري",
                monthlyReportDescription: "تحليل الخدمات والأنشطة.",
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