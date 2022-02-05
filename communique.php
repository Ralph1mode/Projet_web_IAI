<?php require_once("admin/connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communiqué</title>
    <link rel="shortcut icon" type="image/png" href="img/log_1.jpg" />


</head>
<body>
<?php include("entete.php"); ?>
<?php 
    $sql = $bdd->prepare("SELECT * FROM communique where id_communique = 16");
    $sql -> execute();
    $result = $sql->fetchAll();

    foreach($result as $donnee)
    {
        $titre = $donnee['titre_communique'];
        $chemin = $donnee['chemin_fichier'];
    }
    

?>
<div style="margin-top: 30px ; margin-bottom: 30px">
    <h2 style="text-align: center; color : blue; font-weight : bold; font-size: 25px" id="titre"><?php echo $titre ?></h2>
</div>

<iframe type='application/pdf' src="<?php echo $donnee['chemin_fichier'] ;?>" id="lepdf" width="100%" height="600px"></iframe>
<?php include("footer.php"); ?>
</body>
</html>