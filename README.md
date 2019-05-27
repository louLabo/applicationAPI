
Description
==

lien vers dossier google drive du projet : https://drive.google.com/drive/folders/1xD37GxOOPnNko4Dewun3q6TZmWuDzXAg?usp=sharing
Application à installer sur le serveur des sites cibles, et à connecter sur leur base de donnée (renseigner les identifiants dans le fichier Database).
Elle délivre une API reliée au module crée distant_searcher sur l'application Drupal PartageonsVert, ce dernier lui envoi des données grâce à un get_file_content avec en paramètre l'URL vers le fichier Main.php de cet API. Cette API traite cela et requete la base de donnée cible ( voir schema du dispositif en fin de fichier).

- Main.php : Gère la récupération des données envoyées depuis le module, orchestre la recherche parmi tous les contenus affiliés à cette API, renvoi ces données au module.
- Database.php : script de connexion à la base de donnée, contient les identifiants.
- Nom_contenuDAO.php : interface qui liste les fonctions à implémenter pour chaque type de contenu* (les fonctions de requetage de la BD).
- Nom_contenu.php : orchestre la recherche des données propres au contenu, formatte les résultats pour rentrer dans les standards requis pour l'affichage sur le module (fonction standardize).
- Nom_contenuDAOImpl.php : implémente Nom_contenuDAO, à modifier pour chaque base de données, il s'agit de fonctions de requetage de la BD, chaque fonction renvoi toutes les données nécessaires au type de contenu en fonction d'un (ou de plusieurs) paramètre(s) par exemple en fonction de la ville, du nom d'auteur...

*Un type de contenu est ici désigné par une liste de données précises, avec ses propres règles de mise en page.

Marche à suivre lors de l'installation vers une nouvelle base de donnée
==
 
Afin d'ajouter une base de donnée, il faut : 
Le chemin d'accès à la base de donnée, son nom, le login utilisateur et son mot de passe dans le fichier "Database.php" dans la fonction construct.

Il faut déterminer les "types de contenu " qui pourront être extraits à partir des données proposées. 
Un type de contenu peut être extrait d'une base de donnée seulement si celle-ci contient toutes les données requises par ce contenu, il faut alors au préalable lister toutes les tables et champs correspondants à ces données.

Par exemple pour un type de contenu Expérience, il est nécessaire d'avoir :
- Titre
- Description (sommaire)
- Corps 
- Date début - Date fin, sous format JJ/MM/AAAA
- Organisme en charge
- Budget
- Partenaires techniques / financiers
- Les Contacts
- Nom(s) Des/de la ville(s) où cette expérience a eu lieu 
- L’/Les année(s) de expérience 
- Localisation de l’expérience selon un de ces 3 formats compatible avec google map : 

            Degrés, minutes et secondes (DMS) : 41°24'12.2" N 2°10'26.5" E
           
            Degrés et minutes décimales (DMM) : 41 24.2028, 2 10.4418
           
            Degrés décimaux (DD) : 41.40338, 2.17403
           

Les types de contenus déjà implémentés dans le module sont présents en fin de fichier.
*On peut également implémenter un nouveau type de contenu, les manipulations à réaliser sont décritent par la suite.
 
Si un type de contenu extractable de la base de donnée est déjà crée, il a alors déjà un fichier nom_contenuDAO.php et nom_Contenu.php
Pour le rendre opérationnel pour cette BD il suffit de crée (ou si il existe déjà le modifier) un fichier nom_contenuDAOImp qui implémente le DAO et crée les fonctions de requetage de la base de donnée (voir exemple Experience dans l'API applicationAPI, API paramétrée pour la base de donnée de Capitales Françaises pour la Biodiversité)
Et modifier le fichier nom_contenu entre les //******* pour la standardisation des champs.

Implémenter un nouveau type de contenu (aidez vous de l'exemple du contenu Experience)
--
- Lister les données nécessaires au contenu (comme ci-joint avec Expérience).
- Créer un fichier nom_contenuDAO.php, y définir les fonctions à implémenter. (voir descriptif nom_contenuDAO )
- Créer un fichier nom_contenuDAOImpl.php et implémenter nom_contenuDAO.
- Créer un fichier nom_contenu.php et y implémenter les fonctions de requetage et de standardisation.
- Ajouter dans le main une fonction nom_contenu_requesting_with_data et nom_contenu_requesting_without_data, les appeler dans le if(isset...)else(...) en haut du script. 
 
- Pour ajouter un critère de recherche (comme ville ou organisme dans expérience) il suffit de l'ajouter dans la liste parameter du sontenu dans le main, ajouter dans nom_contenu.php un if dans lequel on appel la fonction correspondante de nom_contenuDAOImpl.php
On ajoute également la fonction de requete dans l'interface nom_contenuDAO.php

Types de contenus implémentés :
==

Experiences :

- Titre
- Description (sommaire)
- Corps 
- Date début - Date fin, sous format JJ/MM/AAAA
- Organisme en charge
- Budget
- Partenaires techniques / financiers
- Les Contacts
- Nom(s) Des/de la ville(s) où cette expérience a eu lieu 
- L’/Les année(s) de expérience 
- Localisation de l’expérience selon un de ces 3 formats compatible avec google map : 

            Degrés, minutes et secondes (DMS) : 41°24'12.2" N 2°10'26.5" E
           
            Degrés et minutes décimales (DMM) : 41 24.2028, 2 10.4418
           
            Degrés décimaux (DD) : 41.40338, 2.17403

Annexe : 
==
![alt text](https://github.com/louLabo/applicationAPI/blob/master/Schema%20du%20dispositif.png)
