<?php 
require_once("../admin/connection.php");
SESSION_START();
if(isset($_POST['submit']))
{
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['nationalite']) && isset($_POST['datenaiss']) && isset($_POST['sexe']) && isset($_POST['serie']) && isset($_POST['anneebac']))
    {
        if(isset($_FILES['attestationbac']) && $_FILES['attestationbac']['error'] === 0)
        {
            $allowed = ["pdf" => "application/pdf"];
           
            //$filename = mysql_real_escape_string(htmlentities($_FILES['attestationbac']['name'])) ;
            $filename = $_FILES['attestationbac']['name'];
            $filetype = $_FILES['attestationbac']['type'];
            $filesize = $_FILES['attestationbac']['size'];
            $file_tmp = $_FILES['attestationbac']['tmp_name'];
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION)) ;

            //verification de l'extension du fichier

            if(!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed))
            {
               $erreurfichier = die('Erreur: Format de fichier incorrecte. Seul les fichier PDF sont autorisé') ;

            }

            if($filesize > 2048*2048)
                {
                    $erreurtaille = die('Erreur : la taille du fichier est trop volumineux') ;
                }

            //génération d'un nom unique au fichier
            $newname = md5(uniqid());

            //$newfilename =dirname(__FILE__)."/upload/$newname.$extension";
            $newfilename = $newname.$filename;
            move_uploaded_file($file_tmp,'upload/'.$newfilename);
            $file_destination = "C:/xampp/htdocs/projet_web/controles/upload/".$newfilename;
           /* echo __DIR__;
            var_dump($_FILES);
            die;*/
            if(!move_uploaded_file($_FILES['attestationbac']['tmp_name'], $newfilename))
            {
               ?> <script>alert("l'upload a échoué") </script> <?php
            }

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $nationalite = htmlspecialchars($_POST['nationalite']);  
            $datenaiss = htmlspecialchars($_POST['datenaiss']);
            $sexe = htmlspecialchars($_POST['sexe']);
            $serie = htmlspecialchars($_POST['serie']);
            $anneebac = htmlspecialchars($_POST['anneebac']);
            
            $dateinscrit = date('Y-m-d');

            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            

            $sql2 = $bdd->prepare("Insert into fichier_join(date_upload,nom_fichier,url_fichier) values('$dateinscrit','$filename','$file_destination')");

            $sql2->execute();
             

             $sql0 = $bdd->prepare('SELECT * FROM fichier_join');
             $sql0->execute();
             $fichid = $sql0->fetchAll();

             foreach($fichid as $id)
             {
                 $fichierid = $id['code_fichier'];
             }
             $sql1 = $bdd->prepare("Insert into candidat(code_fichier,nom,prenom,nationalite,sexe,datenaiss,serie,anneebac) values('$fichierid','$nom','$prenom','$nationalite','$sexe','$datenaiss','$serie','$anneebac')");
             
             $sql1->execute();
             
        }else echo "remplir les champs";
        
        header('location: ../confirmation.php'); //echo"c'est bon !! M. ".$nom," ".$prenom;
    }else "Merci d'avoir remplir tout les champs !"; 
}else echo"pas prêt";
?>