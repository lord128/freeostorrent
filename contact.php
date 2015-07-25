<?php
require_once('includes/config.php');

$pagetitle = 'Contactez-nous !';

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

<?php
// Affichage : message envoyé !
if(isset($_GET['action'])){
	echo '<div class="alert-msg rnd8 success">Message envoyé : '.htmlentities($_GET['action'], ENT_QUOTES, "UTF-8").'</div>';
}
?>

<?php
if(isset($_GET['wrong_code'])) {
	echo '<br /><div class="alert-msg rnd8 error">Mauvais code anti-spam !</div>';
}
?>


<?php
//if form has been submitted process it
if(isset($_POST['submit'])) {

	$name = $_REQUEST["name"];
	$subject = $_REQUEST["subject"];
	$message = strip_tags($_REQUEST["message"]);
	$from = $_REQUEST["from"];
	$verif_box = $_REQUEST["verif_box"];

	$name = stripslashes($name);
	$message = stripslashes(strip_tags($message));
	$subject = stripslashes($subject);
	$from = stripslashes($from);

 	if($name ==''){
                $error[] = 'Veuillez entrer un pseudo.';
        }

        if($from ==''){
                $error[] = 'Veuillez entrer une adresse e-mail.';
        }

        if($subject ==''){
                $error[] = 'Veuillez préciser un sujet.';
        }

        if($message ==''){
                $error[] = 'Votre message est vide ?!?';
        }


	if(md5($verif_box).'a4xn' == $_COOKIE['tntcon']) {
		if(!isset($error)) {
			$message = "Nom: ".$name."\n".$message;
        		$message = "De: ".$from."\n".$message;
        		mail(SITEMAIL, 'Message: '.$subject, $_SERVER['REMOTE_ADDR']."\n\n".$message, "From: $from");
        		header("Location: contact.php?action=ok");
        		setcookie('tntcon','');
		}
	}
	
	else {
    		$error[] = 'Mauvais code anti-spam!';
	}
}

	if(isset($error)) {
		foreach($error as $error){
        		echo '<div class="alert-msg rnd8 error">'.$error.'</div>';
        	}
	}
?>

<h3>Nous contacter :</h3>
<p>Merci d'utiliser le formulaire ci-dessous pour nous contacter :</p>

<form action="" method="post">

Votre nom :<br />
<input name="name" type="text" value="<?php echo htmlentities($_POST['name']); ?>"/>
<br />
<br />

Votre e-mail :<br />
<input name="from" type="text" value="<?php echo htmlentities($_POST['from']); ?>"/>
<br />
<br />

Sujet :<br />
<input name="subject" type="text" value="<?php echo htmlentities($_POST['subject']); ?>"/>
<br />
<br />

Anti-spam : veuillez recopier le code ci-dessous<br />
<input name="verif_box" type="text"/>
	<img src="verificationimage.php?<?php echo rand(0,9999);?>" alt="verification" width="50" height="24" align="absbottom" />
	<br />
	<br />

Message :<br />

<textarea name="message"></textarea>
<p><input name="submit" class="searchsubmit formbutton" type="submit" value="Envoyer le message"/> <input type="reset" value="Annuler" /></p>
</form>

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
