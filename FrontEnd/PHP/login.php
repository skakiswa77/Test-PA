<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #00CFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            text-align: center;
            position: relative; 
        }

        .left-section {
            background-color: white;
            width: 100px; 
            height: 100vh; 
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            align-items: flex-start;
            padding-top: 20px;
        }

        .back-button {
            position: absolute; 
            top: 20px;
            left: 20px;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none; 
        }

        .back-button:hover {
            text-decoration: underline;
        }

        .logo img {
            width: 80px;
            height: auto;
            margin-bottom: 20px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .login-form label {
            margin-bottom: 5px;
            font-weight: bold;
            text-align: left;
        }

        .login-form input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .login-form button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #0056b3;
        }

        .checkbox-group label {
            margin-right: 15px;
            font-weight: normal;
        }

        #secret-code-field {
            margin-top: 10px;
            display: none;
        }

    </style>
</head>
<body>

    <div class="left-section">
        <a href="index.php" class="back-button">Retour</a>
    </div>

    <div class="container">

        <div class="logo">
            <img src="../IMAGES/Logo2.png" alt="Logo">
        </div>

        <form class="login-form" action="result_login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <br>
            <div class="form-group">
                <label>Rôle</label>
                <div class="checkbox-group" id="role-selector">
                    <label><input type="radio" name="niveau" value="CLIENT" required> Client</label>
                    <label><input type="radio" name="niveau" value="EMPLOYÉ"> Employé</label>
                    <label><input type="radio" name="niveau" value="FOURNISSEURS"> Fournisseurs</label>
                    <label><input type="radio" name="niveau" value="ADMINISTRATEUR"> Administrateur</label>
                </div>
            </div>

    
            <div id="secret-code-field">
                <label for="secret_code">Code secret (admin uniquement)</label>
                <input type="password" id="secret_code" name="secret_code" maxlength="5">
            </div>

            <button type="submit" class="login-button">Connexion</button>
            <br>
            <div class="register-link">
                <p>Vous n'avez pas de compte ? <a href="register.php">Inscription</a></p>
            </div>
        </form>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const roleInputs = document.querySelectorAll('input[name="niveau"]');
            const secretCodeField = document.getElementById("secret-code-field");

            roleInputs.forEach(input => {
                input.addEventListener("change", function () {
                    if (this.value === "ADMINISTRATEUR") {
                        secretCodeField.style.display = "block";
                    } else {
                        secretCodeField.style.display = "none";
                    }
                });
            });
        });
    </script>

</body>
</html>
