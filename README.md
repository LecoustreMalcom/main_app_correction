# Maintenance Applicative

## Structure des Fichiers

```
index.php
login.php
logout.php
register.php
styles.css
```

## Fichiers PHP

`index.php`
* **Description**: Page d'accueil du site.
* **Fonctionnalités**:
  - Affiche un message de bienvenue.
  - Vérifie si l'utilisateur est connecté.
  - Affiche des liens pour l'inscription et la connexion si l'utilisateur n'est pas connecté.
  - Affiche un lien de déconnexion si l'utilisateur est connecté.

`login.php`
* **Description**: Page de connexion pour les utilisateurs.
* **Fonctionnalités**:
  - Formulaire de connexion avec les champs "Nom d'utilisateur" et "Mot de passe".
  - Vérifie les identifiants de l'utilisateur dans la base de données.
  - Stocke le nom d'utilisateur dans la session et redirige vers la page d'accueil en cas de succès.
  - Affiche un message d'erreur en cas d'échec de la connexion.

`logout.php`
* **Description**: Page de déconnexion pour les utilisateurs.
* **Fonctionnalités**:
  - Supprime toutes les variables de session.
  - Détruit la session.
  - Redirige vers la page d'accueil.


`register.php`
* **Description**: Page d'inscription pour les nouveaux utilisateurs.
* **Fonctionnalités**:
  - Formulaire d'inscription avec les champs "Nom d'utilisateur" et "Mot de passe".
  - Vérifie si le nom d'utilisateur existe déjà dans la base de données.
  - Insère le nouvel utilisateur dans la base de données en cas de succès.
  - Redirige vers la page de connexion après une inscription réussie.
  - Affiche un message d'erreur en cas d'échec de l'inscription ou si le nom d'utilisateur existe déjà.

## Base de Données

* **Nom de la base de données**: maintenance-app
* **Table**: `user`
  - **Colonnes**:
    - username (VARCHAR)
    - password (VARCHAR)

## Fonctionnalités

### Inscription

1. L'utilisateur remplit le formulaire d'inscription sur la page `register.php`.
2. Le script vérifie si le nom d'utilisateur existe déjà dans la base de données.
3. Si le nom d'utilisateur n'existe pas, le script insère le nouvel utilisateur dans la base de données.
4. L'utilisateur est redirigé vers la page de connexion en cas de succès.

### Connexion

1. L'utilisateur remplit le formulaire de connexion sur la page `login.php`.
2. Le script vérifie les identifiants de l'utilisateur dans la base de données.
3. Si les identifiants sont corrects, le nom d'utilisateur est stocké dans la session et l'utilisateur est redirigé vers la page d'accueil.

### Déconnexion

1. L'utilisateur clique sur le lien de déconnexion sur la page `index.php`.
2. Le script supprime toutes les variables de session et détruit la session.
3. L'utilisateur est redirigé vers la page d'accueil.