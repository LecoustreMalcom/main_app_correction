<?php
// Démarre la session
session_start();

// Connexion à la base de données MySQL
$mysqli = new mysqli("localhost", "root", "", "mini-site-maintenance-appli");

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifie si le nom d'utilisateur existe déjà
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        // Affiche un message d'erreur si le nom d'utilisateur existe déjà
        echo "<p style='color:red;'>Nom d'utilisateur déjà pris</p>";
    } else {
        // Insère le nouvel utilisateur dans la base de données
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($mysqli->query($query)) {
            // Redirige vers la page de connexion après l'inscription réussie
            header("Location: login.php");
            exit();
        } else {
            // Affiche un message d'erreur si l'insertion échoue
            echo "<p style='color:red;'>Erreur lors de l'inscription</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .small-text {
            font-size: 0.8em;
        }
    </style>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleButton = document.getElementById("togglePassword");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.textContent = "Masquer le mot de passe";
            } else {
                passwordField.type = "password";
                toggleButton.textContent = "Afficher le mot de passe";
            }
        }
    </script>
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST">
        <label>Nom d'utilisateur :</label>
        <input type="text" name="username" required><br>

        <label>Mot de passe :</label>
        <input type="password" name="password" id="password" required><br>
        <input type="checkbox" id="showPassword" onclick="togglePassword()"> <span class="small-text">Afficher le mot de passe</span><br>

        <button type="submit">S'inscrire</button>
    </form>
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>