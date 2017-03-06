<?php
function erreur($erreur)
{
    //on definit la vue et on retourne le resulat
    require('vue/vueErreur.php');
    extract($donnees_vue);
    require('vue/gabarit.php');
}
?>