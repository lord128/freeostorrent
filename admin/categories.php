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

//show message from add / edit page
if(isset($_GET['delcat'])){

        $stmt = $db->prepare('DELETE FROM blog_cats WHERE catID = :catID') ;
        $stmt->execute(array(':catID' => $_GET['delcat']));

        header('Location: categories.php?action=deleted');
        exit;
}

// titre de la page
$pagetitle= 'Admin : gestion des catégories';
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
		
		        <?php include('menu.php');?>

        <?php
        //show message from add / edit page
        if(isset($_GET['action'])){
                echo '<h3>Catégorie '.$_GET['action'].'.</h3>';
        }
        ?>

        <table>
        <tr>
                <th>Titre</th>
                <th>Action</th>
        </tr>
        <?php
                try {
			$pages = new Paginator('10','p');
                        $stmt = $db->query('SELECT catID FROM blog_cats');
			//pass number of records to
			$pages->set_total($stmt->rowCount());

			$stmt = $db->query('SELECT catID, catTitle, catSlug FROM blog_cats ORDER BY catTitle ASC '.$pages->get_limit());

                        while($row = $stmt->fetch()){

                                echo '<tr>';
                                echo '<td style="width: 80%;">'.$row['catTitle'].'</td>';
                                ?>

                                <td>
                                        <a style="text-decoration: none;" href="edit-category.php?id=<?php echo $row['catID'];?>"><input type="button" class="button" value="Edit."></a> |
                                        <a style="text-decoration: none;" href="javascript:delcat('<?php echo $row['catID'];?>','<?php echo $row['catSlug'];?>')"><input type="button" class="button" value="Suppr."</a>
                                </td>

                                <?php
                                echo '</tr>';
                        }

                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
        ?>
        </table>

	<br />
	<p style="text-align: right;"><a href="add-category.php" style="text-decoration: none;"><input type="button" class="button" value="Ajouter une catégorie" /></a></p>

	<?php
		echo $pages->page_links();
	?>
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
