<?php
class TacheManager extends DatabaseManager{
    
    private $bdd;
    
    public function __construct()
    {
        $this->bdd = $this->getBDD();
    }
    
    //retourne les taches associé à une colonne
    public function get_taches_par_colonneid($id_colonne)
    {
        $sql = $this->bdd->prepare('SELECT * FROM taches WHERE id_colonne = :id_colonne');
        $sql->bindValue(':id_colonne',$id_colonne);
        $sql->execute();
        
        while($retour = $sql->fetch())
        {
            $taches[] = new Tache($retour);
        }
        
        if(isset($taches))
        {
            return $taches;
        }
        else
        {
            return NULL;
        }
    }
    
    //retourne tache
    public function get_tache($id)
    {
        $sql = $this->bdd->prepare('SELECT * FROM taches WHERE id = :id');
        $sql->bindValue(':id',$id);
        $sql->execute();
        if ($sql->rowCount()==1)
        {
            return new Tache($sql->fetch());
        }
        else
        {
            throw new Exception('T&acirc;che introuvable !');
        }
    }
    
    //ajouter tache
    public function add_tache(Tache $tache)
    {
        $sql = $this->bdd->prepare('INSERT INTO taches (description,id_colonne) VALUES (:description,:id_colonne)');
        $sql->bindValue(':description', $tache->getDescription());
        $sql->bindValue(':id_colonne', $tache->getId_colonne());
        return $sql->execute();
    }
    
    //update tache
    public function update_tache(Tache $tache)
    {
        $sql = $this->bdd->prepare('UPDATE taches SET description = :description, id_colonne = :id_colonne WHERE id = :id');
        $sql->bindValue(':id', $tache->getId());
        $sql->bindValue(':description', $tache->getDescription());
        $sql->bindValue(':id_colonne', $tache->getId_colonne());
        return $sql->execute();
    }
    
    //supprimer tache
    public function delete_tache(Tache $tache)
    {
        $sql = $this->bdd->prepare('DELETE FROM taches WHERE id = :id');
        $sql->bindValue(':id',$tache->getId());
        return $sql->execute();
    }
}
?>