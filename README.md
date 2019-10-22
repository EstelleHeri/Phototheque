# Photothèque - Licence Informatique

## Introduction

Création d'une photothèque numérique lors de ma deuxième année de Licence Informatique.

Pour débuter cliquer sur 'accueil.php' c'est la page d'accueil qui explique le fonctionnement du site.  
La classe 'ImageForm.php' permet d'ajouter une image ainsi que sa description dans la base de donnée locale mais aussi de créer la vignette.

Des captures d'écrans ont été faites pour vous permettre de voir le rendu final (voir dossier screens).

## Base de données

La base de données se présente ainsi :
### Table « image »
titre : varchar(255)
auteur : varchar(255)
urlphoto : text
urlauteur : text
dimension : text
typelicence : text
categorie : varchar(255)
nom : varchar(255)
mime : text
motscles : varchar(255)
→ primary key (nom)

### Table « membres »
id : int → auto-increment
pseudo : varchar(255)
motdepasse : text
→ primary key (id)

### Table « imagesusers »
id : int
nom : varchar(255)
→ primary key (id)
→ foreign key(id) references membres(id)
→ foreign key(nom) references image(nom)
