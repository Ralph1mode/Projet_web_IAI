<?php
session_start();
require_once('connection.php');

if(isset($_POST['telecharger']))
{
 // if(isset($_GET['code_fichier']))
  //{
    
       // $code_fichier = $_GET['code_fichier'];
     


            $requet = $bdd->prepare("SELECT nom_fichier, url_fichier from fichier_join WHERE code_fichier = 59");
            $requet->execute();
            $rows = $requet->fetchAll();
            
           
            foreach($rows as $atess)
            {
                $url = $atess['url_fichier'];
                $nom = $atess['nom_fichier'];
            }
            
              
                
             
           // $url = 'https://waytolearnx.com/wp-content/uploads/2018/09/cropped-logoWeb.png'; 
              
            // Initialiser la session cURL
            $session = curl_init($url); 
              
            // Inintialiser le nom de répertoire où le fichier sera sauvegardé
            $dir = './'; 
              
            $file_name = basename($url); 
              
            // Enregistrer le fichier
            $save = $dir . $nom; 
              
            // Ouvrir le fichier 
            $file = fopen($save, 'wb'); 
              
            // définit les option pour le transfert
           // curl_setopt($session, CURLOPT_FILE, $nom); 
           // curl_setopt($session, CURLOPT_HEADER, 0); 
              
            curl_exec($session); 
              
            curl_close($session); 
              
           // fclose($nom); 
          
     // }     
  

}
   
?>