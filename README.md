# freeostorrent

<h2>PRESENTATION :</h2>
Front-end php + MySQL (PDO) pour XBT tracker (bittorrent)
freeostorrent.fr est un projet visant la création d'un front-end php "from-scratch" à XBT Tracker de Olaf Van Der Spek. 
freeostorrent.fr est issu de la famille de freetorrent.fr...

<h2>PREREQUIS :</h2>
Gnu/Linux - Nginx (ou Apache) - MySQL - PHP - XBTT (xbt tracker)

<h2>ETAPES DE CONFIGURATION :</h2>
1 - Installer xbt tracker comme indiqué sur cette page : http://xbtt.sourceforge.net/tracker/ - Vous trouverez plein d'infos également ici --> http://visigod.com/xbt-tracker/table-documentation<br />
2 - Installer les fichiers freeostorrent à la racine de votre site web. Mettez les permissions à 0777 sur certains repertoires : torrents/, images/ ... et 0755 sur les autres répertoires.<br />
3 - Compléter / modifier / adapter le fichier config.php dans le répertoire includes/<br />
4 - Installer la base de données MySQL et la modifier / adapter selon vos besoins...<br />
5 - Installer le crontab (crontab -e) tel que présenté dans le fichier crontab.txt. Une fois le crontab installé, vous pouvez supprimer ce fichier crontab.txt.<br />
6 - Ce projet tourne actuellement sous Nginx (mais peut tourner avec Apache). Voici une partie du fichier nginx pour le site concernant les "rewrite" qui sont très importants (à adapter pour Apache) :<br />
 location / {<br />
            root /var/www/monsiteamoi/web;<br />
            rewrite ^/c-(.*)$ /catpost.php?id=$1 last;<br />
            rewrite ^/a-(.*)-(.*)$ /archives.php?month=$1&year=$2 last;<br />
            if (!-d $request_filename){<br />
            set $rule_2 1$rule_2;<br />
            }<br />
            if (!-f $request_filename){<br />
            set $rule_2 2$rule_2;<br />
            }<br />
            if ($rule_2 = "21"){<br />
            rewrite ^/(.*)$ /viewpost.php?id=$1 last;<br />
            }<br />
            include /etc/nginx/conf.d/php;<br />
            include /etc/nginx/conf.d/cache;<br />
            #satisfy any;<br />
            #allow all;<br />
        }<br />
7 - Le premier utilisateur enregistré (ID N°1) sera considéré comme l'Admin du site avec les droits d'administration : <br />
	- édition/suppression d'utilisateurs<br />
	- édition/ajout de Catégories<br />
	- édition/ajout de licences<br />
	- éditions, ajout de torrent<br />
8 - Pour la partie stats/, vous trouverez bbclone (http://bbclone.de/) <br />
Afin de protéger le répertoire, voici une exmeple de config Nginx à modifier / adapter :<br />
location /stats {<br />
    root /var/www/freeostorrent.fr/web;<br />
    index index.php index.html index.htm;<br />
    rewrite ^/stats/(.*)$ /stats/$1 break;<br />
    try_files $uri $uri/ /stats/index.php?q=$uri&$args;<br />
    auth_basic "stats";<br />
    auth_basic_user_file /etc/nginx/passwd/freeostorrent_stats_passwd;<br />
}
	
<h2>LICENCE :</h2>
GPL v.3 (http://www.gnu.org/copyleft/gpl.html)
<br /><br />
Site web d'origine : http://www.freeostorrent.fr
