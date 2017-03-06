<?php
class ColonneManager extends DatabaseManager{
    
    private $bdd;
    
    public function __construct()
    {
        $this->bdd = $this->getBDD();
    }
    
    //retourne colonne
    public function get_colonne($id)
    {
        $sql = $this->bdd->prepare('SELECT * FROM colonnes WHERE id = :id');
        $sql->bindValue(':id',$id);
        $sql->execute();
        if ($sql->rowCount()==1)
        {
            return new Colonne($sql->fetch());
        }
        else
        {
            throw new Exception('Colonne introuvable !');
        }
    }
    
    //mettre a jour une colonne
    public function update_colonne(Colonne $colonne)
    {
        $sql = $this->bdd->prepare('UPDATE colonnes Set ordre = :ordre, nom = :nom WHERE id = :id');
        $sql->bindValue(':id',$colonne->getId());
        $sql->bindValue(':ordre',$colonne->getOrdre());
        $sql->bindValue(':nom',$colonne->getNom());
        return $sql->execute();
    }
    
    //retourne 1ere colonne affiché ordre=1
    public function get_first_colonne()
    {
        $sql = $this->bdd->prepare('SELECT * FROM colonnes WHERE ordre = :ordre');
        $sql->bindValue(':ordre',1);
        $sql->execute();
        if ($sql->rowCount()==1)
        {
            return new Colonne($sql->fetch());
        }
        else
        {
            throw new Exception('Colonne introuvable !');
        }
    }
    
    //recupere toutes les colonnes, renvoie un tableau de colonnes
    public function get_colonnes()
    {
        $sql = $this->bdd->prepare('SELECT * FROM colonnes ORDER BY ordre');
        $sql->execute();
        
        while($retour = $sql->fetch())
        {
            $colonnes[] = new Colonne($retour);
        }
        
        return $colonnes;
    }
    
    //recupere le nombre de colonnes pour retourner le nombre de colonnes bootstrap que la colonne doit prendre
    public function get_class_bootstrap()
    {
        $sql = $this->bdd->prepare('SELECT COUNT(id) as total FROM colonnes');
        $sql->execute();
        $donnees = $sql->fetch();
        $total = $donnees['total'];
        
        return floor(12/$total);
    }
}
?>