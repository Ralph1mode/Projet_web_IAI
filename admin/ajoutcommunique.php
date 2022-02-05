<?php
SESSION_START();
require_once('connection.php');

if(isset($_POST['titre1']))
{
    if(isset($_FILES['commu']) && $_FILES['commu']['error'] === 0)
    {
        $allowed = ["pdf" => "application/pdf"];
        // $filename = mysql_real_escape_string(htmlentities($_FILES['attestationbac']['name'])) ;
            $filename = $_FILES['commu']['name'];
            $filetype = $_FILES['commu']['type'];
            $filesize = $_FILES['commu']['size'];
            $file_tmp = $_FILES['commu']['tmp_name'];
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if(!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed))
            {
               ?> <script> Alert("Erreur: Format de fichier incorrecte. Seul les fichier PDF sont autorisé") </script> <?php ;

            }
            $newname = md5(uniqid());

            $newfilename = $newname.$filename;
           // echo $file_tmp;
            move_uploaded_file($file_tmp,'uploadcommu/'.$newfilename);
            $file_destination = "C:/xampp/htdocs/projet_web/admin/uploadcommu/".$newfilename;
            
            
            $titre = $_POST['titre1'];
            $dateupload = date('Y-m-d');
            try
            {
                 
                 $requet2 = $bdd->prepare("INSERT INTO `communique`(`titre_communique`, `nom_fichier`, `chemin_fichier`, `dateupload`) VALUES ('$titre','$filename','$file_destination','$dateupload')");
                 $requet2 -> execute();

                 echo $filename;
                 echo " ".$file_destination;
                 //header("location: dashboard.php");
                 exit();
            }catch(PDOException $e) {
                echo $e->getMessage();
            }
           
    }  
   
  
}else echo "Le titre n'est pas saisie ou erreur fichier";






//echo $titre;
//echo $_FILES['commu'];




/* if(isset($_POST['ajout']))
{
    if(isset($_POST['titre1']))
    {
        if(isset($_FILES['commu']) && $_FILES(['commu']['error'] === 0))
        {
            $titre = $_POST['titre1'];
            
 
            $allowed = ["pdf" => "application/pdf"];

            die();

            $filename = $_FILES['commu']['name'];
            $filetype = $_FILES['commu']['type'];
            $filesize = $_FILES['commu']['size'];

            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if(!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed))
            {

             $erreurfichier = die('Erreur: Format de fichier incorrecte. Seul les fichier PDF sont autorisé');

            }

            if($filesize > 2048*2048)
                {
                    $erreurtaille = die('Erreur : la taille du fichier est trop volumineux') ;
                }
            $newname = md5(uniqid());
            $newfilename =__DIR__."/uploadcommu/$newname.$extension"; */
            //var_dump($_FILES);
           /*  if(!move_uploaded_file($_FILES['commu']['tmp_name'], $newfilename))
             {
                $titre = $_POST['titre1'];
                
                die("l'upload a échoué");
             }
            $date = date('Y-m-d');
            $sql2 = $bdd->prepare("INSERT INTO communique('idcommunique,date,PFD,URL,titre') VALUES(2,'$date','$filename','$newfilename','$titre')");
            $sql2->execute();
            header("location: dashboard.php"); 
        }
       
    } else echo"remplir titre";
} */
?>