# README — TP1
**Réalisé par : Ilyas Bouthanoute**

## Présentation
Ce TP est une petite application PHP qui permet de gérer une liste de joueurs. On peut afficher les joueurs, en ajouter et en supprimer.

## Organisation
- `controllers/` : contient les fichiers qui gèrent les actions (affichage, ajout et suppression).
- `model/` : contient les classes `Joueur`, `Position` et `JoueursJson`.
- `views/` : contient les pages affichées à l'utilisateur.
- `assets/` : contient le fichier CSS.
- `data/joueurs.json` : contient les informations des joueurs.

## Fonctionnement
La page principale affiche les joueurs enregistrés dans le fichier JSON. Le formulaire permet d'ajouter un joueur avec son nom, sa date de naissance et sa ou ses positions. On peut aussi supprimer un joueur depuis la liste.

Les données sont enregistrées dans `joueurs.json`, donc elles restent disponibles après le rechargement de la page.


**Ilyas Bouthanoute**
