<?php
// charger le modele
require('modele/Modele.php');

function ajoutertache()
{
    // on instancie les managers
    $colonnemanager = new ColonneManager();
    $tachemanager = new TacheManager();
    
    //traitement formulaire de changement de colonne pour une tache
    if (!isset($_POST['description']))
    {
        throw new Exception('Description non renseign&eacute;e');
    }
    elseif(empty($_POST['description']))
    {
        throw new Exception('La description de la t&acirc;che ne peut pas &ecirc;tre vide!');
    }
    else
    {
        $description = strip_tags($_POST['description']);
        
        //on recuepre 1ere colonne
         $colonne = $colonnemanager->get_first_colonne();
        
        //on instancie une nouvelle tache
        $tache = new Tache([
            "description" => $description,
            "id_colonne" => $colonne->getId()
        ]);
        
        //on ajoute la tache dans la bdd
        $tachemanager->add_tache($tache);
    }
    
    //on recupere les colonnes
    $colonnes = $colonnemanager->get_colonnes();
    
    //on definit la vue et on retourne le resulat
    require('vue/vueAccueil.php');
    return $donnees_vue;
}
?>