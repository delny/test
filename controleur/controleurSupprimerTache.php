<?php
// charger le modele
require('modele/Modele.php');

function supprimertache()
{
    // on instancie les managers
    $colonnemanager = new ColonneManager();
    $tachemanager = new TacheManager();
    
    //traitement formulaire de changement de colonne pour une tache
    if (isset($_GET['id_tache']))
    {
        
        //on recuepre la tache a supprimer
         $tache = $tachemanager->get_tache(intval($_GET['id_tache']));
        
        //on supprime la tache
        $tachemanager->delete_tache($tache);
    }
    else
    {
        throw new Exception('Aucun id renseigné');
    }
    
    //on recupere les colonnes
    $colonnes = $colonnemanager->get_colonnes();
    
    //on definit la vue et on retourne le resulat
    require('vue/vueAccueil.php');
    return $donnees_vue;
}
?>