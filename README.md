![alt text](image.png)

## AudioHub c'est quoi?

AudioHub est un projet musical communautaire. Il a pour but d'écouter de la musique importée par les utilisateurs et ainsi pouvoir également en importer afin d'enrichir l'expérience.

# Sommaire

- [Sommaire](#sommaire)
  - [Installation des stacks](#installation-des-stacks)
    - [Installation de Node.js et npm](#installation-de-nodejs-et-npm)
    - [Installation de Tailwind CSS](#installation-de-tailwind-css)
    - [Installation de WAMP](#installation-de-wamp)
    - [Base de données (SQL)](#base-de-données-sql)
- [Architecture du projet](#architecture-du-projet)
  - [Fonctionnalités principales](#fonctionnalités-principales)
  - [Fichiers principaux (pages)](#fichiers-principaux-pages)
    - [Dossiers et fichiers utilitaires](#dossiers-et-fichiers-utilitaires)
  - [Fichiers JavaScript](#fichiers-javascript)

## Installation des stacks

Si vous souhaitez travailler sur le projet, veuillez installer :

- Node.js (npm est inclus avec Node.js)
- Tailwind CSS
- WAMP (serveur local Apache/MySQL/PHP)

### Installation de Node.js et npm

1. Rendez-vous sur le site officiel : [https://nodejs.org/](https://nodejs.org/)
2. Téléchargez la version LTS recommandée pour la plupart des utilisateurs.
3. Installez Node.js en suivant les instructions de l'installateur.
4. Vérifiez l'installation dans votre terminal :
   ```bash
   node -v
   npm -v
   ```
   Si les deux commandes affichent un numéro de version, Node.js et npm sont bien installés.

> **Remarque :**  
> npm (Node Package Manager) est inclus automatiquement lors de l'installation de Node.js, il n'est donc pas nécessaire de l'installer séparément.

---

### Installation de Tailwind CSS

1. Ouvrez un terminal à la racine du projet après l'avoir cloné avec Git et réinstaller les dépendances avec :

   ```bash
   npm install
   ```

2. Lancez Tailwind en mode watch pour générer le CSS :
   ```bash
   npx tailwindcss -i ./custom.css -o ./style.css --watch
   ```
   (Adaptez les chemins selon votre structure de projet.)

> Pour plus de détails, consultez la documentation officielle : [https://tailwindcss.com/docs/installation](https://tailwindcss.com/docs/installation)

---

### Installation de WAMP

1. Téléchargez WAMP sur le site officiel : [https://www.wampserver.com/](https://www.wampserver.com/)
2. Installez-le en suivant les instructions.
3. Placez le dossier du projet dans le répertoire `www` de WAMP (ex : `C:\wamp64\www\audiohub`).
4. Lancez WAMP et assurez-vous que les services Apache et MySQL sont démarrés.

---

### Base de données (SQL)

- Le fichier **bdd_loaded.sql** contient l'architecture de la base de données à importer dans votre PHPMyAdmin.

---

# Architecture du projet

Le projet est organisé en dossiers pour une meilleure gestion.  
Chaque dossier ou fichier a un rôle précis :

audiohub/
├── assets/
│ ├── covers/
│ ├── fonts/
│ ├── icons/
│ ├── img/
│ └── script/
├── partials/
├── process/
├── utils/
├── \*.php
└── README.md

---

## Fonctionnalités principales

- Import de tracks
- Player audio
- Bibliothèque utilisateur
- Explorer global
- Playlists
- Recherche dynamique
- Compteur d’écoute

---

## Fichiers principaux (pages)

- **index.php**: Page d'accueil avec loader animé, redirige vers la connexion.
- **connexion.php**: Page de connexion utilisateur, formulaire et gestion du "remember me".
- **create-account.php**: Page de création de compte utilisateur.
- **home.php**: stats, top tracks, accès à l'explorer.
- **explorer.php**: Bibliothèque AudioHub, affiche toutes les tracks (les filtres seront ajoutés dans une prochaine version).
- **library.php**: Librairie de l'utilisateur connecté : ses tracks et playlists.
- **import-track.php**: Formulaire pour importer une nouvelle track.
- **search.php**: recherche pour trouver une track ou un artiste.
- **profil.php**: Page profil utilisateur : infos, modification, accès admin, support.

---

### Dossiers et fichiers utilitaires

**assets/Ressources statiques**

- **covers/** : images des albums importés.
- **fonts/** : polices utilisées.
- **icons/** : icônes SVG pour l’UI.
- **img/** : images diverses (logos, illustrations).
- **script/** : JS pour l’interactivité (player, import, pagination, etc.).

**partials/éléments réutilisables**

- **header.php** : barre de navigation principale.
- **footer.php** : pied de page (navigation mobile).
- **sidebar.php** : menu latéral desktop.
- **response-modal.php** : modal de retour (succès/erreur).
- **track-card.php** : carte d’affichage d’une track.
- **track-card-chart.php** : carte d’affichage d’une track dans le top 10.
- **Boutons réutilisables** :
  - **button.php**
  - **simple-btn.php**
  - **button-with-img.php**
  - **button-send-email.php**
  - **submit-button.php**
- **media-player.php** : lecteur audio.
- **reset-password-modal.php** : modal pour réinitialiser le mot de passe.
- **head.php** : balises meta, liens CSS/JS, SEO.

**utils/Fonctions utilitaires et scripts de connexion à la base de données**

- **db_connect.php** : connexion PDO à la base MySQL.
- **is-connected.php** : vérification de session utilisateur, redirection si non connecté.
- **bootstrap.php** : gestion du cookie "remember me" et session auto.

## Fichiers JavaScript

- **main.js**: Gère l’ouverture/fermeture du menu sidebar.
- **loader.js**: Animation du loader sur la page d’accueil et redirection automatique.
- **auth-connexion.js**: Gestion du formulaire de connexion, affichage des erreurs et modals.
- **auth-create.js**: Gestion du formulaire de création de compte, affichage des erreurs et modals.
- **import.js**: Gestion du formulaire d’importation de track, affichage des erreurs et modals.
- **player.js**: Gestion du lecteur audio (play, pause, next, prev, affichage des infos).
- **pagination.js**: Pagination explorer.php.
- **pagination-library.js**: Pagination pour library.php.
- **search.js**: Recherche dynamique de tracks ou artistes.

---

**Process/Scripts PHP pour le traitement des requêtes AJAX et des formulaires**

- **import.php** : gère l’importation d’une track (vérification, upload, insertion BDD).
- **create-auth.php** : création de compte utilisateur.
- **connexion-auth.php** : authentification utilisateur.
- **pagination.php** : pagination des tracks pour explorer.php.
- **pagination-library.php** : pagination des tracks pour library.php.
- **search-track-artist.php** : recherche de tracks ou artistes.
- **counter-click.php** : incrémente le compteur d’écoute d’une track.
