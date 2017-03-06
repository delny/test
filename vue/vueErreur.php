<?php
$titre='Page d\'erreur';
?>

<?php ob_start(); ?>

    <div class="alert alert-danger" role="alert">
        <p>Une erreur fatale vient de se produire : </p>
        <p><?php echo $erreur; ?></p>
    </div>
<?php $contenu = ob_get_clean(); ?>

<?php
$donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
);
?>