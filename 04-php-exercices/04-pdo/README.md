# Exercice 4 : PHP Data Objects

# Attrapez les tous ! : Pokédex

![pokemons](../../_readme_img/pokemons.jpg)

Il est temps de passer aux choses sérieuses, les bases de données avec PDO (PHP Data Objects).

Et créer son Pokédex ! (bon, on se contentera des 25 premiers Pokémons de la Génération 1).

## La base de données

Connectez-vous à PHPMyAdmin [http://localhost/phpmyadmin](http://localhost/phpmyadmin).

Créez la base de données _db_introprog_pokemons_

![Capture phpmyadmin](../../_readme_img/01-php-myadmin.png)

Sélectionnez la base de données _db_introprog_pokemons_ dans l'interface, et importez la DB (04-pdo/\_db_mysql/db_introprog_pokemons.sql).

![Capture phpmyadmin](../../_readme_img/02-php-myadmin.png)

Vous avez à présent deux tables.

- pk_list : contient la liste des Pokémons, avec leur Id (auto-incrémenté), Name, Pv, Image, Type1, Type2, Editable
- pk_types : la liste des 18 types de Pokémons.

![Capture phpmyadmin](../../_readme_img/03-php-myadmin.png)

## Exercice partie 1

### Connexion à la base de données

- Comme vu dans la théorie créez dans un try/catch la connexion à la DB.

### Créez 2 fonctions avec des requêtes SQL

- Une pour lister tous les personnages et leurs caractéristiques
- Une pour lister les différents types de Pokémons.

### Affichez les Pokémons dans des tables HTML

- Afficher la liste des Pokémons dans une table HTML

![Capture phpmyadmin](../../_readme_img/01-capture-pdo.png)

### A Suivre ...
