<?php
// Démarre la session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Bienvenue sur le site</h1>

    <?php if (isset($_SESSION['username'])): ?>
        <!-- Affiche un message de bienvenue si l'utilisateur est connecté -->
        <p>Vous êtes connecté en tant que <b><?php echo $_SESSION['username']; ?></b></p>
        <a href="logout.php">Déconnexion</a>
    <?php else: ?>
        <!-- Affiche un message si l'utilisateur n'est pas connecté -->
        <p>Vous n'êtes pas connecté.</p>
        <a href="login.php">Connexion</a>
        <a href="register.php">Inscription</a>
    <?php endif; ?>

</body>
</html>