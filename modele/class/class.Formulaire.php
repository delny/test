<?php
 class Formulaire {
     
     private $data = array();
     
     private static $balise = 'p';
     
     public function __construct($data)
     {
         $this->data = $data;
     }
     
     public function getValue($name)
     {
         if (isset($this->data[$name]))
         {
             return $this->data[$name];
         }
         else
         {
             return NULL;
         }
     }
     
     public function input($name)
     {
         //objectif : retourne le contenu html d'un input text
         $html = '<input type="text" name="'.$name.'" placeholder="'.$name.'" value="'.$this->getValue($name).'" />';
         return $this->habillage($html);
     }
     
     public function textarea($name)
     {
         $html = '<textarea name="'.$name.'" placeholder="'.$name.'" ></textarea>';
         return $this->habillage($html);
     }
     
     public function submit()
     {
         $html = '<input type="submit" class="btn btn-default" value="Envoyer le formulaire"/>';
         return $html;
     }
     
     public function habillage($html)
     {
         $html_propre = '<'.self::$balise.' class="form-group">'.$html.'</'.self::$balise.'>';
         return $html_propre;
     }
 }
?>