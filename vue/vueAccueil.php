<?php
$titre='Mon Suivi d\'activite';
?>

<?php ob_start(); ?>
<!--Affichages des colonnes -->
<div class="row">
<?php
foreach($colonnes as $colonne)
{
    $taches = $colonne->get_taches_par_colonne();
?>
    <!--Une colonne -->
    <div class="col-md-<?php echo $colonnemanager->get_class_bootstrap(); ?>">
        <h2><?php echo $colonne->getNom(); ?> <span class="badge" title="nombre de tâches"><?php echo $colonne->getCompteur(); ?></span></h2>
        <?php
        if ($taches)
        {
            foreach($taches as $tache)
            {
            ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="tachemodify">
                        <a href="index.php?action=voirtache&id_tache=<?php echo $tache->getId(); ?>"><span class="glyphicon glyphicon-pencil" title="Modifier la t&acirc;che"></span></a>
                        <a href="index.php?action=supprimertache&id_tache=<?php echo $tache->getId(); ?>"><span class="glyphicon glyphicon-remove" title="Supprimer la t&acirc;che"></span></a>
                    </div>
                  <p><?php echo $tache->getDescription(); ?></p>
                <?php
                echo $tache->get_my_form($colonnes)->render();
                ?>
              </div>
            </div>
            <?php
            }  
        }
        else
        {
            ?>
            <div class="panel panel-default">
              <div class="panel-body">
                <p>Aucune t&acirc;che associ&eacute;e &agrave; cette colonne</p>
              </div>
            </div>
            <?php
        }
        ?>
    </div>
<?php
}
?> 
</div>

<?php $contenu = ob_get_clean(); ?>

<?php
$donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
);
?>