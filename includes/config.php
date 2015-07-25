<?php

//Sessions
ob_start();
session_start();

// ----------------------------------------------------------------------------------
// PARAMETRES
// ----------------------------------------------------------------------------------

//Identifiants SQL
define('DBHOST','localhost');
define('DBUSER','freeostorrent');
define('DBPASS','4U#qS=hXbN=X55Ni&HfGUBxA$D=Vz=!R');
define('DBNAME','freeostorrent');

//Connexion SQL
$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//Paramètres du site
define('SITENAME','freeostorrent');
define('SITENAMELONG','freeostorrent.fr');
define('SITESLOGAN','Freeostorrent : Bittorrent au service du Libre');
define('SITEDESCRIPTION','freeostorrent.fr rassemble des OS libres (Systèmes d\'exploitation) et les propose au téléchargement par l\'intermédiaire du protocole Bittorrent.');
define('SITEURL','http://www.freeostorrent.fr');
define('SITEMAIL','webmaster@freeostorrent.fr');
define('ANNOUNCEPORT','54969');
define('SITEVERSION','1.1.1c');
define('SITEDATE','18/07/15');


//Deconnexion auto au bout de 15 minutes d'inactivité
if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > 900)) {
	header ('Location: '.SITEURL.'/admin/logout.php');
}

// Announce
$ANNOUNCEURL = SITEURL.':'.ANNOUNCEPORT.'/announce';

// Répertoire des images
$REP_IMAGES = '/var/www/freeostorrent.fr/web/images/';

//set timezone
date_default_timezone_set('Europe/Paris');

// Edito - Page d'accueil
$EDITO = '
<h3 style="line-height: 20%;">Bienvenue sur '.SITEURL.' !</h3>
<p style="text-align: justify;">
Freeostorrent.fr rassemble des OS libres (Systèmes d\'exploitation) et les propose au téléchargement par l\'intermédiaire du protocole Bittorrent.<br />
Il est complémentaire des projets officiels qui possèdent déjà leurs services Bittorrent (distributions Gnu/Linux ou xBSD, projets divers, ...) et s\'adresse tout particulièrement aux projets plus modestes qui recherchent un moyen simple de partager librement leurs travaux.<br />
Freeostorrent.fr est un "front-end" au tracker XBT. Ecrit en php "from scratch", il est en constant développement. Tous les feedbacks seront utiles à l\'amélioration du site. 
Si vous voulez nous apporter un peu d\'aide, merci de nous contacter par l\'intermédiaire du <a href="'.SITEURL.'/contact.php">formulaire de contact</a>.<br />
Le téléchargement (leech) est libre et ne nécessite aucune création de compte. Néanmoins, vous devrez créer un compte membre afin d\'uploader des torrents.
</p>
';

//Paramètres pour le fichier torrent (upload.php)
define('MAX_SIZE', 100000); // Taille maxi en octets du fichier .torrent
define('WIDTH_MAX', 500); // Largeur max de l'image en pixels
define('HEIGHT_MAX', 500); // Hauteur max de l'image en pixels
$REP_TORRENTS = '/var/www/freeostorrent.fr/web/torrents/'; // Répertoire des fichiers .torrents

//Paramètres pour l'icone de présentation du torrent (index.php, edit-post.php, ...)
$WIDTH_MAX_ICON = 150; //largeur maxi de l'icone de présentation dut orrent
$HEIGHT_MAX_ICON = 150; //Hauteur maxi de l'icone de présentation du torrent
$MAX_SIZE_ICON = 30725; // Taille max en octet de l'icone de présentation du torrent (100 Ko)
$REP_IMAGES_TORRENTS = '/var/www/freeostorrent.fr/web/images/imgtorrents/';

//Paramètres pour l'avatar membre (profile.php, edit-profil.php, ...)
$MAX_SIZE_AVATAR = 51200; // Taille max en octets du fichier (50 Ko)
$WIDTH_MAX_AVATAR = 150; // Largeur max de l'image en pixels
$HEIGHT_MAX_AVATAR = 150; // Hauteur max de l'image en pixels
$EXTENSIONS_VALIDES = array( 'jpg' , 'jpeg' , 'png' ); //extensions d'images valides
$REP_IMAGES_AVATARS = '/var/www/freeostorrent.fr/web/images/avatars/'; // Répertoires des images avatar des membres


// -----------------------------------------------------------------------------------
// CLASSES
// -----------------------------------------------------------------------------------

//load classes as needed
function __autoload($class) {
   
   $class = strtolower($class);

   //if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }  
   
   //if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
   
   //if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }     
    
}

$user = new User($db); 

// Fonctions torrents
include_once('functions.php');
include_once('BDecode.php');
include_once('BEncode.php');

?>
