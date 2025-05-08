<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <style>
        body {
            background-color: #d2d7e0;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 20px;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
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
            background-color: #0056b3;
        }

        .logo-section img {
            width: 90px;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        .form-container {
            max-width: 990px;
            width: 100%;
            background-color: #00CFFF;
            padding: 20px;
            border-radius: 35px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: black;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: center;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 120px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background-color: white;
            color: black;
            margin: 0 auto;
            display: block;
        }

        .inline-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .inline-group .form-group {
            flex: 1;
            max-width: 250px;
        }

        .date-inputs {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .date-inputs input,
        .date-inputs select {
            width: 80px;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            color: black;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            font-weight: normal;
            white-space: nowrap;
        }

        .checkbox-group input {
            margin-left: 5px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            max-width: 200px;
            margin: 0 auto;
            display: block;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <a href="index.php" class="back-button">Retour</a>


    <div class="logo-section">
        <img src="../IMAGES/Logo2.png" alt="Logo">
    </div>


    <h1>BIENVENUE À L'INSCRIPTION</h1>

    <form method="POST" action="result_register.php">
        
        <div class="form-container">

            <div class="inline-group">
                <div class="form-group">
                    <label for="nom">NOM</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="prenom">PRÉNOM</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
            </div>

            <div class="form-group">
                <label>Date de Naissance</label>
                <div class="date-inputs">
                    <input type="number" name="jour" placeholder="Jour" min="1" max="31" required>
                    <select name="mois" required>
                        <option value="" disabled selected>Mois</option>
                        <option value="1">Janvier</option>
                        <option value="2">Février</option>
                        <option value="3">Mars</option>
                        <option value="4">Avril</option>
                        <option value="5">Mai</option>
                        <option value="6">Juin</option>
                        <option value="7">Juillet</option>
                        <option value="8">Août</option>
                        <option value="9">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                    <input type="number" name="annee" placeholder="Année" min="1980" max="2025" required>
                </div>
            </div>

            <div class="form-group">
                <label>Genre</label>
                <div class="checkbox-group">
                    <label>Homme <input type="radio" name="genre" value="homme" required></label>
                    <label>Femme <input type="radio" name="genre" value="femme" required></label>
                    <label>Autre <input type="radio" name="genre" value="autre" required></label>
                </div>
            </div>

            <div class="form-group">
                <label for="lieu">Lieu de Naissance</label>
                <input type="text" id="lieu_naissance" name="lieu_naissance" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" required>
            </div>

            <div class="inline-group">
                <div class="form-group">
                    <label for="code_postal">Code Postal</label>
                    <input type="text" id="code_postal" name="code_postal" required>
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" name="ville" required>
                </div>
            </div>


            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" required>
            </div>


            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Rôle</label>
                <div class="checkbox-group">
                    <label>Client<input type="checkbox" name="niveau" value="CLIENT"></label>
                    <label>Employé<input type="checkbox" name="niveau" value="EMPLOYÉ"></label>
                    <label>Fournisseurs<input type="checkbox" name="niveau" value="FOURNISSEURS"></label>
                    <label>Administrateur<input type="checkbox" name="niveau" value="ADMINISTRATEUR"></label>
                </div>
            </div>


            <div>
                <button type="submit" class="btn">S'inscrire</button>
            </div>
        </div>
        </form>

</body>
</html>