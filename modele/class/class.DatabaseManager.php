<?php
 class DatabaseManager {
     
     protected static function getBDD()
     {
         $bdd = new PDO('mysql:host=localhost;dbname=suiviactivite;charset=utf8', 'root','cabestany', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         return $bdd;
     }
 }
?>