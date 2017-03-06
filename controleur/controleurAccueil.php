<?php
// charger le modele
require('modele/Modele.php');

function accueil()
{
    // on instancie les managers
    $colonnemanager = new ColonneManager();
    $tachemanager = new TacheManager();
    
    //traitement formulaire de changement de colonne pour une tache
    if (isset($_GET['id_tache'],$_GET['id_colonne']))
    {
        $id_tache = intval($_GET['id_tache']);
        $id_colonne = intval($_GET['id_colonne']);
        
        //on recupere tache correspondante
        $tache = $tachemanager->get_tache($id_tache);
        
        //on recupere tache correspondante
        $colonne = $colonnemanager->get_colonne($id_colonne);
        
        //on mets a jour la tache
        $tache->hydrate([
           "id_colonne" => $colonne->getId()
        ]);
        $tachemanager->update_tache($tache);
    }
    
    //on recupere les colonnes
    $colonnes = $colonnemanager->get_colonnes();
    
    //on definit la vue et on retourne le resulat
    require('vue/vueAccueil.php');
    return $donnees_vue;
}
?>