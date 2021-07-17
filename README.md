# okeanos
Application de gestion des adhérents du club de plongée et de Hockey sub aquatique OKEANOS Grenoble

Procédure d'installation de l'application

git clone https://github.com/antoineadb/okeanos.git

télécharger et installer composer https://getcomposer.org/ suivant votre système

installer php 7.4
https://windows.php.net/downloads/releases/php-7.4.21-nts-Win32-vc15-x64.zip

mettre le chemin de php dans les variable d'environnement

puis composer install pour télécharger le dossier vendor

renseigner le fichier .env avec les infos de la BD (voir avec l'admin du projet)

les apis sont disponible sous l'url
http://localhost:8000/api

le port 8000 est le port généré par le serveur web interne de symfony 
symfony serve dans la console sur le dossier contenant le projet pour générer un serveur interne

file:///home/antoine/Images/Capture%20d%E2%80%99%C3%A9cran%20du%202021-07-17%2001-21-44.png![image](https://user-images.githubusercontent.com/11349889/126017343-85bb3f84-3248-4bf4-af75-52c042e04ac9.png)

