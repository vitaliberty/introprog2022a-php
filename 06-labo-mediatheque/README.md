# Introprog 2022a : LABO PHP

![labo](../_readme_img/rick.gif)

Voici venu le temps de l'épreuve finale qui va vous permettre de mettre en pratique toutes les belles choses que nous avons apprises en PHP !

Nous allons réaliser une médiathèque en PHP!

![labo](../_readme_img/01-labo.png)

## Afficher les films

Dans notres database, nous avons une liste de films, que nous devrons afficher à l'écran.

Y'en a une blinde donc on va éviter de les afficher tous.

Il faudra, de façon dynamique créer plusieurs pages avec 10 films par page.

Et trouver un moyen de créer un système à la "Google", où l'on puisse afficher juste 10 films, puis en afficher de nouveau 10 sur la page suivante...

![labo](../_readme_img/02-labo-next.png)

## Bouton recherche

Y'a trop de films, ce serait bien de pouvoir faire une recherche sur les films présents dans la data base non?

On ajoutera pour le coup un bouton de recherche !

![labo](../_readme_img/03-labo-search.png)

## Trop facile ce labo, "Les Simpson l'ont déjà fait" (mais ça avait déjà été fait dans la 4ème dimension)...

Oui... mais non...

C'est qu'il ne s'agit pas de lister les films comme ça d'un simple coup depuis juste une table...

Y'en à plusieurs...

![labo](../_readme_img/04-labo-db.png)

Ben oui, on va quand même aller récupérer le nom du réalisateur, les acteurs et le genre du film dans une autre table...

C'est d'ailleurs une bonne façon de faire...

Comme ça si on devait changer le nom du réalisateur, ça irait se changer sur tout les films auxquel il a participé... Puis ça évite de réencoder son nom à chaque fois...

Exemple : Larry Wachowski change d'identité pour Lana Wachowski... On change une fois son nom dans la DB...

![labo](../_readme_img/05-labo-db.png)

![Enter the Matrix](../_readme_img/neo.gif)

## La DB, l'univers et le reste...

La DB et les assets (images, css...) sont offerts par la maison, le _Le Dernier Restaurant avant la fin du monde_...

On va créer une DB via PHPMyAdmin et d'y importer le fichiers SQL présent dans \__db_mysql_.

Pourquoi pas _introprog2022a-labo_?

![Enter the Matrix](../_readme_img/marvin.jpg)

## MVC

On n'oublie pas ce qu'on a appris, on va mettre le tout dans une architecture MVC...

## Alone in the Dark

J'encourage le partage et le travail de groupe MAIS...

- Tout le monde doit bosser sur le projet
- Personne ne doit rester sur le carreau, tout le monde doit comprendre ce qui est fait...

## C'est trop facile ce labo

N'hésitez pas à me le faire savoir...

Il y a moyen de rajouter du challenge...

![dbz](../_readme_img/dbz.gif)
