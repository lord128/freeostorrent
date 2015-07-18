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
if(isset($_GET['dellicence'])){

        $stmt = $db->prepare('DELETE FROM blog_licences WHERE licenceID = :licenceID') ;
        $stmt->execute(array(':licenceID' => $_GET['dellicence']));

        header('Location: licences.php?action=deleted');
        exit;
}

// titre de la page
$pagetitle= 'Admin : gestion des licences';
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
                echo '<h3>Licence '.$_GET['action'].'.</h3>';
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
                        $stmt = $db->query('SELECT licenceID FROM blog_licences');
			//pass number of records to
			$pages->set_total($stmt->rowCount());

			$stmt = $db->query('SELECT licenceID, licenceTitle, licenceSlug FROM blog_licences ORDER BY licenceTitle ASC '.$pages->get_limit());

                        while($row = $stmt->fetch()){

                                echo '<tr>';
                                echo '<td style="width: 80%;">'.$row['licenceTitle'].'</td>';
                                ?>

                                <td>
                                        <a style="text-decoration: none;" href="edit-licence.php?id=<?php echo $row['licenceID'];?>"><input type="button" class="button" value="Edit."</a> |
                                        <a style="text-decoration: none;" href="javascript:dellicence('<?php echo $row['licenceID'];?>','<?php echo $row['licenceSlug'];?>')"><input type="button" class="button" value="Suppr."</a>
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
	<p style="text-align: right;"><a href="add-licence.php" style="text-decoration: none;"><input type="button" class="button" value="Ajouter une licence" /></a></p>

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
