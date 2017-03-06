<?php
// charger le modele
require('modele/Modele.php');

function voirtache()
{
    // on instancie les managers
    $colonnemanager = new ColonneManager();
    $tachemanager = new TacheManager();
    
    //on modifie une tache
    if (isset($_POST['id_tache'],$_POST['description']))
    {
        if(empty($_POST['description']))
        {
            throw new Exception('La description de la t&acirc;che ne peut pas &ecirc;tre vide!');
        }
        
        $id_tache = $_POST['id_tache'];
        $description = strip_tags($_POST['description']);
        
        //on recup la tache via le manager
        $tache = $tachemanager->get_tache($id_tache);
        
        //on mets a jour la tache
        $tache->hydrate([
           "description" => $description
        ]);
        $tachemanager->update_tache($tache);
        
        //on definit la vue et on retourne le resulat
        require('vue/vueVoirTache.php');
        return $donnees_vue;
    }
    elseif (isset($_GET['id_tache']))
    {
        $id_tache = intval($_GET['id_tache']);
        $tache = $tachemanager->get_tache($id_tache);
        
        //on definit la vue et on retourne le resulat
        require('vue/vueVoirTache.php');
        return $donnees_vue;
    }
    else
    {
        throw new Exception('Aucun id renseigné');
    }
}
?>