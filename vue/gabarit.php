<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $titre; ?></title>
        <?php require('vue/init.php'); ?>
    </head>
    <body>
        <?php require('vue/menu.php'); ?>
        <div class="container-fluid" style="padding-top:100px;">
<?php
//affichage du contenu
      
echo $contenu;      
?>

      <hr>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="vue/js/app.js"></script>
      <footer>
        <p>&copy; 2017 Lexik, Inc.</p>
      </footer>
    </div> 
<!-- /container -->
<!-- Button trigger modal -->


<!-- Modal -->
	
  </body>
</html>
