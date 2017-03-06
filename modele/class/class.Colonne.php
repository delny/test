<?php
class Colonne {
    
    use MonTrait;
    
    private $id;
    private $ordre;
    private $nom;
    //non present dans bdd
    private $compteur;
    
    //constructeur
    public function __construct($donnees)
    {
        $this->hydrate($donnees);
    }
    
    //setteurs
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setCompteur($compteur)
    {
        $this->compteur = $compteur;
    }
    
    //getteurs
    public function getId(){ return $this->id; }
    public function getOrdre(){ return $this->ordre; }
    public function getNom(){ return $this->nom; }
    public function getCompteur(){ return $this->compteur; }
    
    //retourne les taches asscociées à cette colonne
    public function get_taches_par_colonne()
    {
        $TacheManager = new TacheManager();
        $taches = $TacheManager->get_taches_par_colonneid($this->getId());
        $this->setCompteur(count($taches));
        return $taches;
        
    }
}
?>