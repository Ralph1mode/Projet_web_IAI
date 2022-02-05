<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=bd_web_iai', 'root', '');
}
catch(PDOException $ex)
    {
        die($ex->getMessage());
    }
if($bdd)
//echo "Connexion etablie...";

?>