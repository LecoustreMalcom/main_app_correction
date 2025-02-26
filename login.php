<?php
// Démarre la session
session_start();

// Connexion à la base de données MySQL
$mysqli = new mysqli("localhost", "root", "", "maintenance-app");

// Initialisation des variables pour conserver les valeurs des champs
$username = '';
$password = '';
$error = '';

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête SQL pour vérifier les identifiants
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $mysqli->query($query);

    // Vérifie si les identifiants sont corrects
    if ($result && $result->num_rows > 0) {
        // Stocke le nom d'utilisateur dans la session et redirige vers la page d'accueil
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        // Affiche un message d'erreur si les identifiants sont incorrects
        $error = "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
    <h1>Connexion</h1>
    <form method="POST">
        <label>Nom d'utilisateur :</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br>

        <label>Mot de passe :</label>
        <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>" required><br>
        <input type="checkbox" id="showPassword" onclick="togglePassword()"> <span class="small-text">Afficher le mot de passe</span><br>

        <button type="submit">Se connecter</button>
    </form>
    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>