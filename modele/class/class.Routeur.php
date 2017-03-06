<?php
class Routeur {
    
    private $controleur;
    
    public function __construct()
    {
        $this->controleur = new Controleur();
    }
    
    public function RouterRequete()
    {
        try {
            //recup de l'action
            $action = (isset($_GET['action'])) ? $_GET['action'] : 'accueil';
            $this->controleur->chargercontroleur($action);

        } catch (Exception $e) {
            //contoleur erreur
            require('controleur/controleurErreur.php');
            // affichage de la vue erreur
            erreur($e->getMEssage());
        }
    }
}
?>