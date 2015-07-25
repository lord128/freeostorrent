<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-FR">
<head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
   <meta http-equiv="content-language" content="fr-FR" />
   <title><?php echo SITESLOGAN; ?> - <?php echo $pagetitle; ?></title>
   <meta name="language" content="fr-FR" />
   <meta name="robots" content="all" />
   <meta name="description" content="<?php echo SITEDESCRIPTION; ?>" />
   <link rel="icon" href="favicon.ico" />
   <link rel="author" href="mailto:<?php echo SITEMAIL; ?>" xml:lang="fr-FR" title="Olivier Prieur" />
   <link rel="stylesheet" href="<?php echo SITEURL; ?>/style/normalize.css" />
   <link rel="stylesheet" href="<?php echo SITEURL; ?>/style/main.css" />
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
   <script type="text/javascript" language="javascript" src="<?php echo SITEURL; ?>/js/passwd.js"></script>
   <script type="text/javascript" language="javascript">
	jQuery(document).ready(function() {
		$('#username').keyup(function(){$('#result').html(passwordStrength($('#password').val(),$('#username').val()))})
		$('#password').keyup(function(){$('#result').html(passwordStrength($('#password').val(),$('#username').val()))})
	})
	function showMore()
	{
		$('#more').slideDown()
	}
   </script>
   <script type="text/javascript" src="<?php echo SITEURL; ?>/js/tinymce/tinymce.min.js"></script>
   <script type="text/javascript">
          tinymce.init({
      		mode : "textareas",
		language : "fr_FR",
              	plugins: [
                  "advlist autolink lists link print preview image",
                  "searchreplace visualblocks code",
                  "contextmenu smileys paste"
              	],
              	toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link smileys code image"
          });
    </script>


    <!-- Suppression d'un post (torrent) par son auteur ou l'Admin -->
    <script language="JavaScript" type="text/javascript">
	function delpost(id, title) {
		if (confirm("Etes-vous certain de vouloir supprimer '" + title + "'")) {
			window.location.href = 'index.php?delpost=' + id;
		}
	}
    </script>

    <!-- Suppression d'une caégorie par l'Admin -->
    <script language="JavaScript" type="text/javascript">
	function delcat(id, title) {
		if (confirm("Etes-vous certain de vouloir supprimer '" + title + "'")) {
			window.location.href = 'categories.php?delcat=' + id;
		}
	}
    </script>

    <!-- Suppression d'une licence par l'Admin -->
    <script language="JavaScript" type="text/javascript">
	function dellicence(id, title) {
		if (confirm("Etes-vous certain de vouloir supprimer '" + title + "'")) {
			window.location.href = 'licences.php?dellicence=' + id;
		}
	}
    </script>

    <!-- Suppression d'un membre par l'Admin -->
    <script language="JavaScript" type="text/javascript">
	function deluser(id, title) {
		if (confirm("Etes-vous certain de vouloir supprimer '" + title + "'")) {
			window.location.href = 'users.php?deluser=' + id + '&delname=' + title;
		}
	}
    </script>

    <!-- Suppression de l'avatar du membre -->
    <script language="JavaScript" type="text/javascript">
        function delavatar(id, title) {
                if (confirm("Etes-vous certain de vouloir supprimer '" + title + "'")) {
                        window.location.href = 'edit-profil.php?delavatar=' + id + '&delname=' + title;
                }
        }
    </script>

    <!-- Suppression de l'image du torrent -->
    <script language="JavaScript" type="text/javascript">
	function delimage(id, title) {
		if (confirm("Etes-vous certain de vouloir supprimer '" + title + "'")) {
			window.location.href = 'edit-post.php?delimage=' + id;
		}
	}
    </script>

</head>
