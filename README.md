Babacar Toure 2024-2025

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Application de Gestion Restaurant

## Routes disponibles

### Routes publiques

-   `/` : Page d'accueil

    -   Méthode : GET
    -   Fonction : Affiche le tableau de bord public

-   `/login` : Page de connexion

    -   Méthode : GET, POST
    -   Fonction : Permet aux utilisateurs de se connecter

-   `/register` : Page d'inscription
    -   Méthode : GET, POST
    -   Fonction : Permet aux nouveaux utilisateurs de créer un compte

### Routes protégées (nécessite une authentification)

-   `/users` : Gestion des utilisateurs

    -   GET : Liste des utilisateurs
    -   POST : Créer un utilisateur
    -   PUT : Modifier un utilisateur
    -   DELETE : Supprimer un utilisateur

-   `/roles` : Gestion des rôles

    -   GET : Liste des rôles
    -   POST : Créer un rôle
    -   PUT : Modifier un rôle
    -   DELETE : Supprimer un rôle

-   `/categories` : Gestion des catégories

    -   GET : Liste des catégories
    -   POST : Créer une catégorie
    -   PUT : Modifier une catégorie
    -   DELETE : Supprimer une catégorie

-   `/menus` : Gestion des menus
    -   GET : Liste des menus
    -   POST : Créer un menu
    -   PUT : Modifier un menu
    -   DELETE : Supprimer un menu

## Accès et navigation par rôle

### Compte Super Admin

-   **Email**: admin@admin.com
-   **Mot de passe**: password
-   **Accès**: `/admin`
-   **Fonctionnalités**:

    -   Gestion complète des utilisateurs
    -   Gestion des rôles et permissions

    -   Gestion des catégories
    -   Gestion des menus
    -

### Compte Gestionnaire

-   **Email**:creer un compte d'abord en te connectant avec l'admin
-   **Mot de passe**: password
-   **Accès**: `/manager`
-   **Fonctionnalités**:
    -   Gestion des catégories
    -   Gestion des menus

### Navigation principale

**Administration Système** (`/admin`):

-   `/admin/users` - Gestion des utilisateurs

    -   Créer, modifier, supprimer des utilisateurs
    -   Assigner des rôles
    -   Gérer les permissions

-   `/admin/roles` - Gestion des rôles

    -   Créer des rôles
    -   Définir les permissions
    -   Assigner des utilisateurs aux rôles

-   `/admin/categories` - Gestion des catégories

    -   Création de catégories
    -   Organisation hiérarchique
    -   Attribution des permissions

-   `/admin/menus` - Gestion des menus
    -   Construction de menus
    -   Organisation des éléments
    -   Configuration de la navigation

### Sections spécifiques par rôle

**Admin**:

-   `/admin/users` - Gestion utilisateurs
-   `/admin/categories` - Gestion catégories
-   `/admin/menus` - Gestion menus

**Gestionnaire**:

-   `/manager/categories` - Gestion catégories
-   `/manager/menus` - Gestion menus
-   `/manager/reports` - Rapports

---

### Pour chaque type de users il y'a un dashboard qui lui est propre et qui lui permet de faire des actions spécifiques

---

## Guide du développeur

### Structure du projet

```
L3Mio_memo/
├── controllers/    # Logique métier
├── models/        # Modèles de données
├── routes/        # Configuration des routes
├── middleware/    # Middleware personnalisés
└── views/         # Templates et vues
```

### Comment modifier les fichiers

1. **Modification des routes**

    - Les routes sont définies dans le dossier `routes/`
    - Chaque fichier correspond à un groupe de routes spécifique
    - Utilisez le middleware `auth` pour protéger les routes privées

2. **Modification des contrôleurs**

    - Les contrôleurs se trouvent dans `controllers/`

    - Chaque contrôleur gère une fonctionnalité spécifique
    - Suivez le pattern MVC pour maintenir une structure cohérente

3. **Modification des modèles**

    - Les modèles sont dans `models/`
    - Ils définissent la structure des données
    - Utilisez les schémas pour valider les données

4. **Tests**
    - Créez des tests pour chaque nouvelle fonctionnalité
    - Assurez-vous que les tests existants passent avant de commit
    - Utilisez `npm test` pour lancer les tests

### Bonnes pratiques

-   Commentez votre code de manière claire et concise
-   Suivez les conventions de nommage existantes
-   Créez une branche pour chaque nouvelle fonctionnalité
-   Testez vos modifications avant de les soumettre
-   Mettez à jour la documentation si nécessaire

### Installation

1. Clonez le repository
2. Installez les dépendances : `npm install`
3. Configurez les variables d'environnement
4. Lancez le serveur : `npm start`

### Variables d'environnement

Créez un fichier `.env` à la racine du projet avec :

```
PORT=3000
sqlite_db=database.sqlite

```

## Contribution

1. Fork le projet
2. Créez une branche pour votre fonctionnalité
3. Committez vos changements
4. Poussez vers la branche
5. Ouvrez une Pull Request
