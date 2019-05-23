
Application à installer sur le serveur des partenaires, pour que nous disposions de l'API nous permettant de récupérer les données concernant les actions/expériences/projets en lien avec la biodiversité

Ces fichiers sont à installer sur le serveur du partenaire. Ainsi les mots de passe et identifiants n'ont pas besoins de nous être transmis.


Ajout d'une base de donnée : 
Le chemin d'accès à la base de donnée, son nom, le login utilisateur et son mot de passe dans le fichier "Database.php" dans la fonction construct.

Il faut déterminer les "types de contenu " qui pourront être extraits à partir des données proposées. 
Un type de contenu est ici désigné par une liste de données fournies et avec ses propres règles de mise en page.

Les types de contenus déjà implémenté dans le module sont présents en fin de fichier.
On peut également implémenter un nouveau type de contenu, les manipulations à réaliser sont décritent par la suite.
 
 
Si un type de contenu extractable de la base de donnée est déjà crée, il a alors déjà 
 a nature des informations à requeter, veuillez trouver en bas la liste des type d'article à 


