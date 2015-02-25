<?php
//include config
require_once('../includes/config.php');

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
$pagetitle= 'Admin : ajouter un membre';
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
				<p><a href="users.php">Membres Admin Index</a></p>

				<h2>Ajouter un membre</h2>
				        <?php

        //if form has been submitted process it
        if(isset($_POST['submit'])){

                //collect form data
                extract($_POST);

                //very basic validation
                if($username ==''){
                        $error[] = 'Veuillez entrer un pseudo.';
                }

                if($password ==''){
                        $error[] = 'Veuillez entrer un mot de passe.';
                }

                if($passwordConfirm ==''){
                        $error[] = 'Veuillez confirmer le mot de passe.';
                }

                if($password != $passwordConfirm){
                        $error[] = 'Les mots de passe concordent pas.';
                }

                if($email ==''){
                        $error[] = 'Veuillez entrer une adresse e-mail.';
                }

                if(!isset($error)){

                        $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

                        try {

                                //insert into database
                                $stmt = $db->prepare('INSERT INTO blog_members (username,password,email) VALUES (:username, :password, :email)') ;
                                $stmt->execute(array(
                                        ':username' => $username,
                                        ':password' => $hashedpassword,
                                        ':email' => $email
                                ));

                                //redirect to index page
                                header('Location: users.php?action=added');
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

                <p><label>Pseudo</label><br />
                <input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'></p>

                <p><label>Mot de passe</label><br />
                <input type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'></p>

                <p><label>Confirmation mot de passe</label><br />
                <input type='password' name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'></p>

                <p><label>E-mail</label><br />
                <input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'></p>

                <p><input type='submit' class="searchsubmit formbutton" name='submit' value='Ajouter un membre'></p>

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
