# Pagination PHP/MySQL – AudioHub

## 1. Définition

La pagination permet d’afficher les résultats d’une requête (ex : morceaux, articles…) page par page, pour éviter d’afficher tout d’un coup et améliorer l’expérience utilisateur.

## 2. Les étapes principales

### a) Déterminer le nombre d’éléments par page

```php
$trackByPage = 3; // nombre de morceaux par page
```

### b) Récupérer le numéro de page

```php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if ($page < 1) {
    $page = 1;
}
```

### c) Calculer l’offset

L’offset indique à partir de quel élément commencer l’affichage.

```php
$offset = intval(($page - 1) * $trackByPage);
```

### d) Requête SQL avec LIMIT et OFFSET

On utilise LIMIT pour le nombre d’éléments, OFFSET pour le décalage.

```php
$request = $db->prepare('SELECT ... FROM tracks ... LIMIT :byPage OFFSET :offset');
$request->bindValue('byPage', $trackByPage, PDO::PARAM_INT);
$request->bindValue('offset', $offset, PDO::PARAM_INT);
$request->execute();
$tracks = $request->fetchAll(PDO::FETCH_ASSOC);
```

### e) Compter le nombre total d’éléments

Pour savoir combien de pages il faut :

```php
$totalTracks = $db->prepare('SELECT count(*) FROM tracks');
$totalTracks->execute();
$total = $totalTracks->fetchColumn();
$numberOfPages = ceil($total / $trackByPage);
```

### f) Afficher les liens de pagination

On génère les liens pour chaque page :

```php
for ($i = 1; $i <= $numberOfPages; $i++) {
    echo '<a href="?page=' . $i . '">' . $i . '</a>';
}
```

## 3. Boucle d’affichage des résultats

On affiche chaque morceau avec un foreach :

```php
foreach ($tracks as $track) {
    // Affichage du morceau
}
```

## 4. Points d’attention

- Toujours sécuriser la récupération du numéro de page (>= 1).
- Utiliser des requêtes préparées pour LIMIT et OFFSET.
- Adapter le nombre d’éléments par page selon le contexte.

## 5. Exemple visuel

```php
// ...
<div class="tracks-container">
  <?php foreach ($tracks as $track) { /* ... */ } ?>
</div>
<div class="pagination">
  <?php for ($i = 1; $i <= $numberOfPages; $i++) { /* ... */ } ?>
</div>
// ...
```

---

La pagination est essentielle pour les interfaces qui affichent beaucoup de données : elle améliore la lisibilité, la rapidité et l’accessibilité du site.
