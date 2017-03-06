<?php
class FormulaireBootstrap extends Formulaire{
    
    private static $balise = 'div';
    private $contenu;
    private $method = 'post';
    private $action = '';
    
    //setteurs
    public function setMethod($method)
    {
        if ($method=='post' OR $method=='get')
        {
            $this->method = $method;
        }
        else
        {
            $this->method = 'post';
        }
    }
    
    public function setAction($action)
    {
        $this->action = $action;
    }
    
    private function inputType($name,$type)
    {
        $html = $this->label($name); //ajoute un label
        $html .= '<input type="'.$type.'" class="form-control" id="'.$name.'" name="'.$name.'" placeholder="'.$name.'" value="'.$this->getValue($name).'" />';
        $this->contenu .= $this->habillage($html);
    }
    
    // input de type general
    public function input($name)
    {
        return $this->inputType($name,'text');
    }
    public function inputNumber($name)
    {
        return $this->inputType($name,'number');
    }
    public function inputPassword($name)
    {
        return $this->inputType($name,'password');
    }
    public function inputColor($name)
    {
        return $this->inputType($name,'color');
    }
    public function inputEmail($name)
    {
        return $this->inputType($name,'email');
    }
    public function inputUrl($name)
    {
        return $this->inputType($name,'url');
    }
    public function inputWeek($name)
    {
        return $this->inputType($name,'week');
    }
    public function inputHidden($name)
    {
        $html = '<input type="hidden" name="'.$name.'" value="'.$this->getValue($name).'" />';
        $this->contenu .= $this->habillage($html);
    }
    
    // type file -- envoyer un fichier
    public function inputFile($name,$texte)
    {
        //objectif : retourne le contenu html d'un input password
        $html = $this->label($name);
        $html .= '<input type="file" id="'.$name.'" name="'.$name.'" />';
        $html .='<p class="help-block">'.$texte.'</p>';
        $this->contenu .= $this->habillage($html);
    }
    
    public function checkbox($name,$texte)
    {
        $texte = strip_tags($texte);
        $html = '<div class="checkbox"><label>';
        $html .= '<input type="checkbox" name="'.$name.'" />'.$texte;
        $html .= '</label></div>';   
        $this->contenu .= $html;
    }
    
    public function textarea($name)
    {
        $html = $this->label($name);
        $html .= '<textarea class="form-control" id="'.$name.'" name="'.$name.'" placeholder="'.$name.'" ></textarea>';
        $this->contenu .= $this->habillage($html);
    }
    
    public function select($name,$colonnes,$id_colonne)
    {
        $html = '<select class="myselect" name="'.$name.'">';
        foreach($colonnes as $colonne)
        {
            $selected = ($colonne->getId()==$id_colonne) ? 'selected="selected"' : '';
            $html .='<option value="'.$colonne->getId().'" '.$selected.'>'.$colonne->getNom().'</option>';
        }
        $html .= '</select>';
        $this->contenu .= $this->habillage($html);
    }
    
    public function submit()
    {
        $html = '<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer</button>';
        $this->contenu .= $html;
    }
    
    public function reset()
    {
        $html = '<input type="reset" value="R&eacute;initialiser le formulaire" class="btn btn-default" />';
        $this->contenu .= $html;
    }
    
    
    //habillage
    public function label($name)
    {
        $html = '<label for="'.$name.'">'.ucfirst($name).'</label>';
        return $html;
    }
    public function habillage($html)
    {
        $html_propre = '<'.self::$balise.' class="form-group">'.$html.'</'.self::$balise.'>';
        return $html_propre;
    }
    
    //rendu du formulaire
    public function render()
    {
        return '<form method="'.$this->method.'" action="'.$this->action.'" enctype="multipart/form-data">'.$this->contenu.'</form>';
    }
}
?>