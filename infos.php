<?php
require('includes/config.php');

// titre de la page
$pagetitle= 'A propos ...';
require('includes/header.php');

define("_BBC_PAGE_NAME", $pagetitle);
define("_BBCLONE_DIR", "stats/");
define("COUNTER", _BBCLONE_DIR."mark_page.php");
if (is_readable(COUNTER)) include_once(COUNTER);
?>

<body>
<div id="container">

	<?php
	   require('includes/header-logo.php');
	   require('includes/nav.php');
	?>

    	<div id="body">
		<div id="content">

<?php
// Fil d'ariane
$def = "index";
$dPath = $_SERVER['REQUEST_URI'];
$dChunks = explode("/", $dPath);

echo('<a class="dynNav" href="/">Accueil</a><span class="dynNav"> > </span>');
for($i=1; $i<count($dChunks); $i++ ){
	echo('<a class="dynNav" href="/');
	for($j=1; $j<=$i; $j++ ){
		echo($dChunks[$j]);
		if($j!=count($dChunks)-1){ echo("/");}
	}
	
	if($i==count($dChunks)-1){
		$prChunks = explode(".", $dChunks[$i]);
		if ($prChunks[0] == $def) $prChunks[0] = "";
		$prChunks[0] = $prChunks[0] . "</a>";
	}
	else $prChunks[0]=$dChunks[$i] . '</a><span class="dynNav"> > </span>';
	echo('">');
	echo(str_replace("_" , " " , $prChunks[0]));
} 
?>
<br />

<div style="text-align: justify;">

<h3>Infos sur le site et son développement :</h3>
<ul>
	<li><span style="font-weight: bold;">18/07/15 :</span> VERSION 1.1.1c => Correction de bugs sur la page recherche-membres | Ajout de la page infos (+ menu) et délestage de la sidebar...</li>
	<li><span style="font-weight: bold;">17/07/15 :</span> VERSION 1.1.1b => Nouvelle fonctionnalité recherche de membres sur la page Membres | Corrections de bug sur la page Contact.</li>
	<li><span style="font-weight: bold;">04/07/15 :</span> VERSION 1.1.1a => Bug page Torrent Détails : "Fichiers du torrents" - N'affiche que le contenu des torrents avec un seul fichier...</li>
</ul>

</div>

        	</div>
        
	<?php require('sidebar.php'); ?>
        
    	<div class="clear"></div>
    </div>
</div>

<div id="footer">
	<?php require('includes/footer.php'); ?>
</div>

</body>
</html>
