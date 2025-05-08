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
            background-color: transparent;
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
        </div>
    </header>
    