<?php
class Controleur{
    
    public function chargercontroleur($action)
    {
        if (file_exists('controleur/controleur'.$action.'.php'))
        {
            //contoleur selon action
            require('controleur/controleur'.$action.'.php');

            // on recupere les donnees
            extract($action()); //renvoit un titre et un contenu
            require('vue/gabarit.php'); 
        }
        else
        {
            throw new Exception('L\'action '.$action.' est inexistante !');
        }
    }
}
?>