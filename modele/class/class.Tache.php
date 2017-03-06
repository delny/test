<?php
class Tache {
    
    use MonTrait;
    
    private $id;
    private $description;
    private $id_colonne;
    
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
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setId_colonne($id_colonne)
    {
        $this->id_colonne = intval($id_colonne);
    }
    
    //getteurs
    public function getId(){ return $this->id; }
    public function getDescription(){ return $this->description; }
    public function getId_colonne(){ return $this->id_colonne; }
    
    //recuperer colonne correspondante
    public function get_my_colonne()
    {
        $colonnemanager = new ColonneManager();
        $mycolonne = $colonnemanager->get_colonne($this->getId_colonne());
        return $mycolonne;
    }
    
    //recuperer formulaire
    public function get_my_form($colonnes)
    {
        $myform = new FormulaireBootstrap(array("id_tache" =>$this->getId()));
        $myform->setMethod('get');
        $myform->setAction('index.php');
        $myform->select('id_colonne',$colonnes,$this->getId_colonne());
        $myform->inputHidden('id_tache');
        return $myform;
    }
    
    public function get_my_form_to_modify()
    {
        $myform = new FormulaireBootstrap(array("id_tache" =>$this->getId(),"description" => $this->getDescription()));
        $myform->setMethod('post');
        $myform->setAction('index.php?action=voirtache');
        $myform->input('description');
        $myform->inputHidden('id_tache');
        $myform->submit();
        return $myform;
    }
}
?>