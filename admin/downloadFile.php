<?php

session_start();
require_once('connection.php');
 $codefichier = $_GET['code_fichier'];

if(isset($_POST['telecharger'])){
    $requet = $bdd->prepare("SELECT nom_fichier, url_fichier from candidat c, fichier_join f WHERE f.code_fichier = c.code_fichier and c.code_fichier = $codefichier");
    $requet->execute();
    $rows = $requet->fetchAll();
    
   
    foreach($rows as $atess)
    {
        $url = $atess['url_fichier'];
        $nom = $atess['nom_fichier'];
    }
   
   $doc_type = "pdf"; //Le type de fichier exemple : jpeg, png,xls etc...
   $file_name = $nom ; //Le nom du fichier
   $doc_file = $url;
   
   if (!empty($doc_file) && file_exists($doc_file)) {
   
       $doc_type = strtolower($doc_type); // rendre tous les fichiers en minuscule 
       
       $type_img = ["png", "jpeg", "jpg"];
       $type_file = ["xls", "xlsx", "doc", "docx","pdf"];
   
       if (in_array($doc_type, $type_img)) {
   
           $out_put .= "<div id=\"affichage\" style=\"width: 100%;\">";
           $out_put .= "<img src='$doc_file' alt='$doc_file' style='width:auto; margin:auto;' />";
           $out_put .= "</div>";
           echo $out_put;
       } else if (in_array($doc_type, $type_file)) {
   
           if (file_exists($doc_file)) {
               
               $mime = 'application/octet-stream';
               $taille = filesize($doc_file);
   
               
               // Téléchargement du fichier
               header('Cache-Control: max-age=0');
               // If you're serving to IE 9, then the following may be needed
               header('Cache-Control: max-age=1');
   
               // If you're serving to IE over SSL, then the following may be needed
               header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
               header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
               header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
               header('Pragma: public'); // HTTP/1.0
   
   
   
               header("Content-Disposition: attachment; filename=\"$file_name\"");
               header("Content-Type: $mime");
               header("Content-Transfer-Encoding: binary");
               header("Content-Length: $taille");
               header("Pragma: no-cache");
               header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
               header("Expires: 0");
               ob_clean();
               flush();
               //
               readfile($doc_file);
           }
       } else {
           header('Content-type: application/pdf');
           readfile("$doc_file");
       }
   } else {
       echo "<p>Svp le Fichier n'existe pas</p>";
   }
}

 if(isset($_POST['ouvrir']))
{
    $requet = $bdd->prepare("SELECT nom_fichier, url_fichier from fichier_join WHERE code_fichier = '{$codefichier}'");
    $requet->execute();
    $rows = $requet->fetchAll();
    
   
    foreach($rows as $atess)
    {
        $url = $atess['url_fichier'];
        $nom = $atess['nom_fichier'];
    }
   
   $doc_type = "pdf"; //Le type de fichier exemple : jpeg, png,xls etc...
   $file_name = $nom ; //Le nom du fichier
   $doc_file = $url;
    //Pour le téléchargement simple
    ?>
    <?php echo '<a href="' .$atess['url_fichier']. ' target="_blank">ici</A>'; ?>
    <?php
  //echo  "<a href=' $url ;' target='_blank'></a>";  
  //echo "<a href='lien vers l\'images dans le dossier et l\'image en personne' target='_blank'>Télécharger</a>";
} 
?>