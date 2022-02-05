<?php
session_start();



if(!empty($_POST['PrenomAdmin'] && !empty($_POST['motdepasse'])))
{
    $prenom = htmlspecialchars($_POST["PrenomAdmin"]) ;
    $motdepasse = htmlspecialchars($_POST["motdepasse"]) ;
    require_once("connection.php");
    
    $passwordHash = password_hash($motdepasse, PASSWORD_DEFAULT);

    $sql = $bdd->prepare('SELECT* FROM adminisrtrateur') ;
  

    $sql -> execute();
    $rows = $sql -> fetchAll();

    foreach($rows as $info){
        $password = $info['Motdepasse'];
        $prenombase = $info['PrenomAdmin'];
        
    }

     if (($prenom == $prenombase ) && ($motdepasse == $password))
    {
    
                    $_SESSION['PrenomAdmin'] = $prenom;
                    $_SESSION['login_time'] = time();
                    header("location:dashboard.php");

   }else header("location: authentification.php");
    
}else
{
    
    header("location: authentification.php");
}
//ici la modification du profile Administrateur
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = $bdd-> prepare("UPDATE adminisrtrateur SET PrenomAdmin='$username', Email='$email', Motdepasse='$password' WHERE idAdmin='$id' ");
    $query_run = $query->execute();

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: dashboard.php');  
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: dashboard.php'); 
    }
}




/* if(isset($_POST['adduser']))
{
    if(isset($_POST['newname']) && isset($_POST['newusername']) && isset($_POST['newemail']) && isset($_POST['newpassword']) && isset($_POST['newpassword2']))
    {
        $nouveaunom = $_POST['newname'];
        $nouveauprenom = $_POST['newusername'];
        $nouveaumail = $_POST['newemail'];
        $nouveaupass = $_POST['newpassword'];
        $nouveaupass1 = $_POST['newpassword2'];

        
         if($nouveaupass == $nouveaupass1)
        {
            $passwordHash2 = password_hash($nouveaupass, PASSWORD_DEFAULT);

            $requet = $bdd->prepare("Insert into adminisrtrateur(NomAdmin,PrenomAdmin,Email,Motdepass) values('$nouveaunom','$nouveauprenom','$nouveaumail','$passwordHash2')");
            $requet->execute();
            
            header("location:dashboard.php");
        } else echo"erreur"; 
    }else echo"remplire tout svp";
}else echo"valider svp";
 */
?>