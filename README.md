# GameZone — starter Laravel

Mini-kit de départ pour un site d'actualités jeux vidéo : accueil, liste d'articles, page article et première structure de données.

## Important
Ce ZIP contient les fichiers de démarrage GameZone, **pas l'intégralité du framework Laravel** ni le dossier `vendor/`.

## 1. Créer le projet Laravel
Dans un terminal VS Code :

```bash
composer create-project laravel/laravel gamezone
cd gamezone
```

## 2. Copier les fichiers
Décompresse ce ZIP. Copie son contenu dans le dossier `gamezone` en fusionnant les dossiers (`app`, `database`, `resources`, `routes`).

Si VS Code demande de remplacer `routes/web.php`, accepte : la route d'accueil et les routes des articles de ce kit y sont définies.

## 3. Configurer la base de données
Dans le fichier `.env`, configure MySQL, par exemple :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gamezone
DB_USERNAME=root
DB_PASSWORD=
```

Crée une base de données appelée `gamezone` dans phpMyAdmin ou MySQL.

## 4. Créer les tables et démarrer
```bash
php artisan migrate
php artisan serve
```

Ouvre ensuite http://127.0.0.1:8000

## Contenu
- Accueil avec articles récents
- Page de liste des actualités
- Page de lecture d'un article
- Modèles `Article` et `Category`
- Migration des tables
- Données de démonstration dans `database/seeders/GameZoneSeeder.php`

Pour charger les exemples après les migrations :
```bash
php artisan db:seed --class=GameZoneSeeder
```

## Suite conseillée
1. Ajouter une authentification administrateur.
2. Créer un back-office pour publier les articles.
3. Ajouter les catégories, les images et les commentaires.
4. Ajouter la validation et la modération avant publication.

Les textes et images de démonstration sont fictifs. Remplace-les par tes propres contenus.
