<?php
class Autoloader {
    
    public static function register()
    {
        //spl_autoload_register(array(__CLASS__,'autoload'));
        spl_autoload_register('self::autoload');
    }
    
    public static function autoload($classe)
    {
        require("modele/class/class.".$classe.".php");
    }
}
?>