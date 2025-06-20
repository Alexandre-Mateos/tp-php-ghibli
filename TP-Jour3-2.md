## TP : Afficher des films Ghibli en carte + fiche détaillée

Tu vas créer une petite application en PHP qui utilise l’API publique des **films du Studio Ghibli**.
L’objectif est d’afficher tous les films sous forme de **cartes Bootstrap**, puis de permettre à l’utilisateur de cliquer pour voir les **détails d’un film** sur une autre page.

---
 
### 🔗 API utilisée :
``
https://ghibliapi.vercel.app/
``


---

### 🗂️ Organisation des fichiers :
Tu auras **deux fichiers PHP** :
- `index.php` : page d’accueil qui liste tous les films
- `item.php` : page de détail d’un seul film

---

### 📄 Étapes pour `index.php`

1. **Récupère tous les films**
    - Fais une requête avec `file_get_contents()` sur :
      ```
      https://ghibliapi.vercel.app/films
      ```
    - Décode la réponse avec `json_decode()`.

2. **Prépare la page HTML avec Bootstrap**
    - Intègre le CDN de Bootstrap dans le `<head>`.
    - Ajoute une `<div class="container">` contenant un `<div class="row">`.

3. **Boucle sur les films avec `foreach`**
    - Pour chaque film, crée une **carte Bootstrap** contenant :
        - L’image du film (`image`)
        - Le titre (`title`)
        - Une petite description (`description`, attention : elle est longue !)
          > 💡 Affiche par exemple seulement les **300 premiers caractères** avec `substr()`.
        - Un lien vers la page `item.php` qui envoie l’`id` du film en GET (`?film_id=...`).

      Exemple d’URL générée :
      ```
      <a href="item.php?film_id=1234abcd">Voir le film</a>
      ```

4. **Soigne la mise en page avec Bootstrap**
    - Utilise les classes `card`, `card-title`, `card-text`, `col-md-4`, `mb-4`, etc.

---

### 📄 Étapes pour `item.php`

1. **Vérifie la présence du paramètre `film_id`**
    - Utilise `isset($_GET['film_id'])` pour sécuriser ton code.
    - Si le paramètre n’existe pas, affiche un message d’erreur ou redirige l’utilisateur.

2. **Récupère les données du film sélectionné**
    - Utilise `file_get_contents()` sur l’URL suivante :
      ```
      https://ghibliapi.vercel.app/films/[ID]
      ```
      (remplace `[ID]` par la valeur reçue en GET)

3. **Affiche les infos du film dans une mise en page soignée**
   Tu peux afficher :
    - Son **titre**
    - Son **image**
    - Son **description**
    - Sa **date de sortie**
    - Son **score Rotten Tomatoes**
    - Et toute autre information utile présente dans l’objet retourné

---

### 🧪 Bonus (si tu as terminé) :

L’API de Ghibli contient aussi d’autres types de ressources, comme :
- les **personnages**
- les **lieux**
- les **véhicules**

Regarde bien le **contenu du JSON** de chaque film : tu verras qu’il contient des **URLs vers d’autres ressources**.

> Exemple : un film contient un tableau `people` avec des liens vers les personnages.

➡️ Si tu veux aller plus loin, tu peux :
- Récupérer ces URLs avec `file_get_contents()`
- Afficher les noms des personnages, des lieux, ou les véhicules liés au film
- Organiser les infos en sections dans `item.php`

---

### ✅ Résultat attendu

- Une page `index.php` avec **tous les films** du Studio Ghibli présentés sous forme de cartes cliquables.
- Une page `item.php` qui affiche **le détail complet d’un film**, en fonction de l’identifiant transmis en GET.
- Une **navigation fonctionnelle** entre les deux pages.
- (Bonus) Des infos supplémentaires comme les personnages ou lieux s'affichent si tu les récupères via les autres endpoints.

---

### 💡 Concepts mobilisés :
- Appels API avec `file_get_contents()`
- Décodage JSON avec `json_decode()`
- Boucle `foreach`
- HTML dynamique avec `echo` ou balises PHP
- Transmission de données avec `$_GET`
- Vérification d’existence avec `isset()`
- Bootstrap pour la mise en page (`card`, `row`, `col`)

### Vous pouvez ensuite faire le même principe avec les species si terminé
