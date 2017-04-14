-----------------------------------------------------------------------------
-																			-
-																			-
-																			-
-                               PROJET PACIDNAH								-	
-																			-
-																			-
-																			-
-																			-
-----------------------------------------------------------------------------




Ce projet à pour but , de mettre en place un outil numérique  pour une commune afin que celle-ci gère un environneent d'aide  collaboratif destinné aux personnes agées et aux handicapés.
Ce document explique les configurartions nécessaires à la mise en place de ce site.


REPERTOIRES:
------------
racine : pacidnah/
partie public: racine/mvc_project/ 
configurartion de la base de données: racine/mvc_projet/db_config/




INSTALATION:
------------



	----------  INITIALISATION DE LA BASE DE DONNEES -----------

Pour mettre en place ce site , il fut mettre  en place la créer les bases de données nécessaires à son bon fonctionnement. Pour cela ,
il y a deux fichiers dans le repertoir de configuration de la base de données : "app.ini" et "init_db.sql".Deux étapes sont nécessaires à l'initialisation de cette base de données . 
Ces étapes doivent être exécuté dans cet ordre:


# étape 1: configurer le serveur
----------

Le fichier "app.ini" permet de configurer le serveur .


	- db_hostname : l'adresse du serveur sur lequel la base de données du site sera installée 
	- db_name : le nom de la base de données
	- db_password: le mot de passe associé à la base de donnés permettant ainsi l'acces  



#étape 2 : initialiser la base
----------

le  fichier "init_db.sql" permet de créer et initialiser la base de données. Après avoir suivi et respecté les consignes de l'étape 1, 
vous devez aller sur votre interface de gestion ou d'administration de votre base de données créée précédemment. A ce stade deux choix sont possible1:

	-soit vous importez la directement la base de données :
		importer le fichier "init_db.sql" , par conséquent vous devez définir l'utilisateur administrateur de façcon manuel en créant un nouveau compte utilisateur sur le site  et en modifiant 
		manuellement dans la table user de votre base de donées le champ "user_is_Moderator".De ce fait,  La valeur associé à ce champs pour l'administrateur est "1".

	-soit décommentez la dernière ligne du fichier "ini_db.sql":
		cela vous permettra de définir l'adminisrateur du site. vous devez donc touts les champs . Enregistrez les modifications  apportées au fichier "ini_db.sql" puis importez ce dernier 
		dans votre base de donées depuis votre interface d'administration de la base de données créee à cette effet. un mail vous sera ensuite envoyé à l'adresse mentionée afin de valider votre inscription.
		Ainsi l'administrateur disposera de touts les droits.
			
			--------------- LE SITE ---------------------------
