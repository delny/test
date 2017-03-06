<?php
trait MonTrait {
    
    public function hydrate($donnees)
    {
        foreach ($donnees as $cle => $valeur)
        {
            $method = 'set'.ucfirst($cle);
            if (method_exists($this, $method))
            {
              // On appelle le setter.
              $this->$method($valeur);
            }
        }
    }
}
?>