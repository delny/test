<?php
$titre='Mon Suivi d\'activite';
?>

<?php ob_start(); ?>
<!--Affichages de la tâche -->
<div class="row">
    <div class="col-md-12">
        <h2>Affichage d'un t&acirc;che</h2>
        <?php
        if ($tache)
        {
            $mycolonne = $tache->get_my_colonne();
            ?>
            <div class="panel panel-default">
              <div class="panel-body">
                  <p>Actuellement dans la colonne  : "<?php echo $mycolonne->getnom(); ?>"</p>
                <?php
                echo $tache->get_my_form_to_modify()->render();
                ?>
              </div>
            </div>
    <?php
        }
        else
        {
            ?>
            <div class="panel panel-default">
              <div class="panel-body">
                <p>Aucune t&acirc;che</p>
              </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php
$donnees_vue = array(
    "titre" => $titre,
    "contenu" => $contenu
);
?>