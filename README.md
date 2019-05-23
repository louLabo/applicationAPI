# applicationAPI
application à installer sur le serveur des partenaires, pour que nous disposions de l'API nous permettent de récupérer les données concernant les actions/expériences/projets en lien avec la biodiversité

 Ces fichiers sont à installer sur le serveur du partenaire. Ainsi les mots de passe et identifiants n'ont pas besoins de nous être transmis.

Le chemin d'accès à la base de donnée, son nom, le login utilisateur et son mot de passe dans le fichier "Database_config.php".

Le fichier "Projet.php" contient les requêtes qui interrogeont la base de données.

Le fichier "Communication.php" sert à analyser la requête reçue pour déterminer la recherche qui doit être effectuée (recherche de toutes les actions, ou recherche en fonction de la ville, etc) et utilisera les fonction du fichiers "projets.php".

Le fichier "Projets.php" stocke des fonctions et appelle les fonctions du fichier "Projet.php".

Le fichier "Database.php" permet d'obtenir une connexion à la base de données renseignée dans le fichier "Database_config.php".

Le fichier ".thaccess" est un fichier de routage qui peut être utilisé pour rendre les URI d'accès plus compréhensibles.


