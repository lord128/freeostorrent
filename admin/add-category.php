<?php
require('../includes/config.php');

//Si pas connecté OU si le membre n'est pas admin, pas de connexion à l'espace d'admin --> retour sur la page login
if(!$user->is_logged_in()) {
        header('Location: login.php');
}

if(isset($_SESSION['userid'])) {
        if($_SESSION['userid'] != 1) {
                header('Location: '.SITEURL);
        }
}

// titre de la page
$pagetitle = 'Admin : ajouter une catégorie';
require('../includes/header.php');
?>


<body>

<div id="container">

        <?php
                require('../includes/header-logo.php');
                require('../includes/nav.php');
        ?>

        <div id="body">
        <div id="content">

<?php
// fil d'ariane
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
<br /><br />


        <?php include('menu.php');?>

			<p><a href="categories.php">Categories Index</a></p>
			<h2>Ajouter une catégorie</h2>

			<?php
			//if form has been submitted process it
			if(isset($_POST['submit'])){

			$_POST = array_map( 'stripslashes', $_POST );

			//collect form data
			extract($_POST);

			//very basic validation
			if($catTitle ==''){
				$error[] = 'Veuillez entrer un nom de catégorie.';
			}

			if(!isset($error)){

			try {

				$catSlug = slug($catTitle);

				//insert into database
				$stmt = $db->prepare('INSERT INTO blog_cats (catTitle,catSlug) VALUES (:catTitle, :catSlug)') ;
				$stmt->execute(array(
					':catTitle' => $catTitle,
					':catSlug' => $catSlug
				));

				//redirect to index page
				header('Location: categories.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

<form action='' method='post'>

	<p><label>Titre</label><br />
	<input type='text' name='catTitle' value='<?php if(isset($error)){ echo htmlentities($_POST['catTitle']); } ?>'></p>

	<p><input type='submit' name='submit' class="searchsubmit formbutton" value='Ajouter la catégorie'></p>

</form>

</div>

	<?php require('../sidebar.php'); ?>
        
    	<div class="clear"></div>
    </div>
</div>

<div id="footer">
	<?php require('../includes/footer.php'); ?>
</div>

</body>
</html>
