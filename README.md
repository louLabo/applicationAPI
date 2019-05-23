
Application à installer sur le serveur des sites cibles, et à connecter sur leur base de donnée (renseigner les identifiants dans le fichier Database).
Elle délivre une API reliée au module crée distant_searcher sur l'application Drupal PartageonsVert et permet de requeter indirectement la base de donnée cibel ( voir schema du dispositif en fin de fichier)


Afin d'ajouter une base de donnée, il faut : 
Le chemin d'accès à la base de donnée, son nom, le login utilisateur et son mot de passe dans le fichier "Database.php" dans la fonction construct.

Il faut déterminer les "types de contenu " qui pourront être extraits à partir des données proposées. 
Un type de contenu est ici désigné par une liste de données précise, avec ses propres règles de mise en page.
Un type de contenu peut être extrait d'une base de donnée seulement si celle-ci contient toutes les données requises par ce contenu, il faut alors au préalable lister toutes les tables et champs correspondants à ces données.

Par exemple pour un type de contenu Expérience, il est nécessaire d'avoir :
Titre

Description (sommaire)

Corps 

Date début - Date fin, sous format JJ/MM/AAAA

Organisme en charge

Budget

Partenaires techniques / financiers

Les Contacts

Nom(s) Des/de la ville(s) où cette expérience a eu lieu 

L’/Les année(s) de expérience 

Localisation de l’expérience selon un de ces 3 formats compatible avec google map : 

Degrés, minutes et secondes (DMS) : 41°24'12.2" N 2°10'26.5" E

Degrés et minutes décimales (DMM) : 41 24.2028, 2 10.4418

Degrés décimaux (DD) : 41.40338, 2.17403



Les types de contenus déjà implémentés dans le module sont présents en fin de fichier.
On peut également implémenter un nouveau type de contenu, les manipulations à réaliser sont décritent par la suite.
 
Si un type de contenu extractable de la base de donnée est déjà crée, il a alors déjà un fichier nom_contenuDAO.php et nom_Contenu.php
Pour l'implémenter il suffit de crée un fichier nom_contenuDAOImp qui implémente le DAO et crée les fonctions de requetage de la base de donnée (voir exemple Experience dans l'API applicationAPI, API paramétrée pour la base de donnée de Capitales Françaises pour la Biodiversité)
Et modifier le fichier nom_contenu entre les //******* pour la standardisation des champs.


Types de contenus implémentés :

Experiences :

Titre

Description (sommaire)

Corps 

Date début - Date fin, sous format JJ/MM/AAAA

Organisme en charge

Budget

Partenaires techniques / financiers

Les Contacts

Nom(s) Des/de la ville(s) où cette expérience a eu lieu 

L’/Les année(s) de expérience 

Localisation de l’expérience selon un de ces 3 formats compatible avec google map : 

Degrés, minutes et secondes (DMS) : 41°24'12.2" N 2°10'26.5" E

Degrés et minutes décimales (DMM) : 41 24.2028, 2 10.4418

Degrés décimaux (DD) : 41.40338, 2.17403


![alt text](https://github.com/louLabo/applicationAPI/blob/master/Schema%20du%20dispositif.png)
